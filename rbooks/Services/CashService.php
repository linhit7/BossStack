<?php

namespace RBooks\Services;

use RBooks\Repositories\CashRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\Cash;
use RBooks\Services\CashAccountService;
use RBooks\Services\CashIncomeService;
use RBooks\Services\CashPlanService;


class CashService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CashRepository::class);
    }

    public function create($request)
    {
        return $this->repository->create($data);
    }

    public function update($request, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function getListCashFromCustomer($customer_id, $fromdate, $todate)
    {
        $retArray = array();//array tra ket qua

        $monthArray = array();//array chua thang nam
        $dataArray = array();//array chua du lieu theo tung thang nam

        $fromdate_full = "01/" . $fromdate;
        $todate_full = "28/" . $todate;       
        $searchdate = $fromdate_full;

        //Lay thong tin nam de in so lieu
        $yearArray = array();//array chua nam
        $dateArray = explode('/', $fromdate);
        $fromyear = $dateArray[1];;
        $dateArray = explode('/', $todate);
        $toyear = $dateArray[1];;
        for ($i=$fromyear; $i<=$toyear; $i++){
            $yearArray[] = $i;	
        }

        //Lay thong tin cac muc tieu tai chinh
        $listcashplan = app(CashPlanService::class)->getListCashPlanFromCustomerId($customer_id);
        //Khoi tao gia tri mang tong
        $sumArray = array();//array chua tong 
        $sumArray['income'] = 0;
        $sumArray['expense'] = 0;
        $sumArray['bank'] = 0;
        foreach($listcashplan as $cashplan){
            $cashplan_id = $cashplan->id;
            $sumArray["$cashplan_id"."_planamount"] = 0;
            $sumArray["$cashplan_id"."_realamount"] = 0;
        }        
        $sumArray["process_planamount"] = 0;
        $sumArray["process_realamount"] = 0;
            
        while (Date1GreaterThanDate2 ($todate_full, $searchdate)){
            $dateArray = explode('/', $searchdate);
            $year = $dateArray[2]; $month = $dateArray[1]; $day = $dateArray[0];
            $monthyear = $month . "_" . $year;

            $monthArray[$monthyear] = $year;//array thang/nam 

            $searchdateSQL = FormatDateForSQL($searchdate);//hien thi dang yyyy-mm-dd 2020-03-13

            //Lay thong tin thu nhap chi phi theo thang
            $amountIncome = app(CashIncomeService::class)->getSumIncomeExpenseFromCustomerIdByMonth($customer_id, $searchdateSQL, "0");
            $amountExpense = app(CashIncomeService::class)->getSumIncomeExpenseFromCustomerIdByMonth($customer_id, $searchdateSQL, "1");
            $amountBank = app(CashIncomeService::class)->getSumIncomeExpenseBankFromCustomerIdByMonth($customer_id, $searchdateSQL, "1", "9"); //Chi phi $incomestatustype=1, Loai chi tra no $incometype=0

            $process_planamount = 0; $process_realamount = 0;
            $dataItem = array();
            $dataItem['monthyear'] = $month . "/" . $year;
            $dataItem['year'] = $year;

            $dataItem['income'] = $amountIncome;
            $dataItem['expense'] = $amountExpense;
            $dataItem['bank'] = $amountBank;

            $sumArray['income'] += $amountIncome;
            $sumArray['expense'] += $amountExpense;
            $sumArray['bank'] += $amountBank;
        
            $process_planamount = $amountIncome - ($amountExpense+$amountBank);        
            $process_realamount = $amountIncome - ($amountExpense+$amountBank);        

            foreach($listcashplan as $cashplan){
            	$cashplan_id = $cashplan->id;
                $cashplandetail = app(CashPlanDetailService::class)->getCashPlanDetailFromCustomerIdByMonthYear($cashplan_id, $month, $year)->get()->first();
                $cashplandetail_id = ""; $cashplandetail_planamount = 0; $cashplandetail_realamount = 0;
                if (isset($cashplandetail) and $cashplandetail != null){
                    $cashplandetail_id = $cashplandetail->id;
                    $cashplandetail_planamount = $cashplandetail->planamount;                      
                    $cashplandetail_realamount = $cashplandetail->realamount;                      
                }

                $dataItem["$cashplan_id"."_id"] = $cashplandetail_id;
                $dataItem["$cashplan_id"."_planamount"] = $cashplandetail_planamount;
                $dataItem["$cashplan_id"."_realamount"] = $cashplandetail_realamount;

                $process_planamount = $process_planamount - $cashplandetail_planamount;
                $sumArray["$cashplan_id"."_planamount"] += $cashplandetail_planamount;                

                $process_realamount = $process_realamount - $cashplandetail_realamount;
                $sumArray["$cashplan_id"."_realamount"] += $cashplandetail_realamount;                
            }

            $dataItem['process_planamount'] = $process_planamount;
            $sumArray["process_planamount"] += $process_planamount;                

            $dataItem['process_realamount'] = $process_realamount;
            $sumArray["process_realamount"] += $process_realamount;                

            $dataArray[$monthyear] = $dataItem;
            $searchdate = DateAdd ($searchdate,"m",1);
        }

        $retArray[] = $yearArray;
        $retArray[] = $monthArray;
        $retArray[] = $dataArray;
        $retArray[] = $listcashplan;
        $retArray[] = $sumArray;

        return $retArray;    
    }
    
}
