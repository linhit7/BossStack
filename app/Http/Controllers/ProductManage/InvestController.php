<?php

namespace App\Http\Controllers\ProductManage;

use \Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\InvestService;
use RBooks\Services\UserService;
use App\Http\Requests\InvestStoreRequest;
use RBooks\Models\Invest;
use App\Exports\InvestExport;
use App\Constants\Export;
use Excel;

class InvestController extends Controller
{
    public function __construct(InvestService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.invest.');
        $this->setRoutePrefix('invests-');

        $this->view->setHeading('ĐẦU TƯ');
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
        $this->view->newstypes = config('rbooks.NEWSTYPE');
        $this->view->pathimage = config('app.pathimage');
        
        $this->view->searchField = '';
        $this->view->searchValue = '';
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

        $collections = $this->main_service->getListNews('', '')->paginate($this->view->filter['limit']);        
        $this->view->collections = $collections;
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

        $searchField = ($request->searchField == null ? '' : $request->searchField);
        $searchValue = ($request->searchValue == null ? '' : $request->searchValue);
        $this->view->searchField = $searchField;
        $this->view->searchValue = $searchValue;

        $collections = $this->main_service->getListNews($searchField, $searchValue)->paginate($this->view->filter['limit']);        
        $this->view->collections = $collections;
    }

    public function index(Request $request)
    {
        if (app(APIAdminService::class)->hasUserAccessPage(Auth()->user()->role, 'invests-index', Auth()->user()->service_product_id) == 0){
            return app(APIAdminService::class)->authorizeRolePage(0); //chuyen den trang thong bao loi truy cap
        } 

        $this->viewInit();
                
        $collections_0 = $this->main_service->getListNews('0', '')->paginate($this->view->filter['limit']);        
        $this->view->collections_0 = $collections_0;
                
        $collections_1 = $this->main_service->getListNews('1', '')->paginate($this->view->filter['limit']);        
        $this->view->collections_1 = $collections_1;

        $collections_2 = $this->main_service->getListNews('2', '')->paginate($this->view->filter['limit']);        
        $this->view->collections_2 = $collections_2;
                       
        return $this->view('index');
    }
    
    public function manage(Request $request)
    {
        $this->setView($request);
        $this->view->setHeading('QUẢN LÝ TIN TỨC ĐẦU TƯ');

        return $this->view('manage');
    }    

    public function beforeAdd()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->newstypes = config('rbooks.NEWSTYPE');
        $this->view->newsdate = getCurrentDate('d');    
    }

    public function store(InvestStoreRequest $request)
    {
        $result = $this->main_service->create($request);
        $message = "";
        if ($result){
            $message = "Thông tin đã được lưu thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;
        $this->setView($request);

        return $this->view('manage');
    }

    public function edit($id)
    {
        $this->viewInit();
        $this->view->model = $this->main_service->find($id);

        $this->view->setSubHeading('Chỉnh sửa');

        return $this->view('edit');
    }

    public function detail($id)
    {
        $this->viewInit();
        
        $model = $this->main_service->find($id);
        $this->view->model = $model;

        $newstype = $model->newstype;

        $collections_0 = $this->main_service->getListNews($newstype, '')->paginate($this->view->filter['limit']);        
        $this->view->collections_0 = $collections_0;
                
        $collections_2 = $this->main_service->getListNews('2', '')->paginate($this->view->filter['limit']);        
        $this->view->collections_2 = $collections_2;

        $this->view->setSubHeading('Chi tiết');

        return $this->view('detail');
    }
    
    public function update(InvestStoreRequest $request, $id)
    {
        $result = $this->main_service->update($request, $id);

        $message = "";
        if ($result){
            $message = "Thông tin đã được cập nhật thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;
        $this->setView($request);

        return $this->view('manage');
    }
        
    public function delete($id)
    {
        $model = $this->main_service->delete($id);
        $this->setViewInit();

        return $this->view('manage');
    }      
}
