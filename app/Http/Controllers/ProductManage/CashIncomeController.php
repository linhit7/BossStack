<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Constants\NotificationMessage;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CashAccountService;
use RBooks\Services\CashIncomeService;
use RBooks\Services\CashAssetService;
use RBooks\Services\UserService;
use RBooks\Services\ConfigTypeService;
use App\Http\Requests\CashIncomeStoreRequest;
use RBooks\Models\CashIncome;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use \Auth;
use Illuminate\Support\Facades\Session;
use RBooks\Services\OperationLogService;

class CashIncomeController extends Controller
{
    public function __construct(CashIncomeService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.cashincome.');
        $this->setRoutePrefix('cashincomes-');

        $this->view->setHeading('QUẢN LÝ THU NHẬP / CHI PHÍ');
    }

    public function index(Request $request)
    {
        $this->setViewInit();
        
        return $this->view('index');
    }
 
    /**
     * viewInit
     * Khoi tao tham so de hien thi view
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function viewInit($customer_id)
    {
        $customer_id_encrypt = Crypt::encrypt($customer_id);
        $this->view->customer_id = $customer_id_encrypt;

        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->incomestatustypes = config('rbooks.INCOMESTATUSTYPES');
        $this->view->currencytype = config('rbooks.CURRENCYTYPE');

        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
        $accountno_primary = app(CashAccountService::class)->getCashAccountFromAccountno($accountno)->first();
        $this->view->cashaccount_id = $accountno_primary->id;
        $this->view->cashaccountno = $accountno_primary->accountno;        
        $this->view->cashaccount_name = $accountno_primary->accountname;
        $this->view->cashaccount_amount = $accountno_primary->amount;

        $customercode = (Auth::user()->customer() == null ? "" : Auth::user()->customer()->first()->customercode);
        $defaultUserImage = config('app.pathroot') . config('app.folderdocument') . $customercode . "/";
        $this->view->pathdocument = $defaultUserImage;
    }

     /**
     * setViewInit
     * Khoi tao tham so de hien thi view
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function setViewInit()
    {
        $customer_id = Auth::user()->customer()->first()->id;
        $this->viewInit($customer_id);

        $now = Carbon::now();
        $firstDate = "01/" . $now->month . "/" . $now->year; 
        $fromDate = (session()->get('fromDate') == null ? $firstDate : session()->get('fromDate'));
        $toDate = (session()->get('toDate') == null ? getCurrentDate('d') : session()->get('toDate'));
        $this->view->fromDate = $fromDate;
        $this->view->toDate = $toDate;

        $sfromDate = FormatDateForSQL($fromDate);
        $stoDate = FormatDateForSQL($toDate);
                
        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $collections = $this->main_service->getListAccountIncomeFromCustomer($customer_id, $sfromDate, $stoDate)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        //Danh sach cac khoan no
        $this->view->cashassets = app(CashAssetService::class)->getListAccountAssetFromCustomerByAssetStatusType($customer_id, '3');
    }

    public function list(Request $request)
    {
        $now = Carbon::now();
        $firstDate = "01/" . $now->month . "/" . $now->year; 
        $fromDate = ($request->fromDate == null ? $request->session()->get('fromDate') : $request->fromDate);
        $toDate = ($request->toDate == null ? $request->session()->get('toDate') : $request->toDate);
        $this->view->fromDate = $fromDate;
        $this->view->toDate = $toDate;
        $request->session()->put('fromDate', $fromDate);
        $request->session()->put('toDate', $toDate);

        $sfromDate = FormatDateForSQL($fromDate);
        $stoDate = FormatDateForSQL($toDate);
                
        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $collections = $this->main_service->getListAccountIncomeFromCustomer($customer_id, $sfromDate, $stoDate)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        $this->viewInit($customer_id);

        return $this->view('index');
    }
    
    public function process(Request $request)
    {
        $this->setViewInit();        

        $this->view->incomedate = ($request->incomedate == null ? getCurrentDate('d') : $request->incomedate);

        //Lay danh sach cac muc thu nhap hoac chi phi
        $this->view->incomestatustype = $request->incomestatustype;
        $this->view->incometypes = app(ConfigTypeService::class)->getConfigTypeFromType($request->incomestatustype);

        //Lay danh sach chi tiet cac muc cua thu nhap hoac chi phi
        $incometype = ($request->incometype == null ? '' : $request->incometype);
        $this->view->incometype = $incometype;
        $this->view->incometypedetails = app(ConfigTypeService::class)->getConfigTypeDetailFromId($incometype);

        //Lay danh sach phan loai cac chi muc chi tiet
        $incometypedetail = ($request->incometypedetail == null ? '' : $request->incometypedetail);
        $this->view->incometypedetail = $incometypedetail;
        $this->view->incometypedetaillevels = app(ConfigTypeService::class)->getConfigTypeDetailLevel1FromId($incometypedetail);

        $incometypedetaillevel = ($request->incometypedetaillevel == null ? '' : $request->incometypedetaillevel);
        $this->view->incometypedetaillevel = $incometypedetaillevel;

        $this->view->cashassetid = '';
        $this->view->amount = '';
        $this->view->description = '';
            
        $this->view->setSubHeading('Tạo mới');
        return $this->view('add');
    }

    public function store(CashIncomeStoreRequest $request)
    {
        $checkAmount = 0; 
        $ret = 0;
        $message = "";

        $cashaccount_amount = $request->cashaccount_amount;
        $amount = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));

        if ($request->incomestatustype == '1' and $amount > $cashaccount_amount){
            $checkAmount = 1;
            $message = "Số tiền chi phí phải nhỏ hơn số dư ví tổng. Vui lòng nhập lại.";
        }
        $cashasset_id = $request->cashassetid;
        $incometypedetail = $request->incometypedetail;
        if ($cashasset_id != '' and ($incometypedetail == '101' or $incometypedetail == '102')){
            $cashasset = app(CashAssetService::class)->find($cashasset_id);
            $cashasset_remainamount = $cashasset->remainamount;
            if ($amount > $cashasset_remainamount){
                $checkAmount = 1;
                $message = "Số tiền chi phí phải nhỏ hơn số tiền tài sản nợ cần phải thanh toán. Vui lòng nhập lại.";
            }
        }

        if ($checkAmount == 0){
            $result = $this->main_service->create($request);
            if ($result){
                $ret = 1;
                $message = "Thông tin đã được lưu thành công !";
                $this->view->infor = $message;
                $this->setViewInit();
                return redirect()
                    ->route('cashincomes-index')
                    ->with(NotificationMessage::CREATE_SUCCESS);
            }else{
                $ret = 0;
                $message = "Lỗi lưu dữ liệu !";
            }
        }
        $this->view->checkAmount = $checkAmount;
        $this->view->infor = $message;

        $this->setViewInit();
                
        $this->view->incomestatustype = $request->incomestatustype;
        $this->view->incomedate = getCurrentDate('d');

        //Lay danh sach cac muc thu nhap hoac chi phi
        $this->view->incometypes = app(ConfigTypeService::class)->getConfigTypeFromType($request->incomestatustype);

        //Lay danh sach chi tiet cac muc cua thu nhap hoac chi phi
        $incometype = ($request->incometype == null ? '' : $request->incometype);
        $this->view->incometype = $incometype;
        $this->view->incometypedetails = app(ConfigTypeService::class)->getConfigTypeDetailFromId($incometype);

        //Lay danh sach phan loai cac chi muc chi tiet
        $incometypedetail = ($request->incometypedetail == null ? '' : $request->incometypedetail);
        $this->view->incometypedetail = $incometypedetail;
        $this->view->incometypedetaillevels = app(ConfigTypeService::class)->getConfigTypeDetailLevel1FromId($incometypedetail);

        $incometypedetaillevel = ($request->incometypedetaillevel == null ? '' : $request->incometypedetaillevel);
        $this->view->incometypedetaillevel = $incometypedetaillevel;

        $this->view->cashassetid = $request->cashassetid;
        $this->view->amount = $request->amount;
        $this->view->description = $request->description;        

        //Reset cac tham so textbox
        if ($ret == 1){
            $this->view->incometype = '';
            $this->view->incometypedetail = '';
            $this->view->incometypedetaillevel = '';
            $this->view->cashassetid = '';            
            $this->view->amount = '';
            $this->view->description = '';
        }

        return $this->view('add');
    }

    public function edit($id)
    {
        $this->setViewInit();
        
        $model = $this->main_service->find($id);
        $this->view->model = $model;

        $this->view->incomestatustype = $model->incomestatustype;
                
        //Lay danh sach cac muc thu nhap hoac chi phi
        $this->view->incometypes = app(ConfigTypeService::class)->getConfigTypeFromType($model->incomestatustype);

        //Lay danh sach chi tiet cac muc cua thu nhap hoac chi phi
        $incometype = ($model->incometype == null ? '' : $model->incometype);
        $this->view->incometype = $incometype;
        $this->view->incometypedetails = app(ConfigTypeService::class)->getConfigTypeDetailFromId($incometype);

        //Lay danh sach phan loai cac chi muc chi tiet
        $incometypedetail = ($model->incometypedetail == null ? '' : $model->incometypedetail);
        $this->view->incometypedetail = $incometypedetail;
        $this->view->incometypedetaillevels = app(ConfigTypeService::class)->getConfigTypeDetailLevel1FromId($incometypedetail);

        $incometypedetaillevel = ($model->incometypedetaillevel == null ? '' : $model->incometypedetaillevel);
        $this->view->incometypedetaillevel = $incometypedetaillevel;

        $this->view->setSubHeading('Chỉnh sửa');

        return $this->view('edit');
    }

    public function update(CashIncomeStoreRequest $request, $id)
    {
        $checkError = 0;
        $message = "";
        $typereport = $request->typereport;
        
        $this->setViewInit();

        if ($typereport == "update"){
            //Vi tong
            $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
            $accountno_primary = app(CashAccountService::class)->getCashAccountFromAccountno($accountno)->first();
            $cashaccount_id = $accountno_primary->id;
            $cashaccountno = $accountno_primary->accountno;        
            $cashaccount_amount = $accountno_primary->amount;

            //Thu nhap/chi phi can chỉnh sửa
            $model = $this->main_service->find($id);      
            $incomestatustype = $model->incomestatustype;   
            $amount = $model->amount; 

            //So tien can chinh sua
            $amountUpdate = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));

            if ($incomestatustype == 0){//Thu nhap
                $cashaccount_amount = $cashaccount_amount - $amount + $amountUpdate;
                if ($amountUpdate != $amount and $cashaccount_amount < 0){//Thu nhap -> So tien se dieu chinh khong duoc nho hon so tien can dieu chinh do vi tong < 0 sau khi dieu chinh
                    $checkError = 1;
                    $message = "Ví tổng không đủ số đư để thực hiện chỉnh sửa giao dịch thu nhập/chi phí này.";
                }else{
                    $retCash = app(CashAccountService::class)->updateCashAccount($cashaccount_amount, $cashaccount_id);
                    $retLog = app(OperationLogService::class)->createOperationLog(Auth()->user()->id, '3', 'Cập nhật', "Cập nhật thu nhập giao dịch " . $model->id . " số tiền " . $amountUpdate, 'Cập nhật thu nhập');
        
                    $checkError = 0;
                    $message = "Dữ liệu đã cập nhật thành công.";
                }
            }elseif ($incomestatustype == 1){//Chi phí
                $cashasset_id = $request->cashassetid;
                $incometypedetail = $request->incometypedetail;
                $cashaccount_amount = $cashaccount_amount + $amount - $amountUpdate;
                if ($amountUpdate != $amount and $cashaccount_amount < 0){//Chi phi -> So tien dieu chinh khong duoc lon hon so tien vi tong
                    $checkError = 1;
                    $message = "Ví tổng không đủ số đư để thực hiện chỉnh sửa giao dịch thu nhập/chi phí này.";
                }else{

                    if ($cashasset_id != '' and ($incometypedetail == '101' or $incometypedetail == '102')){
                        $cashasset = app(CashAssetService::class)->find($cashasset_id);
                        $cashasset_remainamount = $cashasset->remainamount;
                        if ($amountUpdate > ($cashasset_remainamount+$amount)){
                            $checkError = 1;
                            $message = "Số tiền chi phí phải nhỏ hơn số tiền tài sản nợ cần phải thanh toán. Vui lòng nhập lại.";
                        }else{
                            $retCashAsset = app(CashAssetService::class)->updateCashAsset($amount, $amountUpdate, $cashasset_id);                        
                        }
                    }

                    if ($checkError == 0){
                        $retCash = app(CashAccountService::class)->updateCashAccount($cashaccount_amount, $cashaccount_id);
                        $retLog = app(OperationLogService::class)->createOperationLog(Auth()->user()->id, '3', 'Cập nhật', "Cập nhật chi phí giao dịch " . $model->id . " số tiền " . $amountUpdate, 'Cập nhật chi phí');
    
                        $checkError = 0;
                        $message = "Dữ liệu đã cập nhật thành công.";
                    }
                }
            }

            if ($checkError == 0){
                $result = $this->main_service->update($request, $id);            	
                if ($result){
                    $message = "Thông tin đã được cập nhật thành công !";
                    $this->view->infor = $message;
                    $this->setViewInit();
                    return redirect()
                        ->route('cashincomes-index')
                        ->with(NotificationMessage::UPDATE_SUCCESS);                    
                }
            }

            $this->view->checkError = $checkError;            
            $this->view->infor = $message;
        }        

        $model = $this->main_service->find($id);
        $this->view->model = $model;

        $this->view->incomestatustype = $request->incomestatustype;
        
        //Lay danh sach cac muc thu nhap hoac chi phi
        $this->view->incometypes = app(ConfigTypeService::class)->getConfigTypeFromType($request->incomestatustype);

        //Lay danh sach chi tiet cac muc cua thu nhap hoac chi phi
        $incometype = ($request->incometype == null ? '' : $request->incometype);
        $this->view->incometype = $incometype;
        $this->view->incometypedetails = app(ConfigTypeService::class)->getConfigTypeDetailFromId($incometype);

        //Lay danh sach phan loai cac chi muc chi tiet
        $incometypedetail = ($request->incometypedetail == null ? '' : $request->incometypedetail);
        $this->view->incometypedetail = $incometypedetail;
        $this->view->incometypedetaillevels = app(ConfigTypeService::class)->getConfigTypeDetailLevel1FromId($incometypedetail);

        $incometypedetaillevel = ($request->incometypedetaillevel == null ? '' : $request->incometypedetaillevel);
        $this->view->incometypedetaillevel = $incometypedetaillevel;

        return $this->view('edit');
    }

    public function delete($id)
    {
        $checkError = 0;
        
        //Vi tong
        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
        $accountno_primary = app(CashAccountService::class)->getCashAccountFromAccountno($accountno)->first();
        $cashaccount_id = $accountno_primary->id;
        $cashaccountno = $accountno_primary->accountno;        
        $cashaccount_amount = $accountno_primary->amount;

        //Thu nhap/chi phi can delete
        $model = $this->main_service->find($id);        
        $amount = $model->amount; 
        $incomestatustype = $model->incomestatustype;

        if ($incomestatustype == 0){//Thu nhap
            $cashaccount_amount = $cashaccount_amount - $amount;
            if ($cashaccount_amount < 0){
                $checkError = 1;
                $message = "Ví tổng không đủ số đư để thực hiện xóa giao dịch thu nhập/chi phí này.";
            }else{
                $retCash = app(CashAccountService::class)->updateCashAccount($cashaccount_amount, $cashaccount_id);
                $retCashIncome = $this->main_service->delete($id);
                $retLog = app(OperationLogService::class)->createOperationLog(Auth()->user()->id, '4', 'Xóa', "Xóa thu nhập/chi phí giao dịch " . $model->id . " số tiền " . $amount, 'Xóa thu nhập/chi phí');
    
                $checkError = 0;
                $message = "Dữ liệu đã xóa thành công.";
            }
        }elseif ($incomestatustype == 1){//Chi phí
            $cashaccount_amount = $cashaccount_amount + $amount;
            if ($cashaccount_amount < 0){
                $checkError = 1;
                $message = "Ví tổng không đủ số đư để thực hiện xóa giao dịch thu nhập/chi phí này.";
            }else{
                $retCash = app(CashAccountService::class)->updateCashAccount($cashaccount_amount, $cashaccount_id);
                $retCashIncome = $this->main_service->delete($id);
                $retLog = app(OperationLogService::class)->createOperationLog(Auth()->user()->id, '4', 'Xóa', "Xóa thu nhập/chi phí giao dịch " . $model->id . " số tiền " . $amount, 'Xóa thu nhập/chi phí');
    
                $checkError = 0;
                $message = "Dữ liệu đã xóa thành công.";
            }
        }
                    

        $this->setViewInit();

        $this->view->checkError = $checkError;
        $this->view->infor = $message;
        
        return $this->view('index');
    }   
}
