<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\ReportService;
use RBooks\Services\UserService;
use App\Http\Requests\ReportStoreRequest;
use RBooks\Models\Report;
use App\Exports\ReportExport;
use App\Constants\Export;
use Carbon\Carbon;
use Excel;
use App\Constants\NotificationMessage;

class ReportController extends Controller
{
    public function __construct(ReportService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.report.');
        $this->setRoutePrefix('report-');

        $this->view->setHeading('COACHING DÀNH CHO CÁ NHÂN HOẶC DOANH NGHIỆP');

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

        $now = Carbon::now();
        $firstDate = "01/" . $now->month . "/" . $now->year; 
        $this->view->fromDate = $firstDate;
        $this->view->toDate = getCurrentDate('d');

        $this->view->coursetype = config('rbooks.COURSETYPE');
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

        $collections = $this->main_service->getListCoachings('', '')->paginate($this->view->filter['limit']);        
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

        $collections = $this->main_service->getListCoachings('', '')->paginate($this->view->filter['limit']);        
        $this->view->collections = $collections;
    }

    public function index(Request $request)
    {
        $this->viewInit();
                
        return $this->view('index');
    }

    public function manage(Request $request)
    {
        $this->setViewInit();
                
        return $this->view('manage');
    }

    public function delete($id)
    {
        $ret = $this->main_service->delete($id);

        return redirect()
            ->route('report-manage')
            ->with(NotificationMessage::DELETE_SUCCESS);
    }
        
    public function store(ReportStoreRequest $request)
    {
        $result = $this->main_service->create($request);
        $message = "";
        if ($result){
            $message = "Thông tin đã được gửi đến hệ thống thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;
        $this->setView($request);

        return $this->view('index');
    }


   
  
}
