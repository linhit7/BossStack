<?php

namespace App\Http\Controllers\FinancialManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfitController extends Controller
{
    public function __construct()
    {
        parent::__construct(null);

        $this->setViewPrefix('financial-manage.profit.');
        $this->setRoutePrefix('profits-');
        //$this->view->suppliers = app(SupplierService::class)->getAll();
        //$this->view->imports = app(ImportService::class)->getAll();

        $this->view->setHeading('home.Quản lý lợi nhuận');
    }

    public function index(Request $request)
    {
        $this->view->setSubHeading('home.Danh sách');
        return $this->view('index');
    }
}
