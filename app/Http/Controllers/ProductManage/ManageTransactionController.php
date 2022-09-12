<?php

namespace App\Http\Controllers\ProductManage;

use \Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\ManageTransactionService;
use RBooks\Services\UserService;
use App\Http\Requests\ManageTransactionStoreRequest;
use RBooks\Models\ManageTransaction;
use App\Constants\Export;
use Excel;

class ManageTransactionController extends Controller
{
    public function __construct(ManageTransactionService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.managetransaction.');
        $this->setRoutePrefix('managetransactions-');

        $this->view->setHeading('QUẢN LÝ GIAO DỊCH');
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
    public function viewInit()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        
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
        $this->viewInit();

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
    public function setView(Request $request)
    {
        $this->viewInit();

    }

    public function index(Request $request)
    {
        if (app(APIAdminService::class)->hasUserAccessPage(Auth()->user()->role, 'managetransactions-index', Auth()->user()->service_product_id) == 0){
            return app(APIAdminService::class)->authorizeRolePage(0); //chuyen den trang thong bao loi truy cap
        } 

        $this->viewInit();
                
                       
        return $this->view('index');
    }

    public function detailTransaction(Request $request)
    {
        $this->view->setHeading('CHI TIẾT GIAO DỊCH');
        $this->viewInit();
                       
        return $this->view('detailTransaction');
    }

    public function viewTransaction(Request $request)
    {
        $this->view->setHeading('NHẬT KÝ GIAO DỊCH');
        $this->viewInit();
                       
        return $this->view('viewTransaction');
    }

    public function listTransaction(Request $request)
    {
        $this->viewInit();
                       
        return $this->view('listTransaction');
    }

    public function detailTemplate(Request $request)
    {
        $this->view->setHeading('CHI TIẾT THƯ VIỆN MẪU');
        $this->viewInit();
                       
        return $this->view('detailTemplate');
    }

    public function listTemplate(Request $request)
    {
        $this->view->setHeading('THƯ VIỆN MẪU');
        $this->viewInit();
                       
        return $this->view('listTemplate');
    }
    
}
