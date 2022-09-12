<?php

namespace App\Http\Controllers\ProductManage;

use \DB;
use \Auth;
use Illuminate\Support\Facades\Crypt;
use App\Constants\NotificationMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CustomerService;
use RBooks\Services\ContractService;
use RBooks\Services\UserService;
use RBooks\Services\UserCustomerService;
use RBooks\Services\OperationLogService;
use RBooks\Services\ServiceProductService;
use RBooks\Services\FamilyRelationshipService;
use RBooks\Services\CouponService;
use RBooks\Services\CouponCustomerService;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\FamilyRelationshipStoreRequest;
use RBooks\Models\Customer;
use RBooks\Models\FamilyRelationship;
use App\Exports\CustomerExport;
use App\Constants\Export;
use Excel;

class CustomerController extends Controller
{
    public function __construct(CustomerService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.customer.');
        $this->setRoutePrefix('customers-');

        $this->view->setHeading('QUẢN LÝ KHÁCH HÀNG');

        $this->view->searchField = 'fullname';
        $this->view->searchValue = '';
        $this->view->searchCustomerStatusType = '1';

    }

    public function index(Request $request)
    {

        $searchField = ($request->searchField == null ? 'fullname' : $request->searchField);
        $searchValue = ($request->searchValue == null ? '' : $request->searchValue);
        $searchCustomerStatusType = ($request->searchCustomerStatusType == null ? '1' : $request->searchCustomerStatusType);

        $this->view->searchField = $searchField;
        $this->view->searchValue = $searchValue;
        $this->view->searchCustomerStatusType = $searchCustomerStatusType;

        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->fundtype = config('rbooks.FUNDTYPE');
        $this->view->gendertype = config('rbooks.GENDERTYPE');
        $this->view->customertype = config('rbooks.CUSTOMERTYPE');
        $this->view->customerstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->serviceproduct = app(ServiceProductService::class)->getListServiceProduct(1);
        
        $collections = $this->main_service->getListCustomer($request)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;
                
        return $this->view('index');
    }
   
    public function beforeAdd()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->gendertype = config('rbooks.GENDERTYPE');
        $this->view->customertype = config('rbooks.CUSTOMERTYPE');
        $this->view->customerstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');

        $this->view->users = app(UserService::class)->getListUser('BH');
        $this->view->approvedusers = app(UserService::class)->getListUser('GD');

        $maxValue = app(Customer::class)::max('customercode');
        $maxValue = intval($maxValue) + 1;
        $maxValue = addPadding( $maxValue, 8, '0');
        $this->view->customercode = $maxValue;

