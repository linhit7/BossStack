<?php

namespace App\Http\Controllers\FinancialManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CostRealService;

class CostRealController extends Controller
{
    public function __construct(CostRealService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('financial-manage.cost.real.');
        $this->setRoutePrefix('costsreal-');

        $this->view->setHeading('DANH SÁCH CHI PHÍ THỰC TẾ');

    }

    public function index(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();


        $this->view->setSubHeading('Danh sách');
        return $this->view('index');
    }

    public function store(Rrequest $request)
    {
        return $this->_store($request);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        return $this->_update($request, $id);
    }
}
