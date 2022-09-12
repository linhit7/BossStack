<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CashTranferService;
use RBooks\Services\CashAccountService;
use RBooks\Services\CashPlanService;
use RBooks\Services\UserService;
use App\Http\Requests\CashTranferStoreRequest;
use RBooks\Models\CashTranfer;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use \Auth;

class CashTranferController extends Controller
{
    public function __construct(CashTranferService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.cashtranfer.');
        $this->setRoutePrefix('cashtranfers-');

        $this->view->setHeading('QUẢN LÝ VÍ TIỀN');

    }

    public function index(Request $request)
    {

        return $this->view('index');
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

        $listaccounts = app(CashAccountService::class)->getListAccountFromCustomerId($customer_id)->paginate(1000000);
        $this->view->listaccounts = $listaccounts;

        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
        $accountno_primary = app(CashAccountService::class)->getCashAccountFromAccountno($accountno);
        $this->view->accountno_primary = $accountno_primary->first()->id;

    }
    
    public function beforeAdd()
    {
        $this->setViewInit();
        $this->view->tranferdate = getCurrentDate('d');
        $this->view->cashaccount_id_send = '';
        $this->view->cashaccount_amount_send = '';
        $this->view->cashaccount_id_receive = '';
        $this->view->amount = '';
        $this->view->description = '';                
    }
    
    public function process(Request $request)
    {
        $this->setViewInit();

        $tranferdate = ($request->tranferdate == null ? getCurrentDate('d') : $request->tranferdate);
        $this->view->tranferdate = $tranferdate;

        $cashaccount_id_send = ($request->cashaccount_id_send == null ? '' : $request->cashaccount_id_send);
        $this->view->cashaccount_id_send = $cashaccount_id_send;
        
        $cashaccount_amount_send = 0;
        if ($cashaccount_id_send != ''){
        	$accountData = app(CashAccountService::class)->getCashAccountFromCashAccountId($cashaccount_id_send);
            $cashaccount_amount_send = $accountData->first()->amount;  
        }
        $this->view->cashaccount_amount_send = $cashaccount_amount_send;

        $cashaccount_id_receive = ($request->cashaccount_id_receive == null ? '' : $request->cashaccount_id_receive);
        $this->view->cashaccount_id_receive = $cashaccount_id_receive;

        $amount = ($request->amount == null ? '' : $request->amount);
        $this->view->amount = $amount;

        $description = ($request->description == null ? '' : $request->description);
        $this->view->description = $description;

        $this->view->setSubHeading('Tạo mới');
        return $this->view('add');
    }

    public function store(CashTranferStoreRequest $request)
    {
        $checkAmount = 0; 
        $ret = 0;
        $message = "";

        //Kiem tra so tien chuyen phai nho hon so du vi nguon can chuyen
        $cashaccount_amount_send = $request->cashaccount_amount_send;
        $amount = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));
        if ($amount > $cashaccount_amount_send){
            $checkAmount = 1;
            $message = "Số tiền chuyển phải nhỏ hơn số dư ví nguồn. Vui lòng nhập lại.";
        }

        //Kiem tra chuyen tien khong vuot qua so tien ke hoach cua vi muc tieu
        $cashaccount_id_receive = ($request->cashaccount_id_receive == null ? '' : $request->cashaccount_id_receive);
        if ($cashaccount_id_receive != ''){
            $accountData = app(CashAccountService::class)->getCashAccountFromCashAccountId($cashaccount_id_receive);

            $accountno_receive = $accountData->first()->accountno;
            $accountname_receive = $accountData->first()->accountname;
            $amount_receive = $accountData->first()->amount;            
            $cashplan = app(CashPlanService::class)->getCashPlanFromAccountno($accountno_receive);  
            if ($cashplan->get()->first() != null){
                $cashplan_requireamount = $cashplan->get()->first()->requireamount;
                $cashplan_remainamount = $cashplan_requireamount - $amount_receive;//so tien con phai thuc hien cua vi muc tieu
                if ($amount > $cashplan_remainamount){
                    $checkAmount = 1;
                    $message = "Số tiền chuyển phải nhỏ hơn hoặc bằng số tiền còn phải thực hiện của ví mục tiêu. Vui lòng nhập lại.";
                }
            }              
        }

        if ($checkAmount == 0){
            $result = $this->main_service->create($request);
            if ($result){
                $ret = 1;
                $message = "Thông tin đã được lưu thành công !";
            }else{
                $ret = 0;
                $message = "Lỗi lưu dữ liệu !";
            }
        }
        $this->view->checkAmount = $checkAmount;        
        $this->view->infor = $message;

        $this->setViewInit();
        
        $tranferdate = ($request->tranferdate == null ? getCurrentDate('d') : $request->tranferdate);
        $this->view->tranferdate = $tranferdate;

        $cashaccount_id_send = ($request->cashaccount_id_send == null ? '' : $request->cashaccount_id_send);
        $this->view->cashaccount_id_send = $cashaccount_id_send;
        
        $cashaccount_amount_send = 0;
        if ($cashaccount_id_send != ''){
            $accountData = app(CashAccountService::class)->getCashAccountFromCashAccountId($cashaccount_id_send);
            $cashaccount_amount_send = $accountData->first()->amount;  
        }
        $this->view->cashaccount_amount_send = $cashaccount_amount_send;


        $this->view->cashaccount_id_receive = $cashaccount_id_receive;

        $amount = ($request->amount == null ? '' : $request->amount);
        $this->view->amount = $amount;

        $description = ($request->description == null ? '' : $request->description);
        $this->view->description = $description;

        //Reset cac tham so textbox
        if ($ret == 1){
            $this->view->tranferdate = getCurrentDate('d');
            $this->view->cashaccount_id_send = '';
            $this->view->cashaccount_amount_send = '';
            $this->view->cashaccount_id_receive = '';
            $this->view->amount = '';
            $this->view->description = '';
        }

        return $this->view('add');
    }

    public function edit($id)
    {

        return $this->view('edit');
    }

    public function update(CashAccountStoreRequest $request, $id)
    {

        return $this->view('index');
    }
  
}
