<?php

namespace App\Http\Controllers\ProductManage;

use \Auth;
use App\Http\Controllers\Controller;
use RBooks\Services\AdvisoryService;
use Illuminate\Http\Request;
use App\Constants\NotificationMessage;
use Illuminate\Support\Facades\Crypt;
use RBooks\Services\ApplicationRolesService;
use RBooks\Services\APIAdminService;
use RBooks\Models\Advisory;

use Illuminate\Support\Facades\Mail;

class AdvisoryController extends Controller
{
    public function __construct(AdvisoryService $service)
    {
        parent::__construct($service);
        $this->setViewPrefix('product-manage.advisory.');
        $this->setRoutePrefix('advisorys-');
        $this->view->setHeading('HỖ TRỢ TƯ VẤN');
    }

    public function formAdvisory(Request $request )
    {
        // Setup title
        // $this->view->setSubHeading('Danh sách');
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        return $this->view('formAdvisory');
    }

    public function submitformAdvisory(Request $request, $type)
    {
        $this->main_service->submitformAdvisory($request, $type);
        if($type == '1') {
            return redirect()->back()
                         ->with(NotificationMessage::SEND_SUCCESS);
        } else {
            return redirect()->back()
                         ->with('success', '');
        }
    }

    public function index(Request $request )
    {
        $advisory = $request->sortedBy ? $request->sortedBy : 'desc';
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->collections = $this->main_service->getSortPage($advisory, $this->view->fillter['limit']);

        //$this->view->emails = Advisory::where('type', 1)->paginate(5);
        //$this->view->websites = Advisory::where('type', 0)->paginate(5);

        // Tổng số yêu cầu
        $this->view->totalRequest = $this->main_service->getListAdvisory();
        // Đã xử lý/
        $this->view->totalRequested = $this->main_service->getListStatusAdvisory('1');
        // Chưa xử lý
        $this->view->totalRequesting = $this->main_service->getListStatusAdvisory('0');

        return $this->view('index');
    }

    public function advisoryQuestion(Request $request, $id)
    {
        $this->main_service->advisoryQuestion($request, $id);
        return redirect()->back()
                         ->with(NotificationMessage::SEND_SUCCESS);
    }

    public function advisoryAnswers(Request $request, $id)
    {
        $this->main_service->advisoryAnswers($request, $id);
        return redirect()->back()
                         ->with(NotificationMessage::SEND_SUCCESS);
    }

    public function beforeAdd()
    {

    }

    public function edit($id)
    {

    }

    public function store(Request $request)
    {
        return $this->_store($request);
    }

    public function update(Request $request, $id)
    {

    }

    public function detail($id)
    {

    }

}