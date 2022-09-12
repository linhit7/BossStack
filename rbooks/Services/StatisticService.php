<?php

namespace RBooks\Services;

use RBooks\Repositories\StatisticRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\Statistic;
use RBooks\Repositories\CustomerRepository;
use RBooks\Models\Customer;
use RBooks\Repositories\ContractRepository;
use RBooks\Models\Contract;

class StatisticService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(StatisticRepository::class);
    }


    /**
     * Lay tong so khach hang theo trang thai va theo loai: QLDT, Dau tu, Tiet kiem
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */
    public function getListCustomerFromStatus($customerstatustype, $approvestatustype, $producttype, $producttypevalue)
    {
        $total = 0;

        $customers = app(Customer::class)->where('customerstatustype', 'like', "%$customerstatustype%")
                                         ->where('approvestatustype', 'like', "%$approvestatustype%")
                                         ->where("$producttype", 'like', "%$producttypevalue%");
                                         
        if ($customers->count() > 0) {
            $total = $customers->count();
        }

        return $total;  
    }

     /**
     * Lay tong so khach hang theo ngay, thang, nam va theo loai: QLDT, Dau tu, Tiet kiem
     *
     * @author  linh
     * @param   string $typedate
     * @param   string $searchdate
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */
    public function getListCustomerFromDate($customerstatustype, $approvestatustype, $typedate, $searchdate, $producttype, $producttypevalue)
    {
        $total = 0;

        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];

        if ($typedate == 0){
            $customers = app(Customer::class)->where('customerstatustype', 'like', "%$customerstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->where("$producttype", 'like', "%$producttypevalue%")
                                             ->whereDate('created_at', '=', $searchdate);
        }elseif ($typedate == 1){
            $customers = app(Customer::class)->where('customerstatustype', 'like', "%$customerstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->where("$producttype", 'like', "%$producttypevalue%")
                                             ->whereMonth('created_at', '=', $month)
                                             ->whereYear('created_at', '=', $year);
        }else{
            $customers = app(Customer::class)->where('customerstatustype', 'like', "%$customerstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->where("$producttype", 'like', "%$producttypevalue%")
                                             ->whereYear('created_at', '=', $year);
        }

        if ($customers->count() > 0) {
            $total = $customers->count();
        }

        return $total;  
    }

     /**
     * Lay tong so khach hang theo nhom
     *
     * @author  linh
     * @param   string $typedate
     * @param   string $searchdate
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */
     public function getListCustomerByGroup($typedate, $searchdate, $type)
    {
        $total = 0;

        $listData = DB::table('customers')
                        ->select('customertype', DB::raw('COUNT(id) as countcustomer'))
                        ->where('approvestatustype', '=', "A")
                        ->where('deleted_at', '=', null)
                        ->groupBy('customertype')
                        ->orderBy(DB::raw('COUNT(id)'), 'desc')
                        ->get();

        $numItem = $listData->count();
        $min = array(); $max = array();

        if ($type == 0){
            if ($numItem == 1) {
                $min = $listData[0]; 
                $max = null;
            }elseif ($numItem > 1){
                $min = $listData[0]; 
                $max = $listData[$numItem-1];
            }
            
            $retArray = array($min, $max);        
        }else{
        	$retArray = $listData;
        }
        
        return $retArray;  
    }

    /**
     * Lay danh sach khach hang theo dieu kien search
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */
    public function getListCustomerBySearch($email, $fullname, $fromdate, $todate)
    {
        $check = [
                    ['contracts.deleted_at', '=', null],
                    ['contracts.approvestatustype', '=', "A"],
                    ['customers.email', 'like', "%$email%"],
                    ['customers.fullname', 'like', "%$fullname%"],
                 ];
        if($fromdate != ""){
            $check[] = ['contracts.contractdate', '>=', "$fromdate"];	
        }
        if($todate != ""){
            $check[] = ['contracts.contractdate', '<=', "$todate"];   
        }

        $listData = DB::table('contracts')->leftjoin('customers', 'customers.id', '=', 'contracts.customer_id')->leftjoin('users', 'users.id', '=', 'customers.user_id')
                        ->select('contracts.id','contracts.customer_id','fullname','birthday','address','phone','customers.email','contractno','contractdate','contractstatustype','currency','term','termtype','lastcontractdate','contracts.personalcashflow','contracts.invest','contracts.saving','description','finish','finishdate','contracts.officer_user_id','contracts.approved','contracts.approved_user_id','contracts.approved_at','contracts.approvestatustype','last_login_at')
                        ->where($check)
                        ->orderBy('contracts.contractdate', 'desc');

        return $listData;  
    }

    /**
     * Lay danh sach khach hang theo field
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */
    public function getListCustomerByField($field, $value)
    {
        $listData = app(Customer::class)->where("$field", 'like', "%$value%")
                                        ->where('approvestatustype', '=', "A")
                                        ->where('deleted_at', '=', null)
                                        ->orderBy('created_at', 'desc');

        return $listData;  
    }
    
    /**
     * Lay khach hang theo customertype
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */
    public function getListCustomerByCustomerType($customertype)
    {
        $listData = app(Customer::class)->where('customertype', 'like', "%$customertype%")
                                        ->where('approvestatustype', '=', "A")
                                        ->where('deleted_at', '=', null)
                                        ->orderBy('created_at', 'desc');

        return $listData;  
    }

    /**
     * Lay so khach hang theo cac ngay trong thang -> ve bieu do bar
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */       
    public function getListCustomerByMonth($searchdate, $producttype, $producttypevalue)
    {
        $ret = array();
        
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];

        $datemonthArray = getListDateMonth($month, $year);
        foreach($datemonthArray as $key=>$day){
            $searchDateMonth =  $year . "-" . $month . "-" . $day;
            $valueDateMonth = $this->getListCustomerFromDate('2', 'A', 0, $searchDateMonth, $producttype, $producttypevalue);

            $ret["$searchDateMonth"] = $valueDateMonth;
        }

        return $ret;  
    }

    /**
     * Lay so khach hang theo cac thang trong nam -> ve bieu do bar
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */       
    public function getListCustomerByMonthInYear($searchdate, $producttype, $producttypevalue)
    {
        $ret = array();
        
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];

        for($i=1; $i<=12; $i++){
            $smonth = "$i";
            if ($i<10){
                $smonth = "0$i";
            }
            $searchDateMonth =  $year . "-" . $smonth . "-" . "01";
            $valueDateMonth = $this->getListCustomerFromDate('2', 'A', 1, $searchDateMonth, $producttype, $producttypevalue);
            $ret["$searchDateMonth"] = $valueDateMonth;
        }


        return $ret;  
    }

    /**
     * Lay so khach hang theo nam -> ve bieu do bar
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */       
    public function getListCustomerByYear($searchdate, $producttype, $producttypevalue)
    {
        $ret = array();
        
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];

        //Thong ke lay so lieu nam truoc va sau khoang 3 nam
        for($i=$year-3; $i<=$year+3; $i++){
            
            $searchDateMonth = "$i-01-01";

            $valueDateMonth = $this->getListCustomerFromDate('2', 'A', 2, $searchDateMonth, $producttype, $producttypevalue);
            $ret["$searchDateMonth"] = $valueDateMonth;
        }

        return $ret;  
    }

    /**
     * Lay tong so hop dong
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */
    public function getListContractFromStatus($contractstatustype, $approvestatustype, $contracttype)
    {
        $total = 0;

        if ($contracttype == '0'){//Quan ly dong tien ca nhan
            $conracts = app(Contract::class)->where('contractstatustype', 'like', "%$contractstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->where('personalcashflow', '=', "1");
        }elseif ($contracttype == '1'){//Dau tu
            $conracts = app(Contract::class)->where('contractstatustype', 'like', "%$contractstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->where('invest', '=', "1");
        }else{//Tiet kiem
            $conracts = app(Contract::class)->where('contractstatustype', 'like', "%$contractstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->where('saving', '=', "1");
        }

        if ($conracts->count() > 0) {
            $total = $conracts->count();
        }

        return $total;  
    }   

     /**
     * Lay tong so hop dong theo ngay, thang, nam
     *
     * @author  linh
     * @param   string $typedate
     * @param   string $searchdate
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */
    public function getListContractFromDate($contractstatustype, $approvestatustype, $typedate, $searchdate )
    {
        $total = 0;

        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];

        if ($typedate == 0){//theo ngay
            $contracts = app(Contract::class)->where('contractstatustype', 'like', "%$contractstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->whereDate('created_at', '=', $searchdate);
        }elseif ($typedate == 1){//theo thang
            $contracts = app(Contract::class)->where('contractstatustype', 'like', "%$contractstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->whereMonth('created_at', '=', $month)
                                             ->whereYear('created_at', '=', $year);
        }elseif  ($typedate == 2){//theo nam
            $contracts = app(Contract::class)->where('contractstatustype', 'like', "%$contractstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->whereYear('created_at', '=', $year);
        }

        if ($contracts->count() > 0) {
            $total = $contracts->count();
        }

        return $total;  
    }
    
     /**
     * Lay tong so loai tung hop dong theo ngay, thang, nam va theo loai : QLDT, tiet kiem, dau tu
     *
     * @author  linh
     * @param   string $typedate
     * @param   string $searchdate
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */
    public function getListTypeContractFromDate($contractstatustype, $approvestatustype, $typedate, $searchdate, $searchfield)
    {
        $total = 0;

        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];

        if ($typedate == 0){//theo ngay
            $contracts = app(Contract::class)->where('contractstatustype', 'like', "%$contractstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->where("$searchfield", '=', "1")
                                             ->whereDate('created_at', '=', $searchdate);
        }elseif ($typedate == 1){//theo thang
            $contracts = app(Contract::class)->where('contractstatustype', 'like', "%$contractstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->where("$searchfield", '=', "1")
                                             ->whereMonth('created_at', '=', $month)
                                             ->whereYear('created_at', '=', $year);
        }elseif  ($typedate == 2){//theo nam
            $contracts = app(Contract::class)->where('contractstatustype', 'like', "%$contractstatustype%")
                                             ->where('approvestatustype', 'like', "%$approvestatustype%")
                                             ->where("$searchfield", '=', "1")
                                             ->whereYear('created_at', '=', $year);
        }

        if ($contracts->count() > 0) {
            $total = $contracts->count();
        }

        return $total;  
    }
    
    /**
     * Lay so hop dong QL dong tien, dau tu, tiet kiem theo thang -> ve bieu do bar
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */    
    public function getListContractByMonth($searchdate)
    {
        $ret = array();
        
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];

        $datemonthArray = getListDateMonth($month, $year);
        foreach($datemonthArray as $key=>$day){
            $searchDateMonth =  $year . "-" . $month . "-" . $day;
            $valueCashFlowDateMonth = $this->getListTypeContractFromDate('2', 'A', 0, $searchDateMonth, 'personalcashflow');
            $valueInvestDateMonth = $this->getListTypeContractFromDate('2', 'A', 0, $searchDateMonth, 'invest');
            $valueSavingDateMonth = $this->getListTypeContractFromDate('2', 'A', 0, $searchDateMonth, 'saving');

            $ret["$searchDateMonth"] = array($valueCashFlowDateMonth,$valueInvestDateMonth,$valueSavingDateMonth);
        }

        return $ret;  
    }             
}
