<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CashService;
use RBooks\Services\UserService;
use RBooks\Services\CashAccountService;
use RBooks\Services\CashIncomeService;
use RBooks\Services\CashPlanService;
use RBooks\Services\CashPlanDetailService;
use RBooks\Services\CashAssetService;
use RBooks\Services\StatisticService;
use RBooks\Models\Cash;
use Illuminate\Support\Facades\Crypt;
use \Auth;
use Carbon\Carbon;

class CashController extends Controller
{
    public function __construct(CashService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.cash.');
        $this->setRoutePrefix('cashs-');

        $this->view->setHeading('NHẬP THU CHI VÍ TỔNG');

    }

    public function index(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $this->view->incometypes = config('rbooks.INCOMETYPES');
        $this->view->unittypes = config('rbooks.UNITTYPES');
        $this->view->plantypes = config('rbooks.PLANTYPES');

        $currentDate = ($request->currentDate == null ? getCurrentDate('d') : $request->currentDate);
        $searchdate = FormatDateForSQL($currentDate);//hien thi dang yyyy-mm-dd 2020-03-13
        $this->view->currentDate = $currentDate;//hien thi dang dd/mm/yyyy 13/03/2020

        $now = Carbon::now();
        $firstDate = DateAdd (getCurrentDate('d'),'d',-5);
        $fromDate = ($request->fromDate == null ? $firstDate : $request->fromDate);
        $toDate = ($request->toDate == null ? getCurrentDate('d') : $request->toDate);
        $this->view->fromDate = $fromDate;
        $this->view->toDate = $toDate;

        $sfromDate = FormatDateForSQL($fromDate);
        $stoDate = FormatDateForSQL($toDate);

        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $customer_id_encrypt = Crypt::encrypt($customer_id);
        $this->view->customer_id = $customer_id_encrypt;

        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
        $accountno_primary = app(CashAccountService::class)->getCashAccountFromAccountno($accountno);
        $this->view->accountno_primary = $accountno_primary->first();

        $listincomes = app(CashIncomeService::class)->getListCashTransactionFromCustomerAccountno($customer_id, $accountno, $sfromDate, $stoDate)->paginate($this->view->filter['limit']);
        $this->view->listincomes = $listincomes;

        //Bieu do thong ke thu nhap, chi phi theo ngay hien tai
        $incomesday = app(CashIncomeService::class)->getListIncomeExpenseFromCustomerId($customer_id, $searchdate, '0');
        $expensesday = app(CashIncomeService::class)->getListIncomeExpenseFromCustomerId($customer_id, $searchdate, '1');
        $this->view->incomesday = $incomesday;
        $this->view->expensesday = $expensesday;

        //Bieu do thu nhap chi phi thang
        $listmonth = app(CashIncomeService::class)->getListIncomeExpenseFromCustomerIdByMonth($customer_id, $searchdate);
        $this->view->listmonth = $listmonth;

        $incomesmonth = app(CashIncomeService::class)->getListDetailIncomeExpenseFromCustomerIdByMonth($customer_id, $searchdate, '0');
        $expensesmonth = app(CashIncomeService::class)->getListDetailIncomeExpenseFromCustomerIdByMonth($customer_id, $searchdate, '1');

        $this->view->incomesmonth = $incomesmonth;
        $this->view->expensesmonth = $expensesmonth;

        $sumincomesmonth = app(CashIncomeService::class)->getSumIncomeExpenseFromCustomerIdByMonth($customer_id, $searchdate, '0');
        $sumexpensesmonth = app(CashIncomeService::class)->getSumIncomeExpenseFromCustomerIdByMonth($customer_id, $searchdate, '1');

        $sum_income_expense_month = $sumincomesmonth-$sumexpensesmonth;
        $sumprofitmonth = ($sum_income_expense_month > 0 ? $sum_income_expense_month : 0);
        $sumdebtmonth = ($sum_income_expense_month > 0 ? 0 : -$sum_income_expense_month);                   
        $this->view->sumincomesmonth = $sumincomesmonth;
        $this->view->sumexpensesmonth = $sumexpensesmonth;
        $this->view->sumprofitmonth = $sumprofitmonth;
        $this->view->sumdebtmonth = $sumdebtmonth;

        $listcashplans = app(CashPlanService::class)->getListCashPlanFromCustomerId($customer_id);
        $this->view->listcashplans = $listcashplans;
                        
        return $this->view('index');
    }