        $this->view->usersLogin = app(UserCustomerService::class)->getAll();
    }

    public function registerCustomer(Request $request)
    {
        $this->view->gendertype = config('rbooks.GENDERTYPE');
        $this->view->customertype = config('rbooks.CUSTOMERTYPE');
        $producttypes = config('rbooks.PRODUCTTYPES');

        //Du lieu lay tu trang home chuyen sang
        $typereport = ($request->typereport == null ? '4' : $request->typereport);
        $producttypes_field = "producttypes_$typereport";//Lay goi chiet khau 3,6,12 thang
        $producttypes_value = ($request->$producttypes_field == null ? '0' : $request->$producttypes_field);

        $serviceproduct = app(ServiceProductService::class)->getListServiceProduct(1);
        $this->view->service_product = $serviceproduct;//Danh sach goi san pham Ca nhan, Doanh nghiep, Vip
        $this->view->producttypes = $producttypes;//Loai chiet khau 0: 0% 1: 20%, 2: 30%, 3: 50%
        
        $this->view->typereport = $typereport;//San pham da chon
        $this->view->producttype = $producttypes_value;//Loai chiet khau da chon

        return $this->view('register');
    }

    public function addCustomer(CustomerStoreRequest $request)
    {
        $resultContract = $this->main_service->createCustomer($request);
        $message = "";
        if ($resultContract == null){
            $message = 'Lỗi lưu dữ liệu.';
            $this->view->infor = $message;
            $this->view->errorCode = "-1";
            return $this->view('message');
        }
        
        $contract_id = $resultContract->id;         
        $customer_id = $resultContract->customer_id;  

        $this->view->customer = app(CustomerService::class)->find($customer_id);
        
        $this->view->id = $resultContract->id;
        $this->view->contractno = $resultContract->contractno;
        $this->view->service_product_id = $resultContract->service_product_id;
        $this->view->service_product_name = $resultContract->service_product_name;
        $this->view->service_product_price = $resultContract->service_product_price;
        $this->view->producttypes_numtime = $resultContract->term;       
        $this->view->producttypes_discount = $resultContract->discount;
        $this->view->producttypes_amount = $resultContract->amount;        

        if ($resultContract->service_product_id == 4){//Dang ky mien phi mo tai khoan
            $message = 'Đăng ký dịch vụ thành công.';
            $this->view->infor = $message;
            $this->view->errorCode = "1";//Dang ky thanh cong, mo mien phi

        	return $this->view('message');
        }
        
        return $this->view('paymentCustomer');
    }

    public function processPaymentMomo(Request $request)
    {
        $contract_id = $request->cid;
        $ord_payment_method = $request->ord_payment_method;
        if ($ord_payment_method == "0" or $ord_payment_method == "1" or $ord_payment_method == "2"){//Chon thanh toan truc tiep, chuyen khoan

            $message = 'Đăng ký dịch vụ thành công. Vui lòng thanh toán để hoàn tất đơn hàng (bỏ qua thông báo này nếu bạn đã hoàn tất thanh toán).';
            $this->view->infor = $message;
            $this->view->errorCode = "1";//Dang ky thanh cong, chua thanh toan

            if ($ord_payment_method == "1"){
                $result = $this->main_service->sendInforBankAccount($contract_id);            	
            }

            return $this->view('message');            

        }elseif ($ord_payment_method == "2_"){//Chon thanh toan qua vi momo

            $contract = app(ContractService::class)->find($contract_id);
 
            $orderInfo = "Thanh toán gói dịch vụ " . $contract->service_product_name;
            $amount = $contract->amount . "";
            $orderId = $contract->contractno;
    
            $url = config('app.urlhost');
            $returnUrl = "$url/public/customers/resultPaymentMomo";
            $notifyurl = "$url/public/customers/ipnPaymentMomo";

            $jsonResult = processSendRequestToMOMO($orderId, $orderInfo, $amount, $returnUrl, $notifyurl);
            
            return redirect($jsonResult['payUrl']);
        }

        return true;
    }    

    public function resultPaymentMomo(Request $request)
    {
        $partnerCode = $request->partnerCode;
        $accessKey = $request->accessKey;
        $orderId = $request->orderId;
        $localMessage = $request->localMessage;
        $message = $request->message;
        $transId = $request->transId;
        $orderInfo = $request->orderInfo;
        $amount = $request->amount;
        $errorCode = $request->errorCode;
        $responseTime = $request->responseTime;
        $requestId = $request->requestId;
        $extraData = $request->extraData;
        $payType = $request->payType;
        $orderType = $request->orderType;
        $m2signature = $request->signature; //MoMo signature

        $retData = checkResultSendRequestToMOMO($partnerCode, $accessKey, $requestId, $amount, $orderId, $orderInfo, $orderType, $transId, $message, $localMessage, $responseTime, $errorCode, $payType, $extraData, $m2signature);
        $error = $retData['error'];
        $message = $retData['message'];   

        $orderId = $request->orderId;
        //Thanh toan thanh cong
        if ($error == '0') {
           $ret = app(ContractService::class)->updateContractPayment('1', '2', $orderId);//Cap nhat thanh toan thanh cong qua vi MOMO
        }

        $this->view->errorCode = $error;
        $this->view->infor = $message;
        
        $this->view->setHeading('THÔNG TIN THANH TOÁN');
        $this->view->setSubHeading('Thanh toán qua MOMO');                

        return $this->view('message');

    }    

    public function activeCoupon(Request $request)
    {
        $coupon_customer_id = $request->id;
        $key = $request->key;

        $couponCustomer = app(CouponCustomerService::class)->getCouponCustomerBySearch($coupon_customer_id, $key)->first();
        
        $message = 'Mã ưu đãi không tồn tại !';
        if (isset($couponCustomer)){
            $idcoupon = $couponCustomer->coupon_id;
            $couponcustomer_id = $couponCustomer->id;
            $email = $couponCustomer->email;
            $active = $couponCustomer->active;

            $coupon = app(CouponService::class)->getCouponBySearch('1', $key)->first();//1: dang hieu luc
            $typecoupon = '';
            if (isset($coupon)){
                $typecoupon = $coupon->typecoupon;  
            }
            
            if ($active == ''){
                //Cap nhat thoi han su dung table usercustomer
                $userCustomer = app(UserCustomerService::class)->getListUserBySearch('email', $email)->first();
                $userCustomer_id = '';
                if (isset($userCustomer)){
                	$userCustomer_id = $userCustomer->id;
                }
                
                $blocked_code = "0";
                $beginDate = getCurrentDate('d');
                $finishDate = DateAdd ($beginDate,'m',1);
                if ($typecoupon == '1'){
                    $finishDate = config('app.finishdate_nolimit');	
                }
                $beginDate = quote_smart(FormatDateForSQL($beginDate));
                $finishDate = quote_smart(FormatDateForSQL($finishDate));
                                                
                $dataUserCustomer = [
                    'blocked' => $blocked_code,
                    'begin_at' => $beginDate,
                    'finish_at' => $finishDate,
                ];

                DB::beginTransaction();
                try {
                    $retUserCustomer = app(UserCustomerService::class)->updateDataUser($dataUserCustomer, $userCustomer_id);
                    $couponCustomer = app(CouponCustomerService::class)->updateActive('1', $couponcustomer_id);//1: active ma uu dai            
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                }

                $message = 'Mã ưu đãi đã được kích hoạt thành công !'; 
            }elseif ($active == '1'){
                $message = 'Mã ưu đãi đã được sử dụng !';
            }

        }

        $this->view->infor = $message;
        $this->view->errorCode = "2";//Kich hoat ma uu dai

        return $this->view('message');            
    }
     
    public function store(CustomerStoreRequest $request)
    {
        return $this->_store($request);
    }

    public function edit($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->gendertype = config('rbooks.GENDERTYPE');
        $this->view->customertype = config('rbooks.CUSTOMERTYPE');
        $this->view->customerstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');

        $this->view->users = app(UserService::class)->getListUser('BH');
        $this->view->approvedusers = app(UserService::class)->getListUser('GD');

        $this->view->usersLogin = app(UserCustomerService::class)->getAll();

        $this->view->model = $this->main_service->find($id);
        $this->view->setSubHeading('Chỉnh sửa');

        return $this->view('edit');
    }

    public function update(CustomerUpdateRequest $request, $id)
    {
        return $this->_update($request, $id);
    }
    
    public function export(Request $request)
    {
        $customers = $this->main_service->getListCustomer($request)->paginate(100000);
        $customerstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $serviceproduct = app(ServiceProductService::class)->getListServiceProduct(1);
        
        foreach ($customers as $customer) {
            $product = ""; $product_time = ""; $product_status = "";
            
            $product = $customer->userCustomer()->first() == null ? '' : $serviceproduct->find($customer->userCustomer()->first()->service_product_id)->name;
            
            if($customer->userCustomer()->first() != null and $customer->userCustomer()->first()->service_product_id != 4){
                $product_time = ($customer->userCustomer()->first() == null ? '' : ConvertSQLDate($customer->userCustomer()->first()->begin_at_product) ) . " - " . ($customer->userCustomer()->first() == null ? '' : ConvertSQLDate($customer->userCustomer()->first()->finish_at_product) );
            } 

            if($customer->customerstatustype == 1){
                $product_status = mb_strtoupper($customerstatustype[$customer->customerstatustype]);        
            }elseif($customer->customerstatustype == 2){
                $product_status = mb_strtoupper($customerstatustype[$customer->customerstatustype]);        
            }else{ 
                $product_status = mb_strtoupper($customerstatustype[$customer->customerstatustype]);        
            }                                 


            $data[] = array(
                'id' => $customer->id,
                'fullname' => $customer->fullname,
                'birthday' => $customer->birthday,
                'phone' => $customer->phone,
                'email' => $customer->email,
                'address' => $customer->address,
                'created_at' => $customer->created_at,
                'product' => $product . " " . $product_time,
                'product_status' => $product_status,                
            );
        }
        return Excel::download(new CustomerExport($data), 'customers-export-' . '-' . date(Export::DATE_FORMAT) . '.xlsx');
    }
    
    public function editCustomer()
    {

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->gendertype = config('rbooks.GENDERTYPE');
        $this->view->customertype = config('rbooks.CUSTOMERTYPE');
        $this->view->relationshiptype = config('rbooks.RELATIONSHIPTYPE');

        $listFamilyRelationship = app(FamilyRelationshipService::class)->getListFamilyRelationshipFromCustomerId($customer_id);
        $this->view->listFamilyRelationship = $listFamilyRelationship;

        $this->view->model = $this->main_service->find($customer_id);
        $this->view->setHeading('THÔNG TIN KHÁCH HÀNG');
        $this->view->setSubHeading('Chỉnh sửa');

        return $this->view('editCustomer');
    }

    public function updateCustomer(CustomerUpdateRequest $request, $id)
    {
        $result = $this->main_service->updateCustomer($request, $id);

        $message = "";
        if ($result){
            $message = "Thông tin đã được cập nhật thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;

        return redirect()
            ->route('customers-editCustomer')
            ->with(NotificationMessage::UPDATE_SUCCESS);
    }
    
    public function profileCustomer()
    {
        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $this->view->model = $this->main_service->find($customer_id);
        $this->view->setHeading('TÀI KHOẢN VÀ EMAIL');

        return $this->view('profileCustomer');
    }                

    public function editSecurityCustomer()
    {
        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $customer_id_encrypt = Crypt::encrypt($customer_id);
        $this->view->customer_id = $customer_id_encrypt;
        
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->minimumpasswordlength = config('app.minimumpasswordlength');
        
        $this->view->model = $this->main_service->find($customer_id);
        $this->view->setHeading('THAY ĐỔI THÔNG TIN BẢO MẬT TÀI KHOẢN');

        return $this->view('securityCustomer');
    }  

    public function updateSecurityCustomer(Request $request)
    {
        $customer_id = $request->customer_id;
        $customer_id_decrypt = Crypt::decrypt($customer_id);

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $customer_id_encrypt = Crypt::encrypt($customer_id);
        $this->view->customer_id = $customer_id_encrypt;
        
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $this->view->model = $this->main_service->find($customer_id_decrypt);
        $this->view->setHeading('THAY ĐỔI THÔNG TIN BẢO MẬT TÀI KHOẢN');

        $errorlog = config('rbooks.ERRORLOG');
        $this->view->minimumpasswordlength = config('app.minimumpasswordlength');
        
        $result = $this->main_service->updateSecurityCustomer($request, $customer_id_decrypt);

        $message = ""; $alert = "alert-success";
        if ($result == "0"){
            $message = "Thông tin đã được cập nhật thành công !";
        }else{
            $message = $errorlog[$result] . " Vui lòng nhập lại.";
            $alert = "alert-error";
        }
        $this->view->infor = $message;
        $this->view->alert = $alert;

        return $this->view('securityCustomer');
    }  
        
    public function historyCustomer()
    {
        $user_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->user_id);
        
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $collections = app(OperationLogService::class)->getListOperationLog($user_id)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        $this->view->setHeading('HOẠT ĐỘNG GẦN ĐÂY');

        return $this->view('historyCustomer');
    }                

    public function forgotPassword(Request $request)
    {
        $this->view->email = "";
        $this->view->process = "0";                
        return $this->view('forgotPassword');
    }

    public function mailForgotPassword(Request $request)
    {

        $result = $this->main_service->sendEmailUserCustomer($request);
        $message = "";
        if ($result == "0"){
            $message = "Địa chỉ email không tồn tại trong hệ thống !";
        }else{
            $message = "Yêu cầu đã được hệ thống xử lý thành công. Vui lòng kiểm tra email để lấy mật khẩu đăng nhập !";
        }

        $this->view->process = $result;
        $this->view->email = $request->email;
        $this->view->infor = $message;
                
        return $this->view('forgotPassword');
    }

    public function addFamilyRelationship()
    {
        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $this->view->model = $this->main_service->find($customer_id);
                
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->relationshiptype = config('rbooks.RELATIONSHIPTYPE');

        $this->view->setHeading('THÔNG TIN MỐI QUAN HỆ');
        $this->view->setSubHeading('Thêm mới');

        return $this->view('addFamilyRelationship');
    }

    public function storeFamilyRelationship(FamilyRelationshipStoreRequest $request)
    {
        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);

        $result = app(FamilyRelationshipService::class)->createFamilyRelationship($request, $customer_id);

        $message = "";
        if ($result){
            $message = "Thông tin đã được cập nhật thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;

        return redirect()
            ->route('customers-editCustomer')
            ->with(NotificationMessage::UPDATE_SUCCESS);
    }

    public function deleteFamilyRelationship($id)
    {
        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);

        $result = app(FamilyRelationshipService::class)->delete($id);

        $message = "";
        if ($result){
            $message = "Thông tin đã được cập nhật thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;

        return redirect()
            ->route('customers-editCustomer')
            ->with(NotificationMessage::DELETE_SUCCESS);
    }

    public function editFamilyRelationship($id)
    {
        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);

        $this->view->familyRelationship = app(FamilyRelationshipService::class)->find($id);
                
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->relationshiptype = config('rbooks.RELATIONSHIPTYPE');

        $this->view->setSubHeading('Chỉnh sửa');

        return $this->view('editFamilyRelationship');
    }

    public function updateFamilyRelationship(FamilyRelationshipStoreRequest $request, $id)
    {
        $result = app(FamilyRelationshipService::class)->updateFamilyRelationship($request, $id);

        $message = "";
        if ($result){
            $message = "Thông tin đã được cập nhật thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;

        return redirect()
            ->route('customers-editCustomer')
            ->with(NotificationMessage::UPDATE_SUCCESS);
    }
    
}
