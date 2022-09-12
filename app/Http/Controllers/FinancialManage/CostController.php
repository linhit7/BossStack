<?php

namespace App\Http\Controllers\FinancialManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CostService;

class CostController extends Controller
{
    public function __construct(CostService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('financial-manage.cost.');
        $this->setRoutePrefix('costs-');

        $this->view->setHeading('QUẢN LÝ CHI PHÍ TỔNG');

    }

    public function index(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $revenue = $request->sortedBy ? $request->sortedBy : 'desc';
        $this->view->collections = $this->main_service->getSortPage($revenue, $this->view->filter['limit']);

        $this->view->setSubHeading('Danh sách');
        return $this->view('index');
    }

    public function store(Rrequest $request)
    {
        return $this->_store($request);
    }

    public function edit($id)
    {
        $this->view->revenue = $this->main_service->find($id);
        $this->view->setSubHeading('Chỉnh sửa');
        return $this->view('edit');
    }

    public function update(Request $request, $id)
    {
        return $this->_update($request, $id);
    }
}