    public function manage(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->customertype = config('rbooks.CUSTOMERTYPE');
        $this->view->periodtypes = config('rbooks.PERIODTYPES');
        $plantypes = config('rbooks.PLANTYPES');        

        $sdate = ($request->searchdate == null ? getCurrentDate('d') : $request->searchdate);
        $this->view->searchdate = $sdate;// hien thi dang dd/mm/yyyy 13/03/2020
        $searchdate = FormatDateForSQL($sdate);

        //tong so khach hang
        $totalCustomer = app(StatisticService::class)->getListCustomerFromStatus('2', 'A', 'personalcashflow', '1'); //$customerstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        //khach hang moi dang ki thang nay
        $totalNewCustomer = app(StatisticService::class)->getListCustomerFromDate('2', 'A', 1, $searchdate, 'personalcashflow', '1'); //$customerstatustype = 2 : hoat dong, $approvestatustype = A Da duoc duyet
        //khach hang cho xu ly
        $totalWaitCustomer = app(StatisticService::class)->getListCustomerFromStatus('1', '', 'personalcashflow', '1');// 1: moi mo, '': chua duyet

        $this->view->totalCustomer = $totalCustomer;
        $this->view->totalNewCustomer = $totalNewCustomer;
        $this->view->totalWaitCustomer = $totalWaitCustomer;

        //Bieu do bar tong so khach hang
        $periodtype = ($request->periodtype == null ? "d" : $request->periodtype);
        $this->view->periodtype = $periodtype;

        $listCustomerByMonth = array(); $formatchart_x = "";
        if ($periodtype == "d"){
            //danh sach khach hang theo cac ngay trong thang da dang ky QLDT ca nhan
            $listCustomerByMonth = app(StatisticService::class)->getListCustomerByMonth($searchdate, 'personalcashflow', '1');
            $formatchart_x = "%d/%m";
        }elseif ($periodtype == "m"){
            //danh sach khach hang theo cac thang trong nam da dang ky QLDT ca nhan
            $listCustomerByMonth = app(StatisticService::class)->getListCustomerByMonthInYear($searchdate, 'personalcashflow', '1');
            $formatchart_x = "%m/%Y";
        }elseif ($periodtype == "y"){
            //danh sach khach hang theo cac nam da dang ky QLDT ca nhan
            $listCustomerByMonth = app(StatisticService::class)->getListCustomerByYear($searchdate, 'personalcashflow', '1');
            $formatchart_x = "%Y";
        }
        $this->view->formatchart_x = $formatchart_x;
        $this->view->listCustomerByMonth = $listCustomerByMonth;

        //danh sach khach hang tim kiem nhanh
        $email = ($request->email == null ? '' : $request->email);
        $this->view->email = $email;
        $fullname = ($request->fullname == null ? '' : $request->fullname);
        $this->view->fullname = $fullname;
        $fromdate = ($request->fromdate == null ? '' : $request->fromdate);
        $this->view->fromdate = $fromdate;
        $todate = ($request->todate == null ? '' : $request->todate);
        $this->view->todate = $todate;

        $listcustomertype = app(StatisticService::class)->getListCustomerBySearch($email, $fullname, $fromdate, $todate)->paginate(10);
        $this->view->listcustomertype = $listcustomertype;
                        
        return $this->view('manage');
    }

    public function process(Request $request)
    {
        if (app(APIAdminService::class)->hasUserAccessPage(Auth()->user()->role, 'cash-process', Auth()->user()->service_product_id) == 0){
            return app(APIAdminService::class)->authorizeRolePage(0); //chuyen den trang thong bao loi truy cap
        } 
        
        $this->view->setHeading('PHÂN TÍCH DÒNG TIỀN CÁ NHÂN');
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $currentDate = ($request->currentDate == null ? getCurrentDate('d') : $request->currentDate);
        $searchdate = FormatDateForSQL($currentDate);//hien thi dang yyyy-mm-dd 2020-03-13
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];
        $sfromdate = "01" . "/" . $year;
        $stodate = "12" . "/" . $year;
        
