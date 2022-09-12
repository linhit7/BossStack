<?php

namespace RBooks\Services;

use RBooks\Repositories\CashPlanDetailRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\CashPlanDetail;
use RBooks\Services\CashPlanService;

class CashPlanDetailService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CashPlanDetailRepository::class);
    }

    public function createCashPlanDetail($cashplanid)
    {
        $model = app(CashPlanService::class)->find($cashplanid);

        //Xoa data table cash_plans_detail
        $ret = $this->deleteCashPlanDetail($cashplanid);

        $timeplan = $model->planage - $model->currentage; 
        $requireamount = $model->requireamount*intval($model->requireamountunittype);        
        $amountplan = $requireamount - $model->totalcurrentamount; 
        if ($amountplan < 0){
            $savingamountplan = 0;          
        }else{
            $savingamountplan = round($amountplan/($timeplan));         
        }

        $cash_plans_id = $model->id;
        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $savingamountplanmonth = round($savingamountplan/12, 0);
        $totalsavingamountplan = $model->totalcurrentamount;
        $plandate = ($model->plandate == "" ? getCurrentDate('d') : ConvertSQLDate($model->plandate)); 
        for($item=1; $item <= $timeplan*12; $item++){
            $totalsavingamountplan += $savingamountplanmonth; 
            $totalsavingamountplan = ($totalsavingamountplan>$requireamount ? $requireamount : $totalsavingamountplan);
            $planmonth = DateAdd ($plandate,'m',$item);
            $planmonth = quote_smart(FormatDateForSQL($planmonth));

            $data = [
                'cash_plans_id' => $cash_plans_id,
                'plandate' => $planmonth,
                'planamount' => $savingamountplanmonth,
                'planamount_total' => $totalsavingamountplan,
                'realamount' => 0,
                'realamount_total' => 0,
                'created_user_id' => $created_user_id,
                'updated_user_id' => $updated_user_id,
            ];
    
            $this->repository->create($data);
        }
        
        return true;
    }

    /**
     * updateCashPlanDetailFromTranferCashAccount
     * 
     * @author  linh
     * @param   string $cashplanid
     * @return  boolean
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function updateCashPlanDetailFromTranferCashAccount($tranferdate, $amount, $accountno)
    {
        $dateArray = explode('/', $tranferdate);
        $day = $dateArray[0]; $month = $dateArray[1]; $year = $dateArray[2];
        $updated_user_id = quote_smart(Auth()->user()->id);

        //Lay vi muc tieu va so tai khoan da nhan tien tu vi tong
        $cashplanid = '';
        $cashplan = app(CashPlanService::class)->getCashPlanFromAccountno($accountno);  
        $cashplanid = $cashplan->get()->first()->id;
        $cashplandate = $cashplan->get()->first()->plandate;
        $cashplandate = ConvertSQLDate($cashplandate);//Format dd/mm/yyyy
        $dateArrayCashPlan = explode('/', $cashplandate);
        $dayCashPlan = $dateArrayCashPlan[0]; $monthCashPlan = $dateArrayCashPlan[1]; $yearCashPlan = $dateArrayCashPlan[2];
        //Kiem tra neu ngay mo ke hoach tai chinh $cashplandate va ngay chuyen tien $tranferdate cung thang thi cong vao thang ke tiep cua ke hoach lich tra tien cua muc tieu  
        if ($year == $yearCashPlan and $month == $monthCashPlan){
            $tranferdate_next = DateAdd ($tranferdate,'m',1);
            $dateArray = explode('/', $tranferdate_next);
            $day = $dateArray[0]; $month = $dateArray[1]; $year = $dateArray[2];
        }

        //Lay chi tiet tich luy theo thang/nam cua muc tieu tai chinh co cashplanid
        $cashplandetail = $this->getCashPlanDetailFromCustomerIdByMonthYear($cashplanid, $month, $year)->get()->first();
        if (isset($cashplandetail) and $cashplandetail != null){
            //Lay so tien tong da thuc hien thang truoc
            $tranferdate_prev = DateAdd ($tranferdate,'m',-1);
            $dateArray = explode('/', $tranferdate_prev);
            $day_prev = $dateArray[0]; $month_prev = $dateArray[1]; $year_prev = $dateArray[2];
            $cashplandetail_prev = $this->getCashPlanDetailFromCustomerIdByMonthYear($cashplanid, $month_prev, $year_prev)->get()->first();
            $realamount_total = 0;
            if ($cashplandetail_prev != null){
            	$realamount_total = $cashplandetail_prev->realamount_total; 
            }
            
            //Cong voi so tien da thuc hien thang nay -> tong so tien da thuc hien toi thang nay
            $cashplandetail_id = $cashplandetail->id;
            $realamount = $cashplandetail->realamount + $amount;
            $realamount_total = $realamount_total + $realamount;
            $data = [
                'realamount' => $realamount,
                'realamount_total' => $realamount_total,                
                'updated_user_id' => $updated_user_id,
            ];
    
            $this->repository->update($data, $cashplandetail_id);
        }

        return true;
    }
    
    /**
     * updateCashPlanDetail
     * 
     * @author  linh
     * @param   string $cashplanid
     * @return  boolean
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function updateCashPlanDetail($monthyear, $planamount, $cashplanid)
    {
        $dateArray = explode('/', $monthyear);
        $month = $dateArray[0]; $year = $dateArray[1];
        $updated_user_id = quote_smart(Auth()->user()->id);

        //Lay chi tiet tich luy theo thang/nam cua muc tieu tai chinh co cashplanid
        $cashplandetail = $this->getCashPlanDetailFromCustomerIdByMonthYear($cashplanid, $month, $year)->get()->first();
        if (isset($cashplandetail) and $cashplandetail != null){
            $cashplandetail_id = $cashplandetail->id;
            $data = [
                'realamount' => removeFormatNumber($planamount),
                'updated_user_id' => $updated_user_id,
            ];
    
            $this->repository->update($data, $cashplandetail_id);
        }

        return true;
    }

    /**
     * deleteCashPlanDetail
     * 
     * @author  linh
     * @param   string $cashplanid
     * @return  boolean
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function deleteCashPlanDetail($cashplanid)
    {
        \DB::table('cash_plan_details')
            ->where('cash_plans_id', '=', $cashplanid)
            ->delete();
        return true;
    }
    
    /**
     * getCashPlanDetailFromCustomerIdByMonthYear
     * Lay chi tiet ke hoach theo thang nam
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getCashPlanDetailFromCustomerIdByMonthYear($cashplan_id, $month, $year)
    {
        $data = app(CashPlanDetail::class)->where('cash_plans_id', '=', "$cashplan_id")
                                         ->whereMonth('plandate', '=', $month)
                                         ->whereYear('plandate', '=', $year);
        return $data;    
    }  
          
}
