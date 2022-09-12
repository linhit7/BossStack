<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use RBooks\Services\APIAdminService;
use RBooks\Services\CashAccountService;
use RBooks\Services\CashIncomeService;
use RBooks\Services\CashPlanService;
use RBooks\Services\CashAssetService;
use RBooks\Services\StatisticService;
use Illuminate\Support\Facades\Crypt;
use \Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct(null);

        $this->setViewPrefix('dashboard.');
        $this->view->setHeading('');
    }

    public function index(Request $request)
    {
     

       // if (app(APIAdminService::class)->hasAnyRole($request->user()->role, 'dashboard', 'cview') == 0){
       //     return app(APIAdminService::class)->authorizeRoles(0); //chuyen den trang thong bao loi truy cap
       // }   

//       if (app(APIAdminService::class)->hasUserAccess($request->user()->role, 'dashboard', 'cuserview', $request->user()->id) == 0){
//           return app(APIAdminService::class)->authorizeRoles(0); //chuyen den trang thong bao loi truy cap
//       } 

        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $role = Auth()->user()->role;
        if ($role == 'KH'){
            return redirect('/customer');
        }

        return redirect('/manage');
    }

    public function customer(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $now = Carbon::now();
        $firstDate = DateAdd (getCurrentDate('d'),'d',-5);
        $fromDate = ($request->fromDate == null ? $firstDate : $request->fromDate);
        $toDate = ($request->toDate == null ? getCurrentDate('d') : $request->toDate);
        
        $this->view->fromDate = $fromDate;
        $this->view->toDate = $toDate;

        $sfromDate = FormatDateForSQL($fromDate);
        $stoDate = FormatDateForSQL($toDate);

        $this->view->incometypes = config('rbooks.INCOMETYPES');
        $this->view->unittypes = config('rbooks.UNITTYPES');
        $this->view->plantypes = config('rbooks.PLANTYPES');

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $customer_id_encrypt = Crypt::encrypt($customer_id);
        $this->view->customer_id = $customer_id_encrypt;

        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
        $listaccounts = app(CashAccountService::class)->getListAccountDetail($customer_id, '')->paginate();;
        $this->view->listaccounts = $listaccounts;

        //danh sach muc tieu tai chinh
        $listcashplans = app(CashPlanService::class)->getListCashPlanFromCustomerId($customer_id);
        $this->view->listcashplans = $listcashplans;

        $listmonth = array(); $formatchart_x = "";
        //danh sach thu chi theo cac ngay 
        $listmonth = app(CashIncomeService::class)->getListIncomeExpenseFromCustomerIdByDate($customer_id, $fromDate, $toDate);
        $this->view->listmonth = $listmonth;

        $collections = app(CashAssetService::class)->getListAccountAssetFromCustomer($customer_id, "", "")->paginate();
        $this->view->collections = $collections;

        $asset_0 = app(CashAssetService::class)->getListAssetExpenseFromCustomerIdByAssetStatusType($customer_id, '3');
        $this->view->asset_0 = $asset_0;

        $asset_1 = app(CashAssetService::class)->getListAssetExpenseFromCustomerIdByAssetStatusType($customer_id, '4');
        $this->view->asset_1 = $asset_1;

        return $this->view('customer');
    }
    
    public function manage(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->customertype = config('rbooks.CUSTOMERTYPE');
        $this->view->periodtypes = config('rbooks.PERIODTYPES');

        $sdate = ($request->searchdate == null ? getCurrentDate('d') : $request->searchdate);
        $this->view->searchdate = $sdate;// hien thi dang dd/mm/yyyy 13/03/2020
        $searchdate = FormatDateForSQL($sdate);

        //tong so khach hang
        $totalCustomer = app(StatisticService::class)->getListCustomerFromStatus('2', 'A', 'personalcashflow', ''); //$customerstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        //khach hang moi dang ki thang nay
        $totalNewCustomer = app(StatisticService::class)->getListCustomerFromDate('2', 'A', 1, $searchdate, 'personalcashflow', ''); //$customerstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        //khach hang cho xu ly
        $totalWaitCustomer = app(StatisticService::class)->getListCustomerFromStatus('1', '', 'personalcashflow', '');// 1: moi mo, '': chua duyet

        $this->view->totalCustomer = $totalCustomer;
        $this->view->totalNewCustomer = $totalNewCustomer;
        $this->view->totalWaitCustomer = $totalWaitCustomer;

        //danh sach khach hang
        $searchfield = ($request->searchfield == null ? 'fullname' : $request->searchfield);        
        $searchvalue = ($request->quick_search == null ? '' : $request->quick_search);        
        $listcustomertype = app(StatisticService::class)->getListCustomerByField($searchfield, $searchvalue)->paginate(5);
        $this->view->searchfield = $searchfield;
        $this->view->searchvalue = $searchvalue;
        $this->view->listcustomertype = $listcustomertype;


        //Bieu do bar tong so khach hang
        $periodtype = ($request->periodtype == null ? "d" : $request->periodtype);
        $this->view->periodtype = $periodtype;

        $listCustomerByMonth = array(); $formatchart_x = "";
        if ($periodtype == "d"){
            //danh sach khach hang theo cac ngay trong thang
            $listCustomerByMonth = app(StatisticService::class)->getListCustomerByMonth($searchdate, 'personalcashflow', '');
            $formatchart_x = "%d/%m";
        }elseif ($periodtype == "m"){
            //danh sach khach hang theo cac thang trong nam
            $listCustomerByMonth = app(StatisticService::class)->getListCustomerByMonthInYear($searchdate, 'personalcashflow', '');
            $formatchart_x = "%m/%Y";
        }elseif ($periodtype == "y"){
            //danh sach khach hang theo cac nam
            $listCustomerByMonth = app(StatisticService::class)->getListCustomerByYear($searchdate, 'personalcashflow', '');
            $formatchart_x = "%Y";
        }
        $this->view->formatchart_x = $formatchart_x;
        $this->view->listCustomerByMonth = $listCustomerByMonth;

        //Bieu do bar goi san pham khach hang dang ky
        $productperiodtype = ($request->productperiodtype == null ? "m" : $request->productperiodtype);
        $this->view->productperiodtype = $productperiodtype;

        $listContractByMonth = array();
        if ($productperiodtype == "d"){
            //so luong san pham dang ky theo ngay da chon
            $totalContractCashFlowMonth = app(StatisticService::class)->getListTypeContractFromDate('2', 'A', 0, $searchdate, 'personalcashflow');
            $totalContractInvestMonth = app(StatisticService::class)->getListTypeContractFromDate('2', 'A', 0, $searchdate, 'invest');
            $totalContractSavingMonth = app(StatisticService::class)->getListTypeContractFromDate('2', 'A', 0, $searchdate, 'saving');
            $listContractByMonth = [
                                    'cashflow' => $totalContractCashFlowMonth,
                                    'invest' => $totalContractInvestMonth,
                                    'saving' => $totalContractSavingMonth,
                                    ];
        }elseif ($productperiodtype == "m"){
            //so luong san pham dang ky theo thang da chon
            $totalContractCashFlowMonth = app(StatisticService::class)->getListTypeContractFromDate('2', 'A', 1, $searchdate, 'personalcashflow');
            $totalContractInvestMonth = app(StatisticService::class)->getListTypeContractFromDate('2', 'A', 1, $searchdate, 'invest');
            $totalContractSavingMonth = app(StatisticService::class)->getListTypeContractFromDate('2', 'A', 1, $searchdate, 'saving');
            $listContractByMonth = [
                                    'cashflow' => $totalContractCashFlowMonth,
                                    'invest' => $totalContractInvestMonth,
                                    'saving' => $totalContractSavingMonth,
                                    ];
        }elseif ($productperiodtype == "y"){
            //so luong san pham dang ky theo nam da chon
            $totalContractCashFlowMonth = app(StatisticService::class)->getListTypeContractFromDate('2', 'A', 2, $searchdate, 'personalcashflow');
            $totalContractInvestMonth = app(StatisticService::class)->getListTypeContractFromDate('2', 'A', 2, $searchdate, 'invest');
            $totalContractSavingMonth = app(StatisticService::class)->getListTypeContractFromDate('2', 'A', 2, $searchdate, 'saving');
            $listContractByMonth = [
                                    'cashflow' => $totalContractCashFlowMonth,
                                    'invest' => $totalContractInvestMonth,
                                    'saving' => $totalContractSavingMonth,
                                    ];
        }
        $this->view->listContractByMonth = $listContractByMonth;
        

        return $this->view('manage');
    }        
}
