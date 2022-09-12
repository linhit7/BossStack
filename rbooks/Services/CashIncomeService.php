<?php

namespace RBooks\Services;

use RBooks\Repositories\CashIncomeRepository;
use RBooks\Repositories\CashAccountRepository;
use RBooks\Repositories\CashTransactionRepository;
use RBooks\Repositories\CashAssetRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\CashIncome;
use RBooks\Services\CashAccountService;
use RBooks\Services\CashAssetService;
use RBooks\Services\ConfigTypeService;

class CashIncomeService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CashIncomeRepository::class);
    }

    /**
     * create
     * Them moi thu nhap chi phi
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $customer_id = $request->customer_id;
            $customer_id_decrypt = Crypt::decrypt($customer_id);
            $customercode = (Auth::user()->customer() == null ? "" : Auth::user()->customer()->first()->customercode);
    
            $defaultUserImage = config('app.folderdocument') . $customercode . "/";
            $imageName = "";
            $image = $request->file('fImages');
            if($image == null) {
                $imageN = "";
                $imageName = "";
            } else {
                $imageN = $image->getClientOriginalName();
                $imageName = $defaultUserImage.$imageN;
                $image->move(public_path($defaultUserImage), $imageName);
            }
    
            $incomename = quote_smart($request->incomename);
            $incometype = quote_smart($request->incometype);
            $incometypedetail = quote_smart($request->incometypedetail);
            $incometypedetaillevel = quote_smart($request->incometypedetaillevel);
            $cashasset_id = quote_smart($request->cashassetid);
            $incomedate = ($request->incomedate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->incomedate)));
            $incomestatustype = quote_smart($request->incomestatustype);
            $cashaccount_id = quote_smart($request->cashaccount_id);
            $currency = quote_smart('VND');
            $amount = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));
            $description = quote_smart($request->description);
    
            $accountno = ''; $cashaccount_amount = 0;
            if ($cashaccount_id != ''){
                $accountData = app(CashAccountService::class)->getCashAccountFromCashAccountId($cashaccount_id);  
                $accountno = $accountData->first()->accountno;
                $accountname = $accountData->first()->accountname;
                $cashaccount_amount = $accountData->first()->amount; 
            }
    
            $created_user_id = quote_smart(Auth()->user()->id);
            $updated_user_id = quote_smart(Auth()->user()->id);
    
            $data = [
                'customer_id' => $customer_id_decrypt,
                'incomename' => $incomename,
                'incometype' => $incometype,
                'incometypedetail' => $incometypedetail,
                'incometypedetaillevel' => $incometypedetaillevel,
                'cashasset_id' => $cashasset_id,
                'incomedate' => $incomedate,
                'incomestatustype' => $incomestatustype,
                'cashaccount_id' => $cashaccount_id,
                'accountno' => $accountno,
                'currency' => $currency,
                'amount' => $amount,
                'description' => $description,
                'document' => $imageN,
                'created_user_id' => $created_user_id,
                'updated_user_id' => $updated_user_id,
            ];
    
            $retCashIncome = $this->repository->create($data);
    
            //Cap nhat vi tien lien quan sau khi nhap thu hay chi
            if ($incomestatustype == '0'){
                $cashaccount_amount = $cashaccount_amount + $amount;	
            }else{
            	$cashaccount_amount = $cashaccount_amount - $amount;
            }
            
            $dataCashAccount = [
                'amount' => $cashaccount_amount,
                'updated_user_id' => $updated_user_id,
            ];
            $retCashAccount = app(CashAccountRepository::class)->update($dataCashAccount, $cashaccount_id);
    
            //Cap nhat du no con lai tai san no sau khi nhap chi tra no cho mon tai san no // Chi tra no (Tien lai) hoac Chi tra no (Von goc) 
            $cashasset_id = quote_smart($request->cashassetid);        
            if ($cashasset_id != '' and ($incometypedetail == '101' or $incometypedetail == '102')){
                $cashasset = app(CashAssetService::class)->find($cashasset_id);
                $cashasset_remainamount = $cashasset->remainamount;
                $cashasset_remainamount = $cashasset_remainamount - $amount;    
                $dataCashAsset = [
                    'remainamount' => $cashasset_remainamount,
                    'updated_user_id' => $updated_user_id,
                ];
                $retCashAsset = app(CashAssetRepository::class)->update($dataCashAsset, $cashasset_id);
            }
            
            //Transaction luu cac thao tac chuyen tien, thu nhap, chi phi
            $incomename = "";
            if ($incometype != ''){
                $incomeData = app(ConfigTypeService::class)->getConfigTypeFromId($incometype);  
                $incomename = $incomeData->first()->name;
            }
    
            $content = "$incomename";
            $dataCashTransaction = [
                'customer_id' => $customer_id_decrypt,
                'accountno' => $accountno,
                'incomestatus' => $incomestatustype,//0: Thu nhap, 1: Chi phí, 2: Chuyen tien
                'incomestatustype' => $incomestatustype,//0: Thu nhap, 1: Chi phí
                'incometype' => $incometype,
                'content' => $content,
                'transactiondate' => $incomedate,
                'amount' => $amount,
                'description' => $retCashIncome->id,
                'created_user_id' => $created_user_id,
                'updated_user_id' => $updated_user_id,
            ];
            $retCashTransaction = app(CashTransactionRepository::class)->create($dataCashTransaction);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return $retCashIncome;

    }

    /**
     * update
     * Cap nhat thu nhap chi phi
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function update($request, $id)
    {
        $customercode = (Auth::user()->customer() == null ? "" : Auth::user()->customer()->first()->customercode);

        $defaultUserImage = config('app.folderdocument') . $customercode . "/";
        $imageName = "";
        $image = $request->file('fImages');
        if($image == null) {
            $imageN = $request->document;
            $imageName = "";
        } else {
            $imageN = $image->getClientOriginalName();
            $imageName = $defaultUserImage.$imageN;
            $image->move(public_path($defaultUserImage), $imageName);
        }

        $incomename = quote_smart($request->incomename);
        $incometype = quote_smart($request->incometype);
        $incometypedetail = quote_smart($request->incometypedetail);
        $incometypedetaillevel = quote_smart($request->incometypedetaillevel);
        $cashasset_id = quote_smart($request->cashassetid);
        $incomedate = ($request->incomedate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->incomedate)));
        $cashaccount_id = quote_smart($request->cashaccount_id);
        $currency = quote_smart('VND');
        $amount = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));
        $description = quote_smart($request->description);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'incomename' => $incomename,
            'incometype' => $incometype,
            'incometypedetail' => $incometypedetail,
            'incometypedetaillevel' => $incometypedetaillevel,
            'cashasset_id' => $cashasset_id,            
            'incomedate' => $incomedate,
            'cashaccount_id' => $cashaccount_id,
            'currency' => $currency,
            'amount' => $amount,
            'description' => $description,
            'document' => $imageN,
            'updated_user_id' => $updated_user_id,
        ];

        $retCashIncome = $this->repository->update($data, $id);
        
        return $retCashIncome;
    }

    /**
     * delete
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    /**
     * getListCashTransactionFromCustomer
     * Lay danh sach thu nhap chi phi cua khach hang
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListCashTransactionFromCustomerAccountno($customer_id, $accountno, $sfromDate, $stoDate)
    {
        $check = [
                    ['cash_transactions.deleted_at', '=', null],
                    ['cash_transactions.customer_id', '=', "$customer_id"],
                    ['cash_transactions.accountno', '=', "$accountno"],
                 ];
        if($sfromDate != ""){
            $check[] = ['cash_transactions.transactiondate', '>=', "$sfromDate"];   
        }
        if($stoDate != ""){
            $check[] = ['cash_transactions.transactiondate', '<=', "$stoDate"];   
        }

        $listData = DB::table('cash_transactions')
                        ->leftjoin('config_types', 'config_types.id', '=', 'cash_transactions.incometype')
                        ->select('incomestatustype','incometype','content','transactiondate','amount','config_types.name as config_types_name')
                        ->where($check)
                        ->orderBy('cash_transactions.transactiondate', 'desc');

        return $listData;    
    }
    
    /**
     * getListAccountIncomeFromCustomer
     * Lay danh sach thu nhap chi phi cua khach hang
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListAccountIncomeFromCustomer($customer_id, $sfromDate, $stoDate)
    {
        $check = [
                    ['cash_incomes.deleted_at', '=', null],
                    ['cash_incomes.customer_id', '=', "$customer_id"],
                 ];
        if($sfromDate != ""){
            $check[] = ['cash_incomes.incomedate', '>=', "$sfromDate"];   
        }
        if($stoDate != ""){
            $check[] = ['cash_incomes.incomedate', '<=', "$stoDate"];   
        }

        $listData = DB::table('cash_incomes')->leftjoin('customers', 'customers.id', '=', 'cash_incomes.customer_id')
                        ->leftjoin('config_types', 'config_types.id', '=', 'cash_incomes.incometype')
                        ->leftjoin('config_type_details', 'config_type_details.id', '=', 'cash_incomes.incometypedetail')
                        ->leftjoin('config_type_detail_levels', 'config_type_detail_levels.id', '=', 'cash_incomes.incometypedetaillevel')
                        ->leftjoin('cash_assets', 'cash_assets.id', '=', 'cash_incomes.cashasset_id')                        
                        ->select('cash_incomes.id','fullname','incomename','incometype','incometypedetail','incometypedetaillevel','incomedate','incomestatustype','cash_incomes.amount','cash_incomes.currency','config_types.name as config_types_name','config_type_details.name as config_type_details_name','cash_incomes.document','assetname')
                        ->where($check)
                        ->orderBy('cash_incomes.incomedate', 'desc');

        return $listData;    
    }

    /**
     * getListAccountIncomeFromCustomerId
     * Lay danh sach thu nhap chi phi cua khach hang theo ngay
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListAccountIncomeFromCustomerId($customer_id, $searchdate)
    {
        $search = array('customer_id'=>$customer_id, 'incomedate'=>$searchdate);
        $listData = app(CashIncomeRepository::class)->findWhere($search);

        return $listData;    
    }    

    /**
     * getListIncomeExpenseFromCustomerId
     * Lay danh sach va tra ve 2 array thu nhap chi phi cua khach hang theo ngay
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListIncomeExpenseFromCustomerId($customer_id, $searchdate, $incomestatustype)
    {
        $ret_array = array();
        
        $listincomes = DB::table('cash_incomes')
                        ->leftjoin('config_types', 'config_types.id', '=', 'cash_incomes.incometype')
                        ->select('incometype','config_types.name as incometypename', DB::raw('sum(amount) as amount'))
                        ->where('customer_id', '=', $customer_id)
                        ->where('incomestatustype', '=', $incomestatustype)
                        ->where('incomedate', '=', $searchdate)
                        ->where('cash_incomes.deleted_at', '=', null)
                        ->groupBy('incometype')
                        ->orderBy(DB::raw('sum(amount)'), 'desc')
                        ->get();

        foreach($listincomes as $cashincome){

            $dataItem = [
                'amount' => $cashincome->amount,
                'incometype' => $cashincome->incometype,
                'incometypename' => $cashincome->incometypename,                
            ];

            $ret_array [] = $dataItem; 
        }

        
        return $ret_array;    
    }  

    /**
     * 
     * Lay tong thu nhap chi phi cua khach hang theo ngay
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getSumIncomeExpenseFromCustomerId($customer_id, $searchdate, $incomestatustype)
    {
        $total = 0;
        
        $result = DB::table('cash_incomes')
                        ->select(DB::raw('sum(amount) as amount'))
                        ->where('customer_id', '=', $customer_id)
                        ->where('incomestatustype', '=', $incomestatustype)
                        ->where('incomedate', '=', $searchdate)
                        ->where('deleted_at', '=', null)
                        ->groupBy('incomestatustype')
                        ->get();

        if ($result->count() > 0) {
            $total = $result->first()->amount;
        }

        return $total;    
    }  

    /**
     * Lay tong so thu nhap chi phi tu ngay den ngay -> ve bieu do bar
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */       
    public function getListIncomeExpenseFromCustomerIdByDate($customer_id, $fromdate, $todate)
    {
        $ret = array();

        $searchdate = $fromdate;
        while (Date1GreaterThanDate2 ($todate, $searchdate) or ($todate == $searchdate)){
            $searchDateMonth = FormatDateForSQL($searchdate);//hien thi dang yyyy-mm-dd 2020-03-13

            $amountIncome = $this->getSumIncomeExpenseFromCustomerId($customer_id, $searchDateMonth, "0");
            $amountExpense = $this->getSumIncomeExpenseFromCustomerId($customer_id, $searchDateMonth, "1");

            $dataItem = [
                'income_amount' => $amountIncome,
                'expense_amount' => $amountExpense
            ];

            $ret["$searchDateMonth"] = $dataItem;

            $searchdate = DateAdd ($searchdate,"d",1);
        }

        return $ret;  
    }
        
    /**
     * Lay tong so thu nhap chi phi tung ngay trong thang -> ve bieu do bar
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */       
    public function getListIncomeExpenseFromCustomerIdByMonth($customer_id, $searchdate)
    {
        $ret = array();

        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];

        $datemonthArray = getListDateMonth($month, $year);
        foreach($datemonthArray as $key=>$day){
            $searchDateMonth =  $year . "-" . $month . "-" . $day;
            $amountIncome = $this->getSumIncomeExpenseFromCustomerId($customer_id, $searchDateMonth, "0");
            $amountExpense = $this->getSumIncomeExpenseFromCustomerId($customer_id, $searchDateMonth, "1");

            $dataItem = [
                'income_amount' => $amountIncome,
                'expense_amount' => $amountExpense
            ];

            $ret["$searchDateMonth"] = $dataItem;
        }

        return $ret;  
    }

    /**
     * Lay tong so thu nhap chi phi theo tung thang trong nam -> ve bieu do bar
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */       
    public function getListIncomeExpenseFromCustomerIdByMonthInYear($customer_id, $searchdate)
    {
        $ret = array();

        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];

        $datemonthArray = getListDateMonth($month, $year);
        for($i=1; $i<=12; $i++){
            
            $smonth = "$i";
            if ($i<10){
            	$smonth = "0$i";
            }
            $searchDateMonth =  $year . "-" . $smonth . "-" . "01";

            $amountIncome = $this->getSumIncomeExpenseFromCustomerIdByMonth($customer_id, $searchDateMonth, "0");
            $amountExpense = $this->getSumIncomeExpenseFromCustomerIdByMonth($customer_id, $searchDateMonth, "1");
            $amountBank = $this->getSumIncomeExpenseFromCustomerIdByMonth($customer_id, $searchDateMonth, "2");

            $dataItem = [
                'income_amount' => $amountIncome,
                'expense_amount' => $amountExpense+$amountBank
            ];

            $ret["$searchDateMonth"] = $dataItem;
        }

        return $ret;  
    }

    /**
     * Lay tong so thu nhap chi phi theo tung nam -> ve bieu do bar
     *
     * @author  linh
     * @param   string $somecontent
     * @access  public
     * @date    Jul 19, 2006 3:10:43 PM
     */       
    public function getListIncomeExpenseFromCustomerIdByYear($customer_id, $searchdate)
    {
        $ret = array();
        
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];

        //Thong ke lay so lieu nam truoc va sau khoang 3 nam
        for($i=$year-3; $i<=$year+3; $i++){
            
            $searchDateMonth = "$i-01-01";

            $amountIncome = $this->getSumIncomeExpenseFromCustomerIdByYear($customer_id, $searchDateMonth, "0");
            $amountExpense = $this->getSumIncomeExpenseFromCustomerIdByYear($customer_id, $searchDateMonth, "1");
            $amountBank = $this->getSumIncomeExpenseFromCustomerIdByYear($customer_id, $searchDateMonth, "2");

            $dataItem = [
                'income_amount' => $amountIncome,
                'expense_amount' => $amountExpense+$amountBank
            ];

            $ret["$searchDateMonth"] = $dataItem;
        }

        return $ret;  
    }
        
    /**
     * 
     * Lay chi tiet tung muc thu, chi va tra ve 2 array thu nhap chi phi cua khach hang theo tung thang trong nam
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListDetailIncomeExpenseFromCustomerIdByMonth($customer_id, $searchdate, $incomestatustype)
    {
        $ret_array = array();
        
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];
        
        $listincomes = DB::table('cash_incomes')
                        ->leftjoin('config_types', 'config_types.id', '=', 'cash_incomes.incometype')
                        ->select('incometype','config_types.name as incometypename', DB::raw('sum(amount) as amount'))
                        ->where('customer_id', '=', $customer_id)
                        ->where('incomestatustype', '=', $incomestatustype)
                        ->whereMonth('incomedate', '=', $month)
                        ->whereYear('incomedate', '=', $year)
                        ->where('cash_incomes.deleted_at', '=', null)
                        ->groupBy('incometype')
                        ->orderBy(DB::raw('sum(amount)'), 'desc')
                        ->get();

        foreach($listincomes as $cashincome){

            $dataItem = [
                'amount' => $cashincome->amount,
                'incometype' => $cashincome->incometype,
                'incometypename' => $cashincome->incometypename
            ];

            $ret_array [] = $dataItem; 
        }

        
        return $ret_array;    
    } 
    
    /**
     * 
     * Lay tong thu nhap hoac chi phi cua khach hang theo thang / nam
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getSumIncomeExpenseFromCustomerIdByMonth($customer_id, $searchdate, $incomestatustype)
    {
        $total = 0;
 
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];
                
        $result = DB::table('cash_incomes')
                        ->select(DB::raw('sum(amount) as amount'))
                        ->where('customer_id', '=', $customer_id)
                        ->where('incomestatustype', '=', $incomestatustype)
                        ->whereMonth('incomedate', '=', $month)
                        ->whereYear('incomedate', '=', $year)
                        ->where('deleted_at', '=', null)
                        ->groupBy('incomestatustype')
                        ->get();

        if ($result->count() > 0) {
            $total = $result->first()->amount;
        }

        return $total;    
    }           

    /**
     * 
     * Lay chi phi tra no cua khach hang theo thang / nam
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getSumIncomeExpenseBankFromCustomerIdByMonth($customer_id, $searchdate, $incomestatustype, $incometype)
    {
        $total = 0;
 
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];
                
        $result = DB::table('cash_incomes')
                        ->select(DB::raw('sum(amount) as amount'))
                        ->where('customer_id', '=', $customer_id)
                        ->where('incomestatustype', '=', $incomestatustype)
                        ->where('incometype', '=', $incometype)
                        ->whereMonth('incomedate', '=', $month)
                        ->whereYear('incomedate', '=', $year)
                        ->where('deleted_at', '=', null)
                        ->groupBy('incomestatustype')
                        ->get();

        if ($result->count() > 0) {
            $total = $result->first()->amount;
        }

        return $total;    
    }
     
    /**
     * 
     * Lay tong thu nhap hoac chi phi cua khach hang theo nam
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getSumIncomeExpenseFromCustomerIdByYear($customer_id, $searchdate, $incomestatustype)
    {
        $total = 0;
 
        $dateArray = explode('-', $searchdate);
        $year = $dateArray[0]; $month = $dateArray[1]; $day = $dateArray[2];
                
        $result = DB::table('cash_incomes')
                        ->select(DB::raw('sum(amount) as amount'))
                        ->where('customer_id', '=', $customer_id)
                        ->where('incomestatustype', '=', $incomestatustype)
                        ->whereYear('incomedate', '=', $year)
                        ->where('deleted_at', '=', null)
                        ->groupBy('incomestatustype')
                        ->get();

        if ($result->count() > 0) {
            $total = $result->first()->amount;
        }

        return $total;    
    }   
}
