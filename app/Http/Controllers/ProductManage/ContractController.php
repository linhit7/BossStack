<?php

namespace App\Http\Controllers\ProductManage;

use \Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\ContractService;
use RBooks\Services\CustomerService;
use RBooks\Services\UserService;
use RBooks\Services\UserCustomerService;
use RBooks\Services\ServiceProductService;
use App\Http\Requests\ContractStoreRequest;
use App\Http\Requests\ContractUpdateRequest;
use App\Constants\NotificationMessage;
use App\Exports\ContractExport;
use App\Constants\Export;
use Excel;

class ContractController extends Controller
{
    public function __construct(ContractService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.contract.');
        $this->setRoutePrefix('contracts-');

        $this->view->setHeading('QUẢN LÝ DỊCH VỤ');

        $this->view->searchField = 'fullname';
        $this->view->searchValue = '';
        $this->view->searchContractStatusType = '1';

    }

    public function index(Request $request)
    {
        $searchField = ($request->searchField == null ? 'fullname' : $request->searchField);
        $searchValue = ($request->searchValue == null ? '' : $request->searchValue);
        $searchContractStatusType = ($request->searchContractStatusType == null ? '1' : $request->searchContractStatusType);

        $typereport = ($request->typereport == null ? '' : $request->typereport);
        if ($typereport != ''){
        	$searchContractStatusType = $typereport;
            $request->searchContractStatusType = $searchContractStatusType; 
        }
        
        $this->view->searchField = $searchField;
        $this->view->searchValue = $searchValue;
        $this->view->searchContractStatusType = $searchContractStatusType;

        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->fundtype = config('rbooks.FUNDTYPE');
        $this->view->contractstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');
        $this->view->paymenttype = config('rbooks.PAYMENTTYPE');
                
        $collections = $this->main_service->getListContract($request)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;
               
        return $this->view('index');
    }

    public function beforeAdd()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->currencytype = config('rbooks.CURRENCYTYPE');
        $this->view->finishtype = config('rbooks.FINISHTYPE');
        $this->view->termtype = config('rbooks.TERMTYPE');
        $this->view->contractstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');
        $this->view->paymenttype = config('rbooks.PAYMENTTYPE');
        
