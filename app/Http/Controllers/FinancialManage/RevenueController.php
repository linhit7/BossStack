<?php

namespace App\Http\Controllers\FinancialManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\RevenueService;
use RBooks\Models\Revenue;

class RevenueController extends Controller
{
    public function __construct(RevenueService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('financial-manage.revenue.');
        $this->setRoutePrefix('revenues-');

        $this->view->setHeading('QUẢN LÝ DOANH THU');

    }

    public function index(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $revenue = $request->sortedBy ? $request->sortedBy : 'desc';
        $this->view->collections = $this->main_service->getSortPage($revenue, $this->view->filter['limit']);

        $this->view->revenues = $this->main_service->getAll();
        $revenue_notvat = 0;
        $revenue_vat = 0;
        foreach($this->view->revenues as $revenue) {
            $revenue_notvat += $revenues['revenue_notvat']; // Tổng tiền k vat
            $revenue_vat += $revenues['revenue_vat']; // Tổng tiền co1 vat
        }
        $this->view->revenue_vat = $revenue_notvat;
        $this->view->revenue_vat = $revenue_vat;

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

    // Doanh thu thực tế
    public function net()
    {
        $dathu_notvat = 0;
        $dathu_vat = 0;
        foreach($this->main_service->getAll()->where('dathu_notvat', '!=', 0) as $revenue_net) {
            $dathu_notvat += $revenue_net['dathu_notvat']; // Tổng tiền ko vat
            $dathu_vat += $revenue_net['dathu_vat']; // Tổng tiền có vat
        }
        $this->view->dathu_notvat = $dathu_notvat;
        $this->view->dathu_vat = $dathu_vat;

        $this->view->collections = Revenue::where('dathu_notvat', '!=', 0)->paginate(25);
        $this->view->setSubHeading('home.Doanh thu thực tế');
        return $this->view('revenue-net.index');
    }

    // Công nợ phải thu
    public function receivable()
    {
        $conlai_notvat = 0;
        $conlai_vat = 0;
        foreach($this->main_service->getAll()->where('conlai_notvat', '!=', 0) as $receivables_debt) {
            $conlai_notvat += $receivables_debt['conlai_notvat'];
            $conlai_vat += $receivables_debt['conlai_vat'];
        }
        $this->view->conlai_notvat = $conlai_notvat;
        $this->view->conlai_vat = $conlai_vat;

        $this->view->collections = Revenue::where('conlai_notvat', '!=', 0)->paginate(25);
        $this->view->setSubHeading('home.Công nợ phải thu');
        return $this->view('receivables-debt.index');
    }
}
