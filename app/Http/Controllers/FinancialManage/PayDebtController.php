<?php

namespace App\Http\Controllers\FinancialManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\PayDebtService;

class PayDebtController extends Controller
{
    public function __construct(PayDebtService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('financial-manage.cost.paydebt.');
        $this->setRoutePrefix('paydebt-');

        $this->view->setHeading('DANH SÁCH CÔNG NỢ PHẢI TRẢ');

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
