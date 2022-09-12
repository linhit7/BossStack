<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CashAccountService;
use RBooks\Services\CashAssetService;
use RBooks\Services\UserService;
use RBooks\Services\ConfigTypeService;
use App\Http\Requests\CashAssetStoreRequest;
use RBooks\Models\CashAsset;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use \Auth;

class CashAssetController extends Controller
{
    public function __construct(CashAssetService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.cashasset.');
        $this->setRoutePrefix('cashassets-');

        $this->view->setHeading('CÔNG CỤ QUẢN LÝ TÀI SẢN NỢ / CÓ');

        $now = Carbon::now();
        $this->view->month = $now->month;
        $this->view->year = $now->year;
        $this->view->error = 0;         
    }

    public function index(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->assetstatustypes = config('rbooks.ASSETSTATUSTYPES');
        
        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $collections = $this->main_service->getListAccountAssetFromCustomer($customer_id, "", "")->paginate();
        $this->view->collections = $collections;

        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
        $this->view->primaryaccount = $accountno;
        $listaccounts = app(CashAccountService::class)->getListAccountDetail($customer_id, '')->paginate();
        $this->view->listaccounts = $listaccounts;

        $asset_0 = $this->main_service->getListAssetExpenseFromCustomerIdByAssetStatusType($customer_id, '3');
        $this->view->asset_0 = $asset_0;

        $asset_1 = $this->main_service->getListAssetExpenseFromCustomerIdByAssetStatusType($customer_id, '4');
        $this->view->asset_1 = $asset_1;

        $customercode = (Auth::user()->customer() == null ? "" : Auth::user()->customer()->first()->customercode);
        $defaultUserImage = config('app.pathroot') . config('app.folderdocument') . $customercode . "/";
        $this->view->pathdocument = $defaultUserImage;

        $this->view->error = 0;
        return $this->view('index');
    }
 
    public function list(Request $request)
    {
        $now = Carbon::now();
        $firstDate = "01/" . $now->month . "/" . $now->year; 
        $fromDate = ($request->fromDate == null ? $firstDate : $request->fromDate);
        $toDate = ($request->toDate == null ? getCurrentDate('d') : $request->toDate);
        $this->view->fromDate = $fromDate;
        $this->view->toDate = $toDate;

        $sfromDate = FormatDateForSQL($fromDate);
        $stoDate = FormatDateForSQL($toDate);
            
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->assetstatustypes = config('rbooks.ASSETSTATUSTYPES');
        
        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $collections = $this->main_service->getListAccountAssetFromCustomer($customer_id, $sfromDate, $stoDate)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        return $this->view('list');
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

        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $collections = $this->main_service->getListAccountAssetFromCustomer($customer_id, "", "")->paginate();
        $this->view->collections = $collections;

        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
        $this->view->primaryaccount = $accountno;
        $listaccounts = app(CashAccountService::class)->getListAccountDetail($customer_id, '')->paginate();
        $this->view->listaccounts = $listaccounts;

        $asset_0 = $this->main_service->getListAssetExpenseFromCustomerIdByAssetStatusType($customer_id, '3');
        $this->view->asset_0 = $asset_0;

        $asset_1 = $this->main_service->getListAssetExpenseFromCustomerIdByAssetStatusType($customer_id, '4');
        $this->view->asset_1 = $asset_1;

    }

