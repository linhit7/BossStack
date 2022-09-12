<?php

namespace RBooks\Services;

use RBooks\Repositories\CashAccountRepository;
use RBooks\Repositories\CashTransactionRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\CashAccount;

class CashAccountService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CashAccountRepository::class);
    }

    public function create($request)
    {
        $customer_id = $request->customer_id;
        $customer_id_decrypt = Crypt::decrypt($customer_id);

        $accountno = quote_smart($request->accountno);
        $accountname = quote_smart($request->accountname);
        $accountdate = ($request->accountdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->accountdate)));
        $accountstatustype = quote_smart('0');
        $currency = quote_smart('VND');
        $amount = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));
        $description = quote_smart($request->description);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'customer_id' => $customer_id_decrypt,
            'accountno' => $accountno,
            'accountname' => $accountname,
            'accountdate' => $accountdate,
            'accountstatustype' => $accountstatustype,
            'currency' => $currency,
            'amount' => $amount,
            'description' => $description,
            'created_user_id' => $created_user_id,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->create($data);
    }

    public function update($request, $id)
    {
        $accountno = quote_smart($request->accountno);
        $accountname = quote_smart($request->accountname);
        $accountdate = ($request->accountdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->accountdate)));
        $accountstatustype = quote_smart('0');
        $currency = quote_smart('VND');
        $amount = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));
        $description = quote_smart($request->description);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'accountno' => $accountno,
            'accountname' => $accountname,
            'accountdate' => $accountdate,
            'accountstatustype' => $accountstatustype,
            'currency' => $currency,
            'amount' => $amount,
            'description' => $description,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->update($data, $id);
    }

    /**
     * updateCashAccount
     * Cap nhat so tien vi tong
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function updateCashAccount($amount, $id)
    {
        $updated_user_id = quote_smart(Auth()->user()->id);
        $data = [
            'amount' => $amount,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->update($data, $id);
    }

    public function getListAccountFromCustomer($customer_id, $request)
    {
        $searchField = ($request->searchField == null ? 'accountno' : $request->searchField);
        $searchValue = ($request->searchValue == null ? '' : $request->searchValue);
        $listData = DB::table('cash_accounts')->leftjoin('customers', 'customers.id', '=', 'cash_accounts.customer_id')
                        ->select('cash_accounts.id','fullname','accountno','accountname','accountdate','amount','accountstatustype')
                        ->where('cash_accounts.customer_id', '=', "$customer_id")
                        ->where('cash_accounts.deleted_at', '=', null)
                        ->where($searchField, 'like', "%$searchValue%");

        return $listData;    
    }

    public function getListAccountFromCustomerId($customer_id)
    {
//        $search = array('customer_id'=>$customer_id);
//        $listData = app(CashAccountRepository::class)->findWhere($search);

        $listData = DB::table('cash_accounts')
                        ->leftjoin('cash_plans', 'cash_plans.accountno', '=', 'cash_accounts.accountno')
                        ->select('cash_accounts.id','cash_accounts.customer_id','plantype','planname','plandate','cash_plans.currency','currentage','planage','planamount','currentamount','requireamount','planamountunittype','currentamountunittype','requireamountunittype','cash_plans.description','document','cash_accounts.accountno','cash_accounts.accountname','cash_accounts.accountdate','cash_accounts.amount')
                        ->where('cash_accounts.customer_id', '=', "$customer_id")
                        ->where('cash_accounts.deleted_at', '=', null)
                        ->orderBy('cash_accounts.accountno', 'ASC')
                        ->orderBy('plandate', 'ASC');


        return $listData;    
    }

    public function getCashAccountFromCashAccountId($cashaccount_id)
    {
        $search = array('id'=>$cashaccount_id);
        $listData = app(CashAccountRepository::class)->findWhere($search);

        return $listData;    
    }

    public function getCashAccountFromAccountno($accountno)
    {
        $search = array('accountno'=>$accountno);
        $listData = app(CashAccountRepository::class)->findWhere($search);

        return $listData;    
    }

    public function getListAccountDetail($customer_id, $accountno)
    {
//        $listData = DB::table('cash_plans')
//                        ->leftjoin('cash_accounts', 'cash_plans.accountno', '=', 'cash_accounts.accountno')
//                        ->select('cash_plans.id','cash_plans.customer_id','plantype','planname','plandate','cash_plans.currency','currentage','planage','planamount','currentamount','requireamount','planamountunittype','currentamountunittype','requireamountunittype','cash_plans.description','document','cash_plans.accountno','cash_accounts.accountname','cash_accounts.accountdate','cash_accounts.amount')
//                        ->where('cash_plans.customer_id', '=', "$customer_id")
//                        ->where('cash_plans.deleted_at', '=', null)
//                        ->where('cash_accounts.accountno', '<>', "$accountno")
//                        ->orderBy('plandate', 'ASC');

        $listData = DB::table('cash_accounts')
                        ->leftjoin('cash_plans', 'cash_accounts.accountno', '=', 'cash_plans.accountno')
                        ->select('cash_plans.id','cash_plans.customer_id','plantype','planname','plandate','cash_plans.currency','currentage','planage','planamount','currentamount','requireamount','planamountunittype','currentamountunittype','requireamountunittype','cash_plans.description','document','cash_accounts.accountno','cash_accounts.accountname','cash_accounts.accountdate','cash_accounts.amount')
                        ->where('cash_accounts.customer_id', '=', "$customer_id")
                        ->where('cash_accounts.deleted_at', '=', null)
                        ->where('cash_accounts.accountno', '<>', "$accountno")
                        ->orderBy('plandate', 'ASC');

        return $listData;    
    }

    public function getListCashTransactionFromCustomerIdAccountNo($customer_id, $accountno, $accountstatustype, $fromdate, $todate)
    {
        $search = [
                    ['customer_id', '=', $customer_id],
                    ['accountno', '=', $accountno],
                    ['incomestatustype', 'like', "%$accountstatustype%"],
                    ['transactiondate', '>=', $fromdate],
                    ['transactiondate', '<=', $todate],
                 ];
        $listData = app(CashTransactionRepository::class)->orderBy('transactiondate', 'asc')->findWhere($search);

        return $listData;    
    }

    /**
     * deleteCashAccount
     * 
     * @author  linh
     * @param   string accountno
     * @return  boolean
     * @access  public
     * @date    Sep 14, 2019 5:18:52 PM
     */
    public function deleteCashAccount($customerid, $accountno)
    {
        \DB::table('cash_accounts')
            ->where('customer_id', '=', $customerid)
            ->where('accountno', '=', $accountno)
            ->delete();
        return true;
    }
    
}
