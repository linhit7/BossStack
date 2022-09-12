<?php

namespace RBooks\Services;

use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\Customer;
use RBooks\Models\User;
use RBooks\Models\Contract;
use Illuminate\Support\Facades\Hash;
use RBooks\Services\ServiceProductService;
use RBooks\Services\ContractService;
use RBooks\Repositories\ContractRepository;
use RBooks\Services\UserCustomerService;
use RBooks\Repositories\UserCustomerRepository;
use RBooks\Repositories\CustomerRepository;
use RBooks\Repositories\CashAccountRepository;

class CustomerService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CustomerRepository::class);
    }

    public function createCustomer($request)
    {
        DB::beginTransaction();
        try {
            $maxValue = app(Customer::class)::max('customercode');
            $maxValue = intval($maxValue) + 1;
            $maxValue = addPadding( $maxValue, 8, '0');
    
            $defaultUserImage = config('app.userimage');
            $imageName = "";
            $image = $request->file('fImages');
            if($image == null) {
                $imageN = "";
                $imageName = "";
            } else {
                $imageN = $image->getClientOriginalName();
                $imageName = $defaultUserImage.$imageN;
                $image->move(public_path($defaultUserImage), $imageName);
            }
    
            $user_id = "";
            $customercode = quote_smart($maxValue);
            $fullname = quote_smart($request->fullname);
            $birthday = ($request->birthday==""?quote_smart(""):quote_smart(FormatDateForSQL($request->birthday)));
            $gender = quote_smart($request->gender);
            $maritalstatus = "";
            $address = quote_smart($request->address);
            $phone = quote_smart($request->phone);
            $email = quote_smart($request->email);
            $contactname = quote_smart($request->contactname);
            $contactphone = quote_smart($request->contactphone);
    
            $introduction_facebook = quote_smart($request->introduction_facebook);
            $introduction_email = quote_smart($request->introduction_email);
            $introduction_user = quote_smart($request->introduction_user);
            $introduction_orther = quote_smart($request->introduction_orther);
    
            $customertype = quote_smart($request->customertype);
            $personalcashflow = '1';
            $invest = '1';
            $saving = '1';
            $financial = '1';
    
            //Chon goi mien phi se tu dong tao tai khoan dang nhap va kich hoat thoi gian mien phi, neu chon goi co tien se kich hoat tai khoan dang nhap sau khi da thanh toan thanh cong
            $service_product_id = $request->typereport;//Dang ky su dung goi dich vu theo ca nhan, doanh nghiep, vip            
            $approved_code = 0; //0: Chua duyet  1: Da duyet  => bang khach hang customer
            $approvestatustype_code = "P"; //Dang cho duyet   => bang hop dong contract
            $contractstatustype_code = "1";//Moi mo           => bang hop dong contract
            $blocked_code = "1";// 0: Mo tai khoan  1: Khoa tai khoan  => bang tai khoan dang nhap khach hang user
            //Neu chon goi mien phí thi chuyen trang thai sang tai khoan -> da duyet, hop dong -> hoat dong
            if ($service_product_id == "4"){
            	$approved_code = 1;// $service_product_id = 4 -> chon goi mien phi, cac goi khac deu tao user mien phi
                $approvestatustype_code = "A";//Da duyet
                $contractstatustype_code = "2";//Hoat dong
                $blocked_code = "0";//Mo tai khoan
            }
    
            $customerstatustype = quote_smart('1');//Moi mo
            $officer_user_id = quote_smart($request->officer_user_id);
            
            $approved = quote_smart($approved_code);
            $approved_user_id = quote_smart($request->approved_user_id);
            $approved_at = ($request->approved_at==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->approved_at)));
            $approvestatustype = quote_smart($request->approvestatustype);
    
            $created_user_id = quote_smart('');
            $updated_user_id = quote_smart('');
    
            $data = [
                'user_id' => $user_id,
                'customercode' => $customercode,
                'avatar' => $imageName,
                'fullname' => $fullname,
                'birthday' => $birthday,
                'gender' => $gender,
                'maritalstatus' => $maritalstatus,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
                'contactname' => $contactname,
                'contactphone' => $contactphone,
    
                'introduction_facebook' => $introduction_facebook,
                'introduction_email' => $introduction_email,
                'introduction_user' => $introduction_user,
                'introduction_orther' => $introduction_orther,
    
                'customertype' => $customertype,
                'personalcashflow' => $personalcashflow,
                'invest' => $invest,
                'saving' => $saving,
                'financial' => $financial,
    
                'customerstatustype' => $customerstatustype,
                'officer_user_id' => $officer_user_id,
                'approved' => $approved,
                'approved_user_id' => $approved_user_id,
                'approved_at' => $approved_at,
                'approvestatustype' => $approvestatustype,
    
                'created_user_id' => $created_user_id,
                'updated_user_id' => $updated_user_id,
            ];
    
            $retCustomer = $this->repository->create($data);
    
            //Thong tin don hang dang ky dich vu
            $service_product_id = $request->typereport;//Dang ky su dung goi dich vu theo ca nhan, doanh nghiep, vip
            $producttypes = config('rbooks.PRODUCTTYPES');
            $producttype = ($request->producttype == null ? '0' : $request->producttype);
            $producttypes_select = $producttypes[$producttype];

            if ($service_product_id != ""){
                $serviceproduct = app(ServiceProductService::class)->getServiceProductFromId($service_product_id, '1')->first();
                $termtype = $serviceproduct->termtype;
                $service_product_id = $service_product_id;
                $service_product_code = $serviceproduct->code;
                $service_product_name = $serviceproduct->name;
                $service_product_price = $serviceproduct->price;
                $service_product_numtime = $serviceproduct->numtime;                

                $producttypes_numtime = $producttypes_select['month'];//So thang dang ky
                $producttypes_discount = $producttypes_select['discount'];//Chiet khau
                $discount_amount = ($service_product_price*$producttypes_discount)/100;
                $producttypes_amount = ($service_product_price - $discount_amount)*$producttypes_numtime;
                $term = $producttypes_numtime;
        
                $contractdate = getCurrentDate('d');
                $dateArray = explode('/', $contractdate);
                $day = $dateArray[0]; $month = $dateArray[1]; $year = substr($dateArray[2], 2, 2);
        
//                $maxValue = app(Contract::class)::max('contractcode');
//                $maxValue = intval($maxValue) + 1;
//                $maxValue = addPadding( $maxValue, 8, '0');
                $maxValue = getTokenDateTime();
                $contractno = "HD" . $month . $year . $maxValue;
                $contractcode = $maxValue;
                
                $nummonth = $producttypes_numtime; 
                $termmonth = "m";
                $lastcontractdate = DateAdd ($contractdate,$termmonth,$nummonth);
                $lastuserdate = DateAdd ($contractdate,"y",100);

                $customer_id = $retCustomer->id; 
                $contractno = quote_smart($contractno);
                $contractcode = quote_smart($contractcode);
                $contractdate = quote_smart(FormatDateForSQL($contractdate));
                $contractstatustype = quote_smart($contractstatustype_code);
                $currency = quote_smart('VND');
                $term = quote_smart($term);
                $termtype = quote_smart($termtype);
                $lastcontractdate = quote_smart(FormatDateForSQL($lastcontractdate));
                $personalcashflow = quote_smart('1');
                $invest = quote_smart('1');
                $saving = quote_smart('1');
                $financial = quote_smart('1');
                $description = quote_smart('');
                $finish = quote_smart('0');
                $finishdate = quote_smart('');
                $officer_user_id = quote_smart('');
                $approved = quote_smart($approved_code);
                $approved_user_id = quote_smart('');
                $approved_at = quote_smart('');
                $approvestatustype = quote_smart($approvestatustype_code);//Dang cho duyet
    
                $created_user_id = quote_smart('');
                $updated_user_id = quote_smart('');
        
                $dataContract = [
                    'customer_id' => $customer_id,
                    'contractno' => $contractno,
                    'contractcode' => $contractcode,
                    'contractdate' => $contractdate,
                    'contractstatustype' => $contractstatustype,
                    'currency' => $currency,
                    'term' => $term,
                    'termtype' => $termtype,
                    'discount' => $producttypes_discount,
                    'amount' => $producttypes_amount,
                    'lastcontractdate' => $lastcontractdate,
                    'personalcashflow' => $personalcashflow,
                    'invest' => $invest,
                    'saving' => $saving,
                    'financial' => $financial,
                    'service_product_id' => $service_product_id,
                    'service_product_code' => $service_product_code,
                    'service_product_name' => $service_product_name,
                    'service_product_price' => $service_product_price,
                    'description' => $description,
                    'finish' => $finish,
                    'finishdate' => $finishdate,
                    'officer_user_id' => $officer_user_id,
                    'approved' => $approved,
                    'approved_user_id' => $approved_user_id,
                    'approved_at' => $approved_at,
                    'approvestatustype' => $approvestatustype,
                    'created_user_id' => $created_user_id,
                    'updated_user_id' => $updated_user_id,
                ];
    
                $retContract = app(ContractRepository::class)->create($dataContract);
    
                //Thong tin tai khoan su dung dich vu
                $userpassword = passGen(8,3); //Tao password 8 ki tu, 3 chu so va ki tu dac biet
                $lastuserdate = quote_smart(FormatDateForSQL($lastuserdate));
                $begin_at_product = $contractdate; //Ngay bat dau su dung goi dich vu = ngay mo hop dong
                $finish_at_product =  $lastcontractdate; //Ngay ket thuc goi dich vu
                $approved_product = '0'; //Admin kiem tra neu da thanh toan goi dich vu thi enable len trong table users
                //Neu khach hang chon goi mo tai khoan mien phi = 4
                if ($service_product_id == 4){
                    $begin_at_product = null; //Ngay bat dau su dung goi dich vu = ngay mo hop dong
                    $finish_at_product =  null; //Ngay ket thuc goi dich vu
                    $approved_product = '1'; //Admin kiem tra neu da thanh toan goi dich vu thi enable len trong table users: neu chon goi mien phi thi kich hoac = 1 (hoat dong)
                }
                
                $dataUserCustomer = [
                    'name' => $fullname,
                    'email' => $email,
                    'password' => bcrypt($userpassword),
                    'role' => 'KH',
                    'customer_id' => $customer_id,
                    'service_product_id' => $service_product_id,
                    'blocked' => $blocked_code,
                    'begin_at' => $contractdate,
                    'finish_at' => $lastuserdate,
                    'begin_at_product' => $begin_at_product,
                    'finish_at_product' => $finish_at_product,
                    'approved_product' => $approved_product,
                ];
                $retUserCustomer = app(UserCustomerRepository::class)->create($dataUserCustomer);
    
                //Cap nhat user_id vao table customer
                if ($retUserCustomer->id != ""){
                    $user_id = quote_smart($retUserCustomer->id);
                    $dataCustomer = [
                        'user_id' => $user_id,
                    ];
                    app(CustomerRepository::class)->update($dataCustomer, $customer_id);            
                }
        
                //Tao moi vi tien tong cho customer : so tai khoan vi = customercode, accountdate = ngay dang ki hien tai
                $dataCashAccount = [
                    'customer_id' => $customer_id,
                    'accountno' => $customercode."0000",
                    'accountname' => 'Ví tổng',
                    'accountdate' => $contractdate,
                    'accountstatustype' => '0',
                    'currency' => 'VND',
                    'amount' => 0,
                    'description' => '',
                ];
                $retCashAccount = app(CashAccountRepository::class)->create($dataCashAccount);
                    
                //Gui mail thong bao user/password
                if ($retUserCustomer->email != ""){
                    $ret = app(UserCustomerService::class)->sendMailNewAccount($retUserCustomer, $userpassword);
                    $ret = app(UserCustomerService::class)->sendMailNewAccountAdmin($retUserCustomer, $userpassword);                    
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return $retContract;
    }
    
    public function create($request)
    {
        $defaultUserImage = config('app.userimage');

        $imageName = "";
        $image = $request->file('fImages');
        if($image == null) {
            $imageN = "";
            $imageName = "";
        } else {
            $imageN = $image->getClientOriginalName();
            $imageName = $defaultUserImage.$imageN;
            $image->move(public_path($defaultUserImage), $imageName);
        }

        $user_id = quote_smart($request->user_id);
        $customercode = quote_smart($request->customercode);
        $fullname = quote_smart($request->fullname);
        $birthday = ($request->birthday==""?quote_smart(""):quote_smart(FormatDateForSQL($request->birthday)));
        $gender = quote_smart($request->gender);
        $maritalstatus = "";
        $address = quote_smart($request->address);
        $phone = quote_smart($request->phone);
        $email = quote_smart($request->email);
        $contactname = quote_smart($request->contactname);
        $contactphone = quote_smart($request->contactphone);

        $introduction_facebook = quote_smart($request->introduction_facebook);
        $introduction_email = quote_smart($request->introduction_email);
        $introduction_user = quote_smart($request->introduction_user);
        $introduction_orther = quote_smart($request->introduction_orther);

        $customertype = quote_smart($request->customertype);
        $personalcashflow = '1';
        $invest = '1';
        $saving = '1';
        $financial = '1';
        
        $customerstatustype = quote_smart($request->customerstatustype);
        $officer_user_id = quote_smart($request->officer_user_id);
        $approved = quote_smart($request->approved);
        $approved_user_id = quote_smart($request->approved_user_id);
        $approved_at = ($request->approved_at==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->approved_at)));
        $approvestatustype = quote_smart($request->approvestatustype);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'user_id' => $user_id,
            'customercode' => $customercode,
            'avatar' => $imageName,
            'fullname' => $fullname,
            'birthday' => $birthday,
            'gender' => $gender,
            'maritalstatus' => $maritalstatus,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'contactname' => $contactname,
            'contactphone' => $contactphone,

            'introduction_facebook' => $introduction_facebook,
            'introduction_email' => $introduction_email,
            'introduction_user' => $introduction_user,
            'introduction_orther' => $introduction_orther,

            'customertype' => $customertype,
            'personalcashflow' => $personalcashflow,
            'invest' => $invest,
            'saving' => $saving,
            'financial' => $financial,

            'customerstatustype' => $customerstatustype,
            'officer_user_id' => $officer_user_id,
            'approved' => $approved,
            'approved_user_id' => $approved_user_id,
            'approved_at' => $approved_at,
            'approvestatustype' => $approvestatustype,

            'created_user_id' => $created_user_id,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->create($data);
    }

    public function update($request, $id)
    {

        $defaultUserImage = config('app.userimage');
        $imageName = "";
        $image = $request->file('fImages');
        if($image == null) {
            $imageN = $request->avatar;
            $imageName = $imageN;
        } else {
            $imageN = $image->getClientOriginalName();
            $imageName = $defaultUserImage.$imageN;
            $image->move(public_path($defaultUserImage), $imageName);
        }

        $user_id = quote_smart($request->user_id);
        $customercode = quote_smart($request->customercode);
        $fullname = quote_smart($request->fullname);
        $birthday = ($request->birthday==""?quote_smart(""):quote_smart(FormatDateForSQL($request->birthday)));
        $gender = quote_smart($request->gender);
        $maritalstatus = "";
        $address = quote_smart($request->address);
        $phone = quote_smart($request->phone);
        $email = quote_smart($request->email);
        $contactname = quote_smart($request->contactname);
        $contactphone = quote_smart($request->contactphone);

        $introduction_facebook = quote_smart($request->introduction_facebook);
        $introduction_email = quote_smart($request->introduction_email);
        $introduction_user = quote_smart($request->introduction_user);
        $introduction_orther = quote_smart($request->introduction_orther);

        $customertype = quote_smart($request->customertype);
        $personalcashflow = '1';
        $invest = '1';
        $saving = '1';
        $financial = '1';

        $customerstatustype = quote_smart($request->customerstatustype);
        $officer_user_id = quote_smart($request->officer_user_id);
        $approved = quote_smart($request->approved);
        $approved_user_id = quote_smart($request->approved_user_id);
        $approved_at = ($request->approved_at==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->approved_at)));
        $approvestatustype = quote_smart($request->approvestatustype);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'user_id' => $user_id,
            'customercode' => $customercode,
            'avatar' => $imageName,
            'fullname' => $fullname,
            'birthday' => $birthday,
            'gender' => $gender,
            'maritalstatus' => $maritalstatus,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'contactname' => $contactname,
            'contactphone' => $contactphone,

            'introduction_facebook' => $introduction_facebook,
            'introduction_email' => $introduction_email,
            'introduction_user' => $introduction_user,
            'introduction_orther' => $introduction_orther,

            'customertype' => $customertype,
            'personalcashflow' => $personalcashflow,
            'invest' => $invest,
            'saving' => $saving,
            'financial' => $financial,

            'customerstatustype' => $customerstatustype,
            'officer_user_id' => $officer_user_id,
            'approved' => $approved,
            'approved_user_id' => $approved_user_id,
            'approved_at' => $approved_at,
            'approvestatustype' => $approvestatustype,

            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->update($data, $id);
    }

    public function updateCustomer($request, $id)
    {
        $defaultUserImage = config('app.userimage');
        $imageName = "";
        $image = $request->file('fImages');
        if($image == null) {
            $imageN = $request->avatar;
            $imageName = $imageN;
        } else {
            $imageN = $image->getClientOriginalName();
            $imageName = $defaultUserImage.$imageN;
            $image->move(public_path($defaultUserImage), $imageName);
        }

        $fullname = quote_smart($request->fullname);
        $birthday = ($request->birthday==""?quote_smart(""):quote_smart(FormatDateForSQL($request->birthday)));
        $gender = quote_smart($request->gender);
        $maritalstatus = "";
        $address = quote_smart($request->address);
        $phone = quote_smart($request->phone);
        $email = quote_smart($request->email);
        $contactname = quote_smart($request->contactname);
        $contactphone = quote_smart($request->contactphone);

        $introduction_facebook = quote_smart($request->introduction_facebook);
        $introduction_email = quote_smart($request->introduction_email);
        $introduction_user = quote_smart($request->introduction_user);
        $introduction_orther = quote_smart($request->introduction_orther);

        $customertype = quote_smart($request->customertype);
        $personalcashflow = '1';
        $invest = '1';
        $saving = '1';
        $financial = '1';

        $customerstatustype = quote_smart($request->customerstatustype);
        $officer_user_id = quote_smart($request->officer_user_id);
        $approved = quote_smart($request->approved);
        $approved_user_id = quote_smart($request->approved_user_id);
        $approved_at = ($request->approved_at==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->approved_at)));
        $approvestatustype = quote_smart($request->approvestatustype);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'avatar' => $imageName,
            'fullname' => $fullname,
            'birthday' => $birthday,
            'gender' => $gender,
            'maritalstatus' => $maritalstatus,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'contactname' => $contactname,
            'contactphone' => $contactphone,

            'introduction_facebook' => $introduction_facebook,
            'introduction_email' => $introduction_email,
            'introduction_user' => $introduction_user,
            'introduction_orther' => $introduction_orther,

            'customertype' => $customertype,
            'personalcashflow' => $personalcashflow,
            'invest' => $invest,
            'saving' => $saving,
            'financial' => $financial,

            'customerstatustype' => $customerstatustype,
            'officer_user_id' => $officer_user_id,
            'approved' => $approved,
            'approved_user_id' => $approved_user_id,
            'approved_at' => $approved_at,
            'approvestatustype' => $approvestatustype,

            'updated_user_id' => $updated_user_id,
        ];

        //Cap nhat ten hien thi dang nhap vao table customer
        if ($fullname != ""){
            \DB::table('users')
                ->where('customer_id', '=', $id)
                ->update(['name' => $fullname]);
        }

        return $this->repository->update($data, $id);
    }

    public function updateSecurityCustomer($request, $customer_id)
    {
        $minimumpasswordlength = config('app.minimumpasswordlength');

        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;
        $confirmnewpassword = $request->confirmnewpassword;
        $user = app(User::class)->where('customer_id', '=', $customer_id);
        $oldpassword_check = $user->first()->password;

        $ret = "0";
        if(Hash::check($oldpassword, $oldpassword_check)) {
            if (mb_strlen($newpassword)<$minimumpasswordlength){
                $ret = "2"; //mat khau moi phai dai toi thieu $minimumpasswordlength    
            }elseif ($newpassword != $confirmnewpassword){
                $ret = "3"; //mat khau moi va confirm khong giong nhau         
            }
        }else{
            $ret = "1"; //mat khau cu khong khop voi mat khau da luu            
        }

        if ($ret == "0"){
            $password = bcrypt($newpassword);
            \DB::table('users')
                ->where('customer_id', '=', $customer_id)
                ->update(['password' => $password]);
        }
        
        return $ret;
    }
        
    public function getListCustomer($request)
    {
        $searchField = ($request->searchField == null ? 'fullname' : $request->searchField);
        $searchValue = ($request->searchValue == null ? '' : $request->searchValue);
        $searchCustomerStatusType = ($request->searchCustomerStatusType == null ? '' : $request->searchCustomerStatusType);

        $listCustomer = app(Customer::class)->where($searchField, 'like', "%$searchValue%")
                                            ->where('customerstatustype', 'like', "%$searchCustomerStatusType%")
                                            ->orderBy('created_at', 'DESC');
        return $listCustomer;    
    }

    public function sendEmailUserCustomer($request)
    {
        $ret = 0;

        $email = $request->email;
        $user = app(User::class)->where('email', '=', $email);
        $user_id = ($user->first() == null ? "" : $user->first()->id);
        if ($user_id != ""){
            $password = str_random(10);
            $data = [
                'password' => $password,
            ];
            $user = app(UserCustomerService::class)->resetPasswordUserCustomer($data, $user_id);
        	$ret = 1;
        }else{
        	$ret = 0;
        }

        return $ret;
    }

    public function sendInforBankAccount($contract_id)
    {
        $ret = 0;

        $contract = app(Contract::class)->where('id', '=', $contract_id);
        $customer_id = ($contract->first() == null ? "" : $contract->first()->customer_id);
        
        if ($customer_id != ""){
            $customer = app(Customer::class)->where('id', '=', $customer_id);

            $ret = app(UserCustomerService::class)->sendInforBankAccount($customer->first(), $contract->first());
        }else{
            $ret = 0;
        }


        return $ret;
    }

    /**
     * getUserByEmail
     * Lay danh sach user
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getCustomerByEmail($searchEmail)
    {
        $listData = app(Customer::class)->where('email', '=', "$searchEmail")->first();
        
        return $listData;    
    } 
}
