<?php

namespace RBooks\Services;

use RBooks\Repositories\CashPlanRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\CashPlan;
use RBooks\Services\CashPlanDetailService;
use RBooks\Services\CashAccountService;
use RBooks\Services\CashTranferService;
use RBooks\Repositories\CashAccountRepository;

class CashPlanService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CashPlanRepository::class);
    }

    public function create($request)
    {
        $customer_id = $request->customer_id;
        $customer_id_decrypt = Crypt::decrypt($customer_id);

        $plantypes = config('rbooks.PLANTYPES');
        $planname = 'Ví ' . $plantypes[$request->plantype];

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
                
        $plantype = quote_smart($request->plantype);
        $plandate = ($request->plandate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->plandate)));
        $finishdate = ($request->finishdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->finishdate)));
                
        $currency = quote_smart('VND');
        $currentage = quote_smart($request->currentage);
        $planage = quote_smart($request->planage);

        $planamountunittype = quote_smart($request->planamountunittype == null ? '' : $request->planamountunittype);
        $planamount = (removeFormatNumber($request->planamount) == '' ? '0' : removeFormatNumber($request->planamount));

        //Vi muc tieu lien ket voi vi tien vitong_muctieu
        $accountno = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode);
        $maxValue = $this->getMaxCashPlanFromCustomerId($customer_id_decrypt);
        $maxValue = ($maxValue == "" ? $accountno . "0000" : $maxValue);//Neu khach hang chua có vi thi bang customercode + 0000 (vi tien 12 kitu)
        $maxValue = intval($maxValue) + 1;
        $maxValue = addPadding( $maxValue, 12, '0');
        $accountno = $maxValue;
        $accountno = quote_smart($accountno);

        $currentamountunittype = quote_smart($request->currentamountunittype);
        $currentamount = (removeFormatNumber($request->currentamount) == '' ? '0' : removeFormatNumber($request->currentamount));

        $requireamountunittype = quote_smart($request->requireamountunittype);
        $requireamount = (removeFormatNumber($request->requireamount) == '' ? '0' : removeFormatNumber($request->requireamount));

        $totalcurrentamount = (removeFormatNumber($request->totalcurrentamount) == '' ? '0' : removeFormatNumber($request->totalcurrentamount));

        $description = quote_smart($request->description);
        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'customer_id' => $customer_id_decrypt,
            'planname' => $planname,
            'plantype' => $plantype,
            'plandate' => $plandate,
            'finishdate' => $finishdate,
            'currency' => $currency,
            'currentage' => $currentage,
            'planage' => $planage,
            'planamount' => $planamount,
            'planamountunittype' => $planamountunittype,
            'accountno' => $accountno,
            'currentamount' => $currentamount,
            'currentamountunittype' => $currentamountunittype,
            'requireamount' => $requireamount,
            'requireamountunittype' => $requireamountunittype,
            'totalcurrentamount' => $totalcurrentamount,
            'description' => $description,
            'document' => $imageN,
            'created_user_id' => $created_user_id,
            'updated_user_id' => $updated_user_id,
        ];

        //Tao moi muc tieu tai chinh
        $cashplan = $this->repository->create($data);
        //Tao moi lich muc tieu tai chinh chi tiet
        $cashplandetail = app(CashPlanDetailService::class)->createCashPlanDetail($cashplan->id);

        //Tao moi vi tien muc tieu : so tai khoan vi = customercode_plantype, accountdate = ngay dang ki hien tai
        $dataCashAccount = [
            'customer_id' => $customer_id_decrypt,
            'accountno' => $accountno,
            'accountname' => $planname,
            'accountdate' => $plandate,
            'accountstatustype' => '0',
            'currency' => 'VND',
            'amount' => 0,
            'description' => '',
        ];
        $retCashAccount = app(CashAccountRepository::class)->create($dataCashAccount);

        return $cashplan;
    }

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

        $planname = quote_smart($request->planname);
        $plantype = quote_smart($request->plantype);
        $plandate = ($request->plandate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->plandate)));
        $finishdate = ($request->finishdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->finishdate)));

        $currency = quote_smart('VND');
        $currentage = quote_smart($request->currentage);
        $planage = quote_smart($request->planage);

        $planamountunittype = quote_smart($request->planamountunittype == null ? '' : $request->planamountunittype);
        $planamount = (removeFormatNumber($request->planamount) == '' ? '0' : removeFormatNumber($request->planamount));

        $currentamountunittype = quote_smart($request->currentamountunittype);
        $currentamount = (removeFormatNumber($request->currentamount) == '' ? '0' : removeFormatNumber($request->currentamount));

        $requireamountunittype = quote_smart($request->requireamountunittype);
        $requireamount = (removeFormatNumber($request->requireamount) == '' ? '0' : removeFormatNumber($request->requireamount));

        $totalcurrentamount = (removeFormatNumber($request->totalcurrentamount) == '' ? '0' : removeFormatNumber($request->totalcurrentamount));

        $description = quote_smart($request->description);
        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'plantype' => $plantype,
            'plandate' => $plandate,
            'finishdate' => $finishdate,
            'currency' => $currency,
            'currentage' => $currentage,
            'planage' => $planage,
            'planamount' => $planamount,
            'planamountunittype' => $planamountunittype,
            'currentamount' => $currentamount,
            'currentamountunittype' => $currentamountunittype,
            'requireamount' => $requireamount,
            'requireamountunittype' => $requireamountunittype,
            'totalcurrentamount' => $totalcurrentamount,
            'description' => $description,
            'document' => $imageN,
            'updated_user_id' => $updated_user_id,
        ];

        //Cap nhat muc tieu tai chinh
        $cashplan = $this->repository->update($data, $id);

        //Tao moi lich muc tieu tai chinh chi tiet
        $cashplandetail = app(CashPlanDetailService::class)->createCashPlanDetail($id);

        return $cashplan;
    }

    public function getListAccountPlanFromCustomer($customer_id, $request)
    {
        $searchField = ($request->searchField == null ? 'planname' : $request->searchField);
        $searchValue = ($request->searchValue == null ? '' : $request->searchValue);
        $listData = DB::table('cash_plans')->leftjoin('customers', 'customers.id', '=', 'cash_plans.customer_id')
                        ->leftjoin('cash_accounts', 'cash_plans.accountno', '=', 'cash_accounts.accountno')
                        ->select('cash_plans.id','cash_plans.customer_id','fullname','plantype','planname','plandate','cash_plans.currency','currentage','planage','planamount','currentamount','requireamount','planamountunittype','currentamountunittype','requireamountunittype','cash_plans.description','document','cash_plans.accountno','cash_accounts.amount','cash_plans.finish','cash_plans.finishdate')
                        ->where('cash_plans.customer_id', '=', "$customer_id")
                        ->where('cash_plans.deleted_at', '=', null)
                        ->where($searchField, 'like', "%$searchValue%")
                        ->orderBy('plandate', 'ASC');

        return $listData;    
    }

    public function getListCashPlanFromCustomerId($customer_id)
    {
        $search = array('customer_id'=>$customer_id);
        $listData = app(CashPlanRepository::class)->orderBy('plandate', 'ASC')->findWhere($search);

        return $listData;    
    }

    public function getMaxCashPlanFromCustomerId($customer_id)
    {
        $search = array('customer_id'=>$customer_id);
        $listData = app(CashPlanRepository::class)->orderBy('accountno', 'DESC')->findWhere($search);

        $maxvalue = "";
        if ($listData->first() != null){
            $maxvalue = $listData->first()->accountno;	
        }
          
        return $maxvalue;    
    }
    
    /**
     * getCashPlanFromAccountno
     * Lay vi muc tieu
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getCashPlanFromAccountno($accountno)
    {
        $data = app(CashPlan::class)->where('accountno', '=', "$accountno");

        return $data;    
    }               

    public function deleteCashPlan($id)
    {
        DB::beginTransaction();

        $model = app(CashPlanService::class)->find($id);
        $customer_id = $model->customer_id;
        $accountno = $model->accountno;

        try {
            //Chuyen tien tu vi tai chinh sang vi tong va xoa vi tai chinh
            $ret = app(CashTranferService::class)->tranferCashAccountToPrimaryAcount($customer_id, $accountno);

            //Xoa vi tai chinh        
            $ret = app(CashPlanService::class)->delete($id);
    
            //Xoa data table cash_plans_detail
            $ret = app(CashPlanDetailService::class)->deleteCashPlanDetail($id);
    
            //Xoa data table cash_accounts
            $ret = app(CashAccountService::class)->deleteCashAccount($customer_id, $accountno);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return true;
    }
}