     /**
     * setView
     * Khoi tao tham so de hien thi view khong lay du lieu danh sach tai san
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function setView()
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
        $this->view->assetstatustypes = config('rbooks.ASSETSTATUSTYPES');

        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
        $accountno_primary = app(CashAccountService::class)->getCashAccountFromAccountno($accountno)->first();
        $this->view->cashaccount_id = $accountno_primary->id;
        $this->view->cashaccount_name = $accountno_primary->accountname;
        $this->view->cashaccount_amount = $accountno_primary->amount;

        $customercode = (Auth::user()->customer() == null ? "" : Auth::user()->customer()->first()->customercode);
        $defaultUserImage = config('app.pathroot') . config('app.folderdocument') . $customercode . "/";
        $this->view->pathdocument = $defaultUserImage;
    }
            
    public function process(Request $request)
    {
        $this->setView();        

        $this->view->assetdate = ($request->assetdate == null ? getCurrentDate('d') : $request->assetdate);

        //Lay danh sach cac tai san no hoac co
        $this->view->assetstatustype = $request->assetstatustype;
        $this->view->assettypes = app(ConfigTypeService::class)->getConfigTypeFromType($request->assetstatustype);

        //Lay danh sach chi tiet cac muc cua tai san no (3) hoac co (4)
        $assettype = ($request->assettype == null ? '' : $request->assettype);
        $this->view->assettype = $assettype;
        $this->view->assettypedetails = app(ConfigTypeService::class)->getConfigTypeDetailFromId($assettype);

        //Lay danh sach phan loai cac chi muc chi tiet
        $assettypedetail = ($request->assettypedetail == null ? '' : $request->assettypedetail);
        $this->view->assettypedetail = $assettypedetail;

        $assetname = ($request->assetname == null ? '' : $request->assetname);
        $this->view->assetname = $assetname;
        $this->view->amount = '';

        $this->view->setSubHeading('Tạo mới');
        return $this->view('add');
    }

    public function store(CashAssetStoreRequest $request)
    {
        $ret = 0;
        $message = "";

        $result = $this->main_service->create($request);
        if ($result){
            $ret = 1;
            $message = "Thông tin đã được lưu thành công !";

            $this->view->error = 0;
            $this->view->infor = $message;
            $this->setViewInit();

            return $this->view('index');
        }else{
            $ret = 0;
            $message = "Lỗi lưu dữ liệu !";
        }

        $this->view->infor = $message;
        $this->setView();
                
        $this->view->assetdate = getCurrentDate('d');

        //Lay danh sach cac tai san no hoac co
        $this->view->assetstatustype = $request->assetstatustype;
        $this->view->assettypes = app(ConfigTypeService::class)->getConfigTypeFromType($request->assetstatustype);

        //Lay danh sach chi tiet cac muc cua tai san no (3) hoac co (4)
        $assettype = ($request->assettype == null ? '' : $request->assettype);
        $this->view->assettype = $assettype;
        $this->view->assettypedetails = app(ConfigTypeService::class)->getConfigTypeDetailFromId($assettype);

        //Lay danh sach phan loai cac chi muc chi tiet
        $assettypedetail = ($request->assettypedetail == null ? '' : $request->assettypedetail);
        $this->view->assettypedetail = $assettypedetail;

        $this->view->amount = $request->amount;

        //Reset cac tham so textbox
        if ($ret == 1){
            $this->view->assetname = '';
            $this->view->assettype = '';
            $this->view->assettypedetail = '';
            $this->view->amount = '';
            $this->view->description = '';
        }

        return $this->view('add');
    }

    public function edit($id)
    {
        $this->setView();

        $model = $this->main_service->find($id);
        $this->view->model = $model;

        //Lay danh sach cac tai san no hoac co
        $this->view->assetstatustype = $model->assetstatustype;
        $this->view->assettypes = app(ConfigTypeService::class)->getConfigTypeFromType($model->assetstatustype);

        //Lay danh sach chi tiet cac muc cua tai san no (3) hoac co (4)
        $assettype = $model->assettype;
        $this->view->assettype = $assettype;
        $this->view->assettypedetails = app(ConfigTypeService::class)->getConfigTypeDetailFromId($assettype);

        //Lay danh sach phan loai cac chi muc chi tiet
        $assettypedetail = $model->assettypedetail;
        $this->view->assettypedetail = $assettypedetail;

        $this->view->setSubHeading('Chỉnh sửa');

        return $this->view('edit');
    }
    
    public function update(CashAssetStoreRequest $request, $id)
    {
        $result = $this->main_service->update($request, $id);

        $message = "";
        if ($result){
            $message = "Thông tin đã được cập nhật thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;
        $this->setViewInit();

        return $this->view('index');
    }

    public function modify(Request $request)
    {

        $id = ($request->assetid == null ? '' : $request->assetid);
        $error = 0;
        if ($id == ""){
            $message = "Bạn chưa chọn tài sản cần điều chỉnh. Vui lòng chọn tài sản cần điều chỉnh trong danh sách. ";
            
            $error = 1;
            $this->view->error = $error;
            $this->view->infor = $message;

            $this->setViewInit();
               
            return $this->view('index');
        }        

        $this->setView();
        
        $model = $this->main_service->find($id);
        $this->view->model = $model;

        //Lay danh sach cac tai san no hoac co
        $this->view->assetstatustype = $model->assetstatustype;
        $this->view->assettypes = app(ConfigTypeService::class)->getConfigTypeFromType($model->assetstatustype);

        //Lay danh sach chi tiet cac muc cua tai san no (3) hoac co (4)
        $assettype = $model->assettype;
        $this->view->assettype = $assettype;
        $this->view->assettypedetails = app(ConfigTypeService::class)->getConfigTypeDetailFromId($assettype);

        //Lay danh sach phan loai cac chi muc chi tiet
        $assettypedetail = $model->assettypedetail;
        $this->view->assettypedetail = $assettypedetail;

        $this->view->setSubHeading('Điều chỉnh tài sản');

        return $this->view('modify');
    }

 
}
