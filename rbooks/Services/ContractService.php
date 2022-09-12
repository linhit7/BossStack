<?php

namespace RBooks\Services;

use RBooks\Repositories\ContractRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\Contract;
use RBooks\Models\Customer;
use RBooks\Services\ServiceProductService;
use RBooks\Services\UserCustomerService;
use RBooks\Repositories\CustomerRepository;

class ContractService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(ContractRepository::class);
    }

    public function create($request)
    {

        $customer_id = quote_smart($request->customer_id);
        $contractno = quote_smart($request->contractno);
        $contractdate = ($request->contractdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->contractdate)));
        $contractstatustype = quote_smart($request->contractstatustype);
        $currency = quote_smart('VND');
        $lastcontractdate = ($request->lastcontractdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->lastcontractdate)));

        $personalcashflow = '1';
        $invest = '1';
        $saving = '1';
        $financial = '1';

        $service_product_id = $request->service_product_id;
        $serviceproduct = app(ServiceProductService::class)->getServiceProductFromId($service_product_id, '1')->first();
        $service_product_code = quote_smart($serviceproduct->code);
        $service_product_name = quote_smart($serviceproduct->name);
        $service_product_price = quote_smart($serviceproduct->price);

        $termtype = $serviceproduct->termtype;
        $term = 1;

        $description = quote_smart($request->description);
        $finish = quote_smart($request->finish);
        $finishdate = quote_smart($request->finishdate);

        $officer_user_id = quote_smart($request->officer_user_id);
        $approved = quote_smart($request->approved);
        $approved_user_id = quote_smart($request->approved_user_id);
        $approved_at = ($request->approved_at==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->approved_at)));
        $approvestatustype = quote_smart($request->approvestatustype);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'customer_id' => $customer_id,
            'contractno' => $contractno,
            'contractdate' => $contractdate,
            'contractstatustype' => $contractstatustype,
            'currency' => $currency,
            'term' => $term,
            'termtype' => $termtype,
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

        return $this->repository->create($data);
    }

    public function update($request, $id)
    {
        $customer_id = quote_smart($request->customer_id);
        $contractno = quote_smart($request->contractno);
        $contractdate = ($request->contractdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->contractdate)));
        $contractstatustype = quote_smart($request->contractstatustype);
        $currency = quote_smart('VND');
        $lastcontractdate = ($request->lastcontractdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->lastcontractdate)));
        $service_product_id = quote_smart($request->service_product_id);

        $personalcashflow = '1';
        $invest = '1';
        $saving = '1';
        $financial = '1';

        $payment = quote_smart($request->payment);

        $description = quote_smart($request->description);
        $finish = quote_smart($request->finish);
        $finishdate = quote_smart($request->finishdate);

        $officer_user_id = quote_smart($request->officer_user_id);
        $approved = quote_smart($request->approved);
        $approved_user_id = quote_smart($request->approved_user_id);
        $approved_at = ($request->approved_at==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->approved_at)));
        $approvestatustype = quote_smart($request->approvestatustype);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'customer_id' => $customer_id,
            'contractno' => $contractno,
            'contractdate' => $contractdate,
            'contractstatustype' => $contractstatustype,
            'currency' => $currency,
            'lastcontractdate' => $lastcontractdate,
            'personalcashflow' => $personalcashflow,
            'invest' => $invest,
            'saving' => $saving,
            'financial' => $financial,
            'payment' => $payment,
            'description' => $description,
            'finish' => $finish,
            'finishdate' => $finishdate,
            'officer_user_id' => $officer_user_id,
            'approved' => $approved,
            'approved_user_id' => $approved_user_id,
            'approved_at' => $approved_at,
            'approvestatustype' => $approvestatustype,
            'updated_user_id' => $updated_user_id,
        ];

        $contract = $this->repository->update($data, $id);

        $data = [
            'customerstatustype' => 2,
        ];
        $customer = app(CustomerRepository::class)->update($data, $customer_id); 

        $typereport = $request->typereport;
        if ($typereport == 'updateCreateAccount'){
            $name = $contract->customer()->first()->fullname;
            $email = $contract->customer()->first()->email;
            $password = str_random(10);
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => 'KH',
                'customer_id' => $customer_id,
                'updated_user_id' => Auth::user()->id,
                'blocked' => 0,
                'approved_product' => 1,
                'begin_at_product' => $contractdate,
                'finish_at_product' => $lastcontractdate,
            ];

            $user = app(UserCustomerService::class)->createDataUser($data);  

        }elseif ($typereport == 'updateChageAccount'){
            $user_id = ($contract->customer()->first()->userCustomer()->first() == null ? '' : $contract->customer()->first()->userCustomer()->first()->id);
            $data = [
                'service_product_id' => $service_product_id,
                'blocked' => 0,
                'approved_product' => 1,
                'begin_at_product' => $contractdate,
                'finish_at_product' => $lastcontractdate,
            ];
            $user = app(UserCustomerService::class)->updateDataUser($data, $user_id);  
        }
        
        return $contract;
    }

    public function updateContract($request, $id)
    {
        $contractdate = ($request->contractdate==""?getCurrentDate('d'):$request->contractdate);

        $service_product_id = $request->service_product_id;
        $serviceproduct = app(ServiceProductService::class)->getServiceProductFromId($service_product_id, '1')->first();
        $service_product_code = quote_smart($serviceproduct->code);
        $service_product_name = quote_smart($serviceproduct->name);
        $service_product_price = quote_smart($serviceproduct->price);

        $termtype = $serviceproduct->termtype;
        $term = 1;

        $nummonth = 0;
        $lastcontractdate = '';
        if ($termtype == 'm'){
            $nummonth = 1;
        }elseif ($termtype == 'p'){
            $nummonth = 3;        
        }elseif ($termtype == 'y'){
            $nummonth = 12;            
        }        
        $lastcontractdate = DateAdd ($contractdate,'m',$nummonth);
        $contractdate = ($request->contractdate==""?getCurrentDate('d'):quote_smart(FormatDateForSQL($request->contractdate)));
        $lastcontractdate = quote_smart(FormatDateForSQL($lastcontractdate));
        
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'contractdate' => $contractdate,
            'term' => $term,
            'termtype' => $termtype,
            'lastcontractdate' => $lastcontractdate,
            'service_product_id' => $service_product_id,
            'service_product_code' => $service_product_code,
            'service_product_name' => $service_product_name,
            'service_product_price' => $service_product_price,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->update($data, $id);
    }
    
    public function getListContract($request)
    {
        $searchField = ($request->searchField == null ? 'fullname' : $request->searchField);
        $searchValue = ($request->searchValue == null ? '' : $request->searchValue);
        $searchContractStatusType = ($request->searchContractStatusType == null ? '1' : $request->searchContractStatusType);

        $listContract = DB::table('contracts')->leftjoin('customers', 'customers.id', '=', 'contracts.customer_id')
                        ->select('contracts.id','fullname','birthday','address','phone','email','contractno','contractdate','contractstatustype','currency','term','termtype','lastcontractdate','discount','amount','contracts.personalcashflow','contracts.invest','contracts.saving','contracts.financial','description','finish','finishdate','contracts.officer_user_id','contracts.approved','contracts.approved_user_id','contracts.approved_at','contracts.approvestatustype','contracts.created_at','service_product_id','service_product_code','service_product_name','service_product_price','payment','paymentmethod')
                        ->where('contracts.deleted_at', '=', null)
                        ->where($searchField, 'like', "%$searchValue%")
                        ->where('contractstatustype', 'like', "%$searchContractStatusType%")
                        ->orderBy('contractdate', 'desc');
                        ;
                        
        return $listContract;    
    }

    public function getListContractFromCustomer($customer_id, $contractstatustype, $approvestatustype)
    {
        $check = [
                    ['contracts.deleted_at', '=', null],
                    ['contracts.customer_id', '=', $customer_id],
                 ];
        if($contractstatustype != ""){
            $check[] = ['contracts.contractstatustype', '=', "$contractstatustype"];   
        }
        if($approvestatustype != ""){
            $check[] = ['contracts.approvestatustype', '=', "$approvestatustype"];   
        }

        $listData = DB::table('contracts')->leftjoin('customers', 'customers.id', '=', 'contracts.customer_id')
                        ->select('contracts.id','fullname','birthday','address','phone','email','contractno','contractdate','contractstatustype','currency','term','termtype','discount','amount','lastcontractdate','contracts.personalcashflow','contracts.invest','contracts.saving','contracts.financial','description','finish','finishdate','contracts.officer_user_id','contracts.approved','contracts.approved_user_id','contracts.approved_at','contracts.approvestatustype','contracts.created_at','service_product_id','service_product_code','service_product_name','service_product_price','payment','paymentmethod')
                        ->where($check)
                        ->orderBy('contracts.id', 'desc')
                        ->orderBy('contracts.contractdate', 'desc');

        return $listData;  

    }    

    public function storeProduct($customer_id, $request)
    {
        //Thong tin don hang dang ky dich vu
        $service_product_id = $request->service_product_id;//Dang ky su dung goi dich vu theo ca nhan, doanh nghiep, vip
        $producttypes_numtime = $request->producttypes_numtime;
        $producttypes_discount = $request->producttypes_discount;
        $producttypes_amount = $request->producttypes_amount;

        $serviceproduct = app(ServiceProductService::class)->getServiceProductFromId($service_product_id, '1')->first();
        $termtype = $serviceproduct->termtype;
        $term = $producttypes_numtime;
        $service_product_id = quote_smart($service_product_id);
        $service_product_code = quote_smart($serviceproduct->code);
        $service_product_name = quote_smart($serviceproduct->name);
        $service_product_price = quote_smart($serviceproduct->price);
        $service_product_numtime = quote_smart($serviceproduct->numtime);                

        $contractdate = getCurrentDate('d');
        $dateArray = explode('/', $contractdate);
        $day = $dateArray[0]; $month = $dateArray[1]; $year = substr($dateArray[2], 2, 2);

//        $maxValue = app(Contract::class)::max('contractcode');
//        $maxValue = intval($maxValue) + 1;
//        $maxValue = addPadding( $maxValue, 8, '0');
        $maxValue = getTokenDateTime();
        $contractno = "HD" . $month . $year . $maxValue;
        $contractcode = $maxValue;
        
        $nummonth = $producttypes_numtime; 
        $termmonth = "m";
        $lastcontractdate = DateAdd ($contractdate,$termmonth,$nummonth);

        
        $customer_id = quote_smart($customer_id); 
        $contractno = quote_smart($contractno);
        $contractcode = quote_smart($contractcode);
        $contractdate = quote_smart(FormatDateForSQL($contractdate));
        $contractstatustype = quote_smart('1');
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
        $approved = quote_smart('0');
        $approved_user_id = quote_smart('');
        $approved_at = quote_smart('');
        $approvestatustype = quote_smart('P');//Dang cho duyet

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
            'lastcontractdate' => $lastcontractdate,
            'discount' => $producttypes_discount,
            'amount' => $producttypes_amount,
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

        $ret = $this->repository->create($dataContract);

        return $ret;
    }

    public function getContractFromContractNo($contractno)
    {
        $search = array('contractno'=>$contractno);
        $listData = app(ContractRepository::class)->findWhere($search);

        return $listData;    
    }    

    public function updateContractPayment($payment, $paymentmethod, $orderid)
    {
        $id = $this->getContractFromContractNo($orderid)->first()->id;

        $payment = quote_smart($payment);
        $paymentmethod = quote_smart($paymentmethod);

        $data = [
            'payment' => $payment,
            'paymentmethod' => $paymentmethod,
        ];

        return $this->repository->update($data, $id);
    }
    
      
}
