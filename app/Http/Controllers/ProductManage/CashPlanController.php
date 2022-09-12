<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CustomerService;
use RBooks\Services\CashPlanService;
use RBooks\Services\CashPlanDetailService;
use RBooks\Services\CashAccountService;
use RBooks\Services\CashTranferService;
use RBooks\Services\UserService;
use App\Http\Requests\CashPlanStoreRequest;
use RBooks\Models\CashPlan;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use \Auth;
use App\Constants\NotificationMessage;

class CashPlanController extends Controller
{
    public function __construct(CashPlanService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.cashplan.');
        $this->setRoutePrefix('cashplans-');

        $this->view->setHeading('VÍ MỤC TIÊU');

    }

    public function index(Request $request)
    {
        if (app(APIAdminService::class)->hasUserAccessPage(Auth()->user()->role, 'cashplans-index', Auth()->user()->service_product_id) == 0){
            return app(APIAdminService::class)->authorizeRolePage(0); //chuyen den trang thong bao loi truy cap
        } 
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        
        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $collections = $this->main_service->getListAccountPlanFromCustomer($customer_id, $request)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        $customercode = (Auth::user()->customer() == null ? "" : Auth::user()->customer()->first()->customercode);
        $defaultUserImage = config('app.pathroot') . config('app.folderdocument') . $customercode . "/";
        $this->view->pathdocument = $defaultUserImage;
        $this->view->plantypes = config('rbooks.PLANTYPES');
        $this->view->accountstatustype = config('rbooks.ACCOUNTSTATUSTYPE');
                
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

        $birthday = (Auth::user()->customer()->first() == null ? "0" : Auth::user()->customer()->first()->birthday);
        $age = (Carbon::now()->year) - (substr($birthday, 0, 4));
        $this->view->currentage = $age;

        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->unittypes = config('rbooks.UNITTYPES');
        $this->view->currencytype = config('rbooks.CURRENCYTYPE');
        $this->view->plantypes = config('rbooks.PLANTYPES');
        $this->view->accountstatustype = config('rbooks.ACCOUNTSTATUSTYPE');
        $this->view->plandate = getCurrentDate('d');

        $listaccounts = app(CashAccountService::class)->getListAccountFromCustomerId($customer_id)->paginate();
        $this->view->listaccounts = $listaccounts;

        $this->view->setSubHeading('Phân tích kế hoạch mục tiêu tài chính');
    }
    
    /**
     * beforeAdd
     * Them moi thiet lap ke hoach tai chinh
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function beforeAdd()
    {
        $this->setViewInit();
    }

    /**
     * process
     * Luu va phan tich ke hoach tai chinh
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function process(CashPlanStoreRequest $request)
    {
        $result = $this->main_service->create($request);

        $this->setViewInit();
        $this->processPlan($result->id);       

        return $this->view('process');
    }

    /**
     * edit
     * Chinh sua phan tich ke hoach tai chinh
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function edit($id)
    {
        $this->setViewInit();
                
        $this->view->model = $this->main_service->find($id);
        $this->view->setSubHeading('Chỉnh sửa');

        return $this->view('edit');
    }

    /**
     * update
     * Cap nhat chinh sua phan tich ke hoach tai chinh
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function update(CashPlanStoreRequest $request, $id)
    {
        $result = $this->main_service->update($request, $id);

        $this->setViewInit();
        $this->processPlan($result->id);       

        return $this->view('process');
    }

    /**
     * delete
     * Phan quan tri he thong
     * Xoa ke hoach tai chinh cua khach hang, chuyen het so tien tu vi tai chinh sang vi tong
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */  
    public function delete($id)
    {
        $ret = $this->main_service->deleteCashPlan($id);

        return redirect()
            ->route('cashplans-index')
            ->with(NotificationMessage::DELETE_SUCCESS);
    }


    /**
     * analysis
     * Phan tich ke hoach tai chinh
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function analysis($id)
    {
        $this->setViewInit();
        $this->processPlan($id);
        
        return $this->view('process');
    }
    
    /**
     * processPlan
     * Phan tich ke hoach tai chinh
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function processPlan($id)
    {
        $model = $this->main_service->find($id);
        $this->view->model = $model;

        $timeplan = $model->planage - $model->currentage; 
        $requireamount = $model->requireamount*intval($model->requireamountunittype);        
        $amountplan = $requireamount - $model->totalcurrentamount; 
        if ($amountplan < 0){
            $savingamountplan = 0;          
        }else{
            $savingamountplan = round($amountplan/($timeplan));         
        }

        $this->view->timeplan = $timeplan;
        $this->view->requireamount = $requireamount;
        $this->view->savingamountplan = $savingamountplan;

        return true;
    }

    /**
     * manage
     * Phan quan tri he thong
     * Hien thi ke hoach tai chinh cua khach hang
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */    
    public function manage(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        
        $customer_id = $request->customer_id;
        $customer_id_decrypt = Crypt::decrypt($request->customer_id);
        
        $this->view->customer = app(CustomerService::class)->find($customer_id_decrypt);
                
        $collections = $this->main_service->getListAccountPlanFromCustomer($customer_id_decrypt, $request)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        return $this->view('manage');
    }

    /**
     * edit
     * Phan quan tri he thong
     * Chinh sua phan tich ke hoach tai chinh
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function editManage($id)
    {
        $result = $this->main_service->find($id);

        $this->view->model = $result;
        $this->viewInit($result->customer_id);

        $this->view->setSubHeading('Chỉnh sửa');
        return $this->view('editManage');
    }

    /**
     * update
     * Phan quan tri he thong
     * Cap nhat chinh sua phan tich ke hoach tai chinh
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function updateManage(CashPlanStoreRequest $request, $id)
    {
        $result = $this->main_service->update($request, $id);

        $this->view->model = $result;
        $this->viewInit($result->customer_id);

        $this->processPlan($result->id);       

        return $this->view('processManage');
    }

    /**
     * deleteManage
     * Phan quan tri he thong
     * Xoa ke hoach tai chinh cua khach hang
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */  
    public function deleteManage(Request $request)
    {
        $customer_id = $request->customer_id;
        $id = $request->id;
        $this->main_service->delete($id);

        //Xoa data table cash_plans_detail
        $ret = app(CashPlanDetailService::class)->deleteCashPlanDetail($id);

        return redirect()
            ->route('cashplans-manage', ['customer_id' => $customer_id])
            ->with(NotificationMessage::DELETE_SUCCESS);
    }

    /**
     * analysisManage
     * Phan quan tri he thong
     * Phan tich ke hoach tai chinh
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function analysisManage(Request $request)
    {
        $customer_id = $request->customer_id;
        $customer_id_decrypt = Crypt::decrypt($request->customer_id);
        $id = $request->id;

        $this->viewInit($customer_id_decrypt);

        $this->processPlan($id);
        
        return $this->view('processManage');
    }              
}
