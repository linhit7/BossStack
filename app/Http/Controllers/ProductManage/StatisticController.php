<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\StatisticService;
use RBooks\Services\UserService;
use App\Http\Requests\StatisticStoreRequest;
use RBooks\Models\Statistic;
use App\Exports\StatisticExport;
use App\Constants\Export;
use Excel;
use RBooks\Services\CustomerService;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public function __construct(StatisticService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.statistic.');
        $this->setRoutePrefix('statistics-');

        $this->view->setHeading('QUẢN LÝ THỐNG KÊ');

    }

    public function customer(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        //typedate 0 : hom nay; 1: thang nay; 2: nam nay
        $typedate = ($request->searchDate == null ? '0' : $request->searchDate);        
        $searchdate = getCurrentDate('d');
        $searchdate = FormatDateForSQL($searchdate);

        //tong so khach hang
        $totalCustomer = $this->main_service->getListCustomerFromStatus('2', 'A', 'personalcashflow', ''); //$customerstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        //khach hang moi dang ki thang nay
        $totalNewCustomer = $this->main_service->getListCustomerFromDate('2', 'A', 1, $searchdate, 'personalcashflow', ''); //$customerstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        //khach hang ket thuc hop dong thang nay
        $totalFinishContractCustomer = $this->main_service->getListContractFromDate('3', 'A', 1, $searchdate); //$customerstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        //khach hang cho xu ly
        $totalWaitCustomer = $this->main_service->getListCustomerFromStatus('1', '', 'personalcashflow', '');// 1: moi mo, '': chua duyet

        //thong ke theo doi tuong khach hang
        $typeCustomer = $this->main_service->getListCustomerByGroup(1, $searchdate, 0);

        $searchcustomertype = ($request->searchcustomertype == null ? '' : $request->searchcustomertype);        
        $listcustomertype = $this->main_service->getListCustomerByCustomerType($searchcustomertype)->paginate(5);

        //Bieu do tron 
        $searchperiodtype = ($request->searchperiodtype == null ? '1' : $request->searchperiodtype);        
        $listGroupCustomer = $this->main_service->getListCustomerByGroup($searchperiodtype, $searchdate, 1);

        //Bieu do bar
        $listCustomerByMonth = $this->main_service->getListCustomerByMonth($searchdate, 'personalcashflow', '');


        $this->view->customertype = config('rbooks.CUSTOMERTYPE');
        $this->view->periodtypes = config('rbooks.PERIODTYPES');
        $this->view->totalCustomer = $totalCustomer;
        $this->view->totalNewCustomer = $totalNewCustomer;
        $this->view->totalFinishContractCustomer = $totalFinishContractCustomer;
        $this->view->totalWaitCustomer = $totalWaitCustomer;
        $this->view->typeMaxCustomer = $typeCustomer[0];
        $this->view->typeMinCustomer = $typeCustomer[1];

        $this->view->searchcustomertype = $searchcustomertype;
        $this->view->listcustomertype = $listcustomertype;
                        
        $this->view->searchperiodtype = $searchperiodtype;
        $this->view->listGroupCustomer = $listGroupCustomer;

        $this->view->listCustomerByMonth = $listCustomerByMonth;

        return $this->view('customer');
    }
    
    public function product(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->fundtype = config('rbooks.FUNDTYPE');

        //typedate 0 : hom nay; 1: thang nay; 2: nam nay
        $typedate = ($request->searchDate == null ? '0' : $request->searchDate);        
        $searchdate = getCurrentDate('d');
        $searchdate = FormatDateForSQL($searchdate);

        //tong so hop dong
        $totalContractCashFlow = $this->main_service->getListContractFromStatus('2', 'A', '0'); //$contractstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        $totalContractInvest = $this->main_service->getListContractFromStatus('2', 'A', '1'); //$contractstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        $totalContractSaving = $this->main_service->getListContractFromStatus('2', 'A', '2'); //$contractstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet

        $maxTotalContract = $totalContractCashFlow;
        $smaxType = "0";
        if($totalContractInvest > $maxTotalContract){
            $maxTotalContract = $totalContractInvest;
            $smaxType = "1";  
        }
        if($totalContractSaving > $maxTotalContract){
            $maxTotalContract = $totalContractSaving;
            $smaxType = "2";
        }

        $minTotalContract = $totalContractCashFlow;
        $sminType = "0";
        if($totalContractInvest < $minTotalContract){
            $minTotalContract = $totalContractInvest;
            $sminType = "1";  
        }
        if($totalContractSaving < $minTotalContract){
            $minTotalContract = $totalContractSaving;
            $sminType = "2";
        }

        //Bieu do bar
        $listContractByMonth = $this->main_service->getListContractByMonth($searchdate);

        //tong so khach hang
        $totalCustomer = $this->main_service->getListCustomerFromStatus('2', 'A', 'personalcashflow', ''); //$customerstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        //khach hang moi dang ki thang nay
        $totalNewCustomer = $this->main_service->getListCustomerFromDate('2', 'A', 1, $searchdate, 'personalcashflow', ''); //$customerstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        //khach hang ket thuc hop dong thang nay
        $totalFinishContractCustomer = $this->main_service->getListContractFromDate('3', 'A', 1, $searchdate); //$customerstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet

        //Hop dong moi thang nay QLDT
        $totalContractCashFlowMonth = $this->main_service->getListTypeContractFromDate('2', 'A', 1, $searchdate, 'personalcashflow');
        $totalContractInvestMonth = $this->main_service->getListTypeContractFromDate('2', 'A', 1, $searchdate, 'invest');
        $totalContractSavingMonth = $this->main_service->getListTypeContractFromDate('2', 'A', 1, $searchdate, 'saving');


        $this->view->totalContractCashFlow = $totalContractCashFlow;
        $this->view->totalContractInvest = $totalContractInvest;
        $this->view->totalContractSaving = $totalContractSaving;

        $this->view->listContractByMonth = $listContractByMonth;//bieu do bar

        $this->view->totalCustomer = $totalCustomer;
        $this->view->totalNewCustomer = $totalNewCustomer;
        $this->view->totalFinishContractCustomer = $totalFinishContractCustomer;

        $this->view->maxTotalContract = $maxTotalContract;
        $this->view->smaxType = $smaxType;

        $this->view->minTotalContract = $minTotalContract;
        $this->view->sminType = $sminType;

        $this->view->totalContractCashFlowMonth = $totalContractCashFlowMonth;
        $this->view->totalContractInvestMonth = $totalContractInvestMonth;
        $this->view->totalContractSavingMonth = $totalContractSavingMonth;


                        
        return $this->view('product');
    }    
  
}
