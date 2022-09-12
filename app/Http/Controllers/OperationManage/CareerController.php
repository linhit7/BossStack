<?php

namespace App\Http\Controllers\OperationManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CareerService;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use \Auth;

class CareerController extends Controller
{
    public function __construct(CareerService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('operation-manage.career.');
        $this->setRoutePrefix('carees-');

        $this->view->setHeading('QUẢN LÝ TUYỂN DỤNG');
    }

    public function index(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        return $this->view('index');
    }

    public function beforeAdd()
    {

    }

    public function add()
    {
        $this->beforeAdd();
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        // Setup title
        $this->view->setSubHeading('Thêm mới');
        return $this->view('add');
    }

    public function store(CashAccountStoreRequest $request)
    {

    }

    public function edit($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        // Setup title
        $this->view->setSubHeading('Chỉnh sửa');
        return $this->view('edit');
    }

    public function update(CashAccountStoreRequest $request, $id)
    {

    }

    public function candidateList()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        // Setup title
        $this->view->setSubHeading('Danh sách ứng viên');
        return $this->view('candidatelist');
    }

}