        $this->view->users = app(UserService::class)->getListUser('BH');
        $this->view->approvedusers = app(UserService::class)->getListUser('GD');
        $this->view->customers = app(CustomerService::class)->getAll();
        $this->view->serviceproduct = app(ServiceProductService::class)->getListServiceProduct(1);

    }

    public function store(ContractStoreRequest $request)
    {
        return $this->_store($request);
    }

    public function edit($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->currencytype = config('rbooks.CURRENCYTYPE');
        $this->view->finishtype = config('rbooks.FINISHTYPE');
        $this->view->termtype = config('rbooks.TERMTYPE');
        $this->view->contractstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');
        $this->view->paymenttype = config('rbooks.PAYMENTTYPE');
        $this->view->producttypes = config('rbooks.PRODUCTTYPES');
                
        $this->view->users = app(UserService::class)->getListUser('BH');
        $this->view->approvedusers = app(UserService::class)->getListUser('GD');
        $this->view->customers = app(CustomerService::class)->getAll();
                        
        $this->view->model = $this->main_service->find($id);
        $checkemail = ($this->view->model->customer()->first()->userCustomer()->first() == null ? '' : 'disabled'); 
        $this->view->checkemail = $checkemail;

        $this->view->setSubHeading('Chỉnh sửa');

        return $this->view('edit');
    }

    public function editContract($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->currencytype = config('rbooks.CURRENCYTYPE');
        $this->view->finishtype = config('rbooks.FINISHTYPE');
        $this->view->termtype = config('rbooks.TERMTYPE');
        $this->view->contractstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');
        $this->view->paymenttype = config('rbooks.PAYMENTTYPE');
        
        $this->view->users = app(UserService::class)->getListUser('BH');
        $this->view->approvedusers = app(UserService::class)->getListUser('GD');
        $this->view->customers = app(CustomerService::class)->getAll();
        $this->view->serviceproduct = app(ServiceProductService::class)->getListServiceProduct(1);
                        
        $this->view->model = $this->main_service->find($id);
        $this->view->setSubHeading('Chỉnh sửa');

        return $this->view('editContract');
    }
    
    public function update(ContractStoreRequest $request, $id)
    {
        return $this->_update($request, $id);
    }

    public function updateContract(ContractUpdateRequest $request, $id)
    {
        $result = $this->main_service->updateContract($request, $id);
        $message = ""; $alert = "alert-success";
        if ($result){
            $message = "Thông tin đã được cập nhật thành công !";
        }else{
            $message = "Thông tin cập nhật không thành công. Vui lòng nhập lại.";
            $alert = "alert-error";
        }
        $this->view->infor = $message;
        $this->view->alert = $alert;

        $this->view->model = $result;
        
        return redirect()
            ->route('contracts-listContractQueue')
            ->with(NotificationMessage::UPDATE_SUCCESS);
        
    }

    public function deleteContract($id)
    {
        $this->main_service->delete($id);

        return redirect()
            ->route('contracts-listContractQueue')
            ->with(NotificationMessage::DELETE_SUCCESS);
    }
            
    public function listContract()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->fundtype = config('rbooks.FUNDTYPE');
        $this->view->contractstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');
        $this->view->paymenttype = config('rbooks.PAYMENTTYPE');

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);        
        $collections = $this->main_service->getListContractFromCustomer($customer_id, 1)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        $this->view->setHeading('THÔNG TIN DỊCH VỤ');                
        return $this->view('listContract');
    }

    public function listContractNew()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->fundtype = config('rbooks.FUNDTYPE');
        $this->view->contractstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');
        $this->view->paymenttype = config('rbooks.PAYMENTTYPE');

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);        
        $collections = $this->main_service->getListContractFromCustomer($customer_id, 1, "")->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        $this->view->setHeading('THÔNG TIN DỊCH VỤ');
        $this->view->setSubHeading('Dịch vụ mới khởi tạo');                
        return $this->view('listContract');
    }

    public function listContractQueue()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->fundtype = config('rbooks.FUNDTYPE');
        $this->view->contractstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');
        $this->view->paymenttype = config('rbooks.PAYMENTTYPE');

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);        
        $collections = $this->main_service->getListContractFromCustomer($customer_id, 1, "P")->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        $this->view->setHeading('THÔNG TIN DỊCH VỤ');
        $this->view->setSubHeading('Dịch vụ đang chờ duyệt');                
        return $this->view('listContract');
    }
    
    public function listContractRunning()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->fundtype = config('rbooks.FUNDTYPE');
        $this->view->contractstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');
        $this->view->paymenttype = config('rbooks.PAYMENTTYPE');

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);        
        $collections = $this->main_service->getListContractFromCustomer($customer_id, 2, "A")->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        $this->view->setHeading('THÔNG TIN DỊCH VỤ');
        $this->view->setSubHeading('Dịch vụ đang sử dụng');                
        return $this->view('listContract');
    }

    public function listContractExpried()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->fundtype = config('rbooks.FUNDTYPE');
        $this->view->contractstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');
        $this->view->paymenttype = config('rbooks.PAYMENTTYPE');

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);        
        $collections = $this->main_service->getListContractFromCustomer($customer_id, 3, "A")->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        $this->view->setHeading('THÔNG TIN DỊCH VỤ');
        $this->view->setSubHeading('Dịch vụ đã hết hạn');                
        return $this->view('listContract');
    }
    
    public function detailContract($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->currencytype = config('rbooks.CURRENCYTYPE');
        $this->view->finishtype = config('rbooks.FINISHTYPE');
        $this->view->termtype = config('rbooks.TERMTYPE');
        $this->view->contractstatustype = config('rbooks.CONTRACTSTATUSTYPE');
        $this->view->approvestatustype = config('rbooks.APPROVESTATUSTYPE');
        $this->view->paymenttype = config('rbooks.PAYMENTTYPE');
        
        $this->view->users = app(UserService::class)->getListUser('BH');
        $this->view->approvedusers = app(UserService::class)->getListUser('GD');
        $this->view->customers = app(CustomerService::class)->getAll();
                
        $this->view->model = $this->main_service->find($id);
        $this->view->setHeading('THÔNG TIN DỊCH VỤ');

        return $this->view('detailContract');
    }
    
    public function addContract()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->serviceproduct = app(ServiceProductService::class)->getListServiceProduct(1);
        $this->view->producttypes = config('rbooks.PRODUCTTYPES');

        $this->view->setHeading('THÔNG TIN DỊCH VỤ');
        $this->view->setSubHeading('Đăng ký dịch vụ');                
        return $this->view('addContract');

    }
    
    public function addProduct(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $this->view->customer = app(CustomerService::class)->find($customer_id);
        $producttypes = config('rbooks.PRODUCTTYPES');
        
        $typereport = ($request->typereport == null ? '4' : $request->typereport);
       
        $producttypes_field = "producttypes_$typereport";//Lay goi chiet khau 3,6,12 thang
        $producttypes_value = ($request->$producttypes_field == null ? '0' : $request->$producttypes_field);
        $producttypes_select = $producttypes[$producttypes_value];
                
        $serviceproduct = app(ServiceProductService::class)->getServiceProductFromId($typereport,1)->first();
        $price = $serviceproduct->price;
        $discount_amount = ($price*$producttypes_select['discount'])/100;
        $amount = ($price - $discount_amount)*$producttypes_select['month'];

        $producttypes_numtime = 0; $producttypes_discount= 0; $producttypes_amount = 0;
        $producttypes_name = $serviceproduct->name;//Ten san pham
        if ($typereport != 4){//Mo tai khoan
            $producttypes_numtime = $producttypes_select['month'];//Goi san pham 3, 6, 12 thang
            $producttypes_discount = $producttypes_select['discount'];//Chiet khau
            $producttypes_amount = $amount;//So tien thanh toan        
        }
        
        $this->view->service_product_id = $typereport;//San pham Ca nhan, Doanh nghiep, Vip
        $this->view->service_product_name = $serviceproduct->name;
        $this->view->service_product_price = $price;
        $this->view->producttypes_name = $producttypes_name;       
        $this->view->producttypes_numtime = $producttypes_numtime;       
        $this->view->producttypes_discount = $producttypes_discount;
        $this->view->producttypes_amount = $producttypes_amount;        


        $this->view->setHeading('THÔNG TIN DỊCH VỤ');
        $this->view->setSubHeading('Đăng ký dịch vụ / Tài khoản');                
        return $this->view('addProduct');
    }          

    public function storeProduct(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $this->view->customer = app(CustomerService::class)->find($customer_id);
        
        $result = $this->main_service->storeProduct($customer_id, $request);

        $this->view->id = $result->id;
        $this->view->contractno = $result->contractno;
        $this->view->service_product_id = $result->service_product_id;
        $this->view->service_product_name = $result->service_product_name;
        $this->view->service_product_price = $result->service_product_price;
        $this->view->producttypes_numtime = $result->term;       
        $this->view->producttypes_discount = $result->discount;
        $this->view->producttypes_amount = $result->amount;        

        $this->view->setHeading('THÔNG TIN DỊCH VỤ');
        $this->view->setSubHeading('Đăng ký dịch vụ / Tài khoản / Thanh toán');                

        return $this->view('paymentProduct');
    }
    
    public function processPaymentMomo(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $this->view->customer = app(CustomerService::class)->find($customer_id);
        
        $this->view->setHeading('THÔNG TIN THANH TOÁN');
        $this->view->setSubHeading('Đăng ký dịch vụ / Tài khoản / Thanh toán');

        $contract_id = $request->cid;
        $ord_payment_method = $request->ord_payment_method;
        if ($ord_payment_method == "0" or $ord_payment_method == "1" or $ord_payment_method == "2"){//Chon thanh toan truc tiep, chuyen khoan

            $message = 'Đăng ký dịch vụ thành công. Vui lòng thanh toán để hoàn tất đơn hàng (bỏ qua thông báo này nếu bạn đã hoàn tất thanh toán).';
            $this->view->infor = $message;
            $this->view->errorCode = "0";//Dang ky thanh cong, chua thanh toan

            if ($ord_payment_method == "1"){
                $result = app(CustomerService::class)->sendInforBankAccount($contract_id);              
            }

            return $this->view('resultPaymentMomo');        	

        }elseif ($ord_payment_method == "2_"){//Chon thanh toan qua vi momo
            $contract = $this->main_service->find($contract_id);

            $orderInfo = "Thanh toán gói dịch vụ " . $contract->service_product_name;
            $amount = $contract->amount . "";
            $orderId = $contract->contractno;

            $url = config('app.urlhost');    
            $returnUrl = "$url/public/contracts/resultPaymentMomo";
            $notifyurl = "$url/public/contracts/ipnPaymentMomo";

            $jsonResult = processSendRequestToMOMO($orderId, $orderInfo, $amount, $returnUrl, $notifyurl);

            return redirect($jsonResult['payUrl']);
        }

        return true;
    }    

    public function resultPaymentMomo(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $this->view->customer = app(CustomerService::class)->find($customer_id);

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

        //Thanh toan thanh cong
        if ($error == '0') {
           $ret = app(ContractService::class)->updateContractPayment('1', '2', $orderId);//Cap nhat thanh toan thanh cong qua vi MOMO
        }

        $this->view->errorCode = $error;
        $this->view->infor = $message;
        
        $this->view->setHeading('THÔNG TIN THANH TOÁN');
        $this->view->setSubHeading('Thanh toán qua MOMO');                

        return $this->view('resultPaymentMomo');

    }    
}