        $fromdate = ($request->fromdate == null ? $sfromdate : $request->fromdate);
        $todate = ($request->todate == null ? $stodate : $request->todate);
        $this->view->fromdate = $fromdate;
        $this->view->todate = $todate;
                
        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $customer_id_encrypt = Crypt::encrypt($customer_id);
        $this->view->customer_id = $customer_id_encrypt;

        $listaccounts = app(CashAccountService::class)->getListAccountFromCustomerId($customer_id)->paginate();
        $this->view->listaccounts = $listaccounts;

        $asset_0 = app(CashAssetService::class)->getListAccountAssetFromCustomerByAssetStatusType($customer_id, '3');
        $this->view->asset_0 = $asset_0;
        $asset_1 = app(CashAssetService::class)->getListAccountAssetFromCustomerByAssetStatusType($customer_id, '4');
        $this->view->asset_1 = $asset_1;

        $retArray = $this->main_service->getListCashFromCustomer($customer_id, $fromdate, $todate);
        $this->view->yearArray = $retArray[0];
        $this->view->monthArray = $retArray[1];
        $this->view->dataArray = $retArray[2];
        $this->view->listcashplan = $retArray[3];
        $this->view->sumArray = $retArray[4];


        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
        $listaccounts = app(CashAccountService::class)->getListAccountDetail($customer_id, $accountno)->paginate();;
        $this->view->totallistaccounts = $listaccounts;

        return $this->view('process');
    } 
    
    public function processPlan(Request $request)
    {
        $this->view->setHeading('PHÂN TÍCH DÒNG TIỀN CÁ NHÂN');
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $currentDate = ($request->currentDate == null ? getCurrentDate('d') : $request->currentDate);
        $searchdate = FormatDateForSQL($currentDate);//hien thi dang yyyy-mm-dd 2020-03-13
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];
        $sfromdate = "01" . "/" . $year;
        $stodate = $month . "/" . $year;
        
        $fromdate = ($request->fromdate == null ? $sfromdate : $request->fromdate);
        $todate = ($request->todate == null ? $stodate : $request->todate);
        $this->view->fromdate = $fromdate;
        $this->view->todate = $todate;
                
        $customer_id = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->id);
        $customer_id_encrypt = Crypt::encrypt($customer_id);
        $this->view->customer_id = $customer_id_encrypt;

        $listaccounts = app(CashAccountService::class)->getListAccountFromCustomerId($customer_id)->paginate();
        $this->view->listaccounts = $listaccounts;

        $asset_0 = app(CashAssetService::class)->getListAccountAssetFromCustomerByAssetStatusType($customer_id, '3');
        $this->view->asset_0 = $asset_0;
        $asset_1 = app(CashAssetService::class)->getListAccountAssetFromCustomerByAssetStatusType($customer_id, '4');
        $this->view->asset_1 = $asset_1;

        //Lay thong tin cac muc tieu tai chinh de cap nhat so tien thuc te tich luy
        $monthyear = $request->monthyear;
        if (isset($monthyear) and $monthyear != null){
            $listcashplan = app(CashPlanService::class)->getListCashPlanFromCustomerId($customer_id);
            foreach($listcashplan as $cashplan){
                $cashplan_id = $cashplan->id;
                $field = "planamount_$cashplan_id";//field can cap nhat so tien muc tieu tai chinh
                $planamount = $request->$field;//gia tri cap nhat vao table cash_plan_details
                $ret = app(CashPlanDetailService::class)->updateCashPlanDetail($monthyear, $planamount, $cashplan_id);
            }        
        }

        $retArray = $this->main_service->getListCashFromCustomer($customer_id, $fromdate, $todate);
        $this->view->yearArray = $retArray[0];
        $this->view->monthArray = $retArray[1];
        $this->view->dataArray = $retArray[2];
        $this->view->listcashplan = $retArray[3];
        $this->view->sumArray = $retArray[4];

        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
        $listaccounts = app(CashAccountService::class)->getListAccountDetail($customer_id, $accountno)->paginate();;
        $this->view->totallistaccounts = $listaccounts;
                       
        return $this->view('process');
    }       
}
