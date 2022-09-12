<?php

namespace RBooks\Services;

use RBooks\Repositories\CashAssetRepository;
use RBooks\Repositories\CashAccountRepository;
use RBooks\Repositories\CashTransactionRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\CashAsset;
use RBooks\Services\CashAccountService;
use RBooks\Services\ConfigTypeService;

class CashAssetService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CashAssetRepository::class);
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

        $assetname = quote_smart($request->assetname);
        $assettype = quote_smart($request->assettype);
        $assettypedetail = quote_smart($request->assettypedetail);        
        $assetdate = ($request->assetdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->assetdate)));
        $assetstatustype = quote_smart($request->assetstatustype);
        $currency = quote_smart('VND');
        $amount = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));
        $description = quote_smart($request->description);
        $cashaccount_id = quote_smart($request->cashaccount_id);

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
            'assetname' => $assetname,
            'assettype' => $assettype,
            'assettypedetail' => $assettypedetail,
            'assetdate' => $assetdate,
            'assetstatustype' => $assetstatustype,
            'cashaccount_id' => $cashaccount_id,
            'accountno' => $accountno,
            'currency' => $currency,
            'amount' => $amount,
            'remainamount' => $amount,
            'description' => $description,
            'document' => $imageN,
            'created_user_id' => $created_user_id,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->create($data);
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

        $assetname = quote_smart($request->assetname);
        $assettype = quote_smart($request->assettype);
        $assettypedetail = quote_smart($request->assettypedetail);        
        $assetdate = ($request->assetdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->assetdate)));
        $assetstatustype = quote_smart($request->assetstatustype);
        $currency = quote_smart('VND');
        $amount = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));
        $description = quote_smart($request->description);
        $cashaccount_id = quote_smart($request->cashaccount_id);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'assetname' => $assetname,
            'assettype' => $assettype,
            'assettypedetail' => $assettypedetail,
            'assetdate' => $assetdate,
            'assetstatustype' => $assetstatustype,
            'currency' => $currency,
            'amount' => $amount,
            'remainamount' => $amount,            
            'description' => $description,
            'document' => $imageN,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->update($data, $id);
    }

    /**
     * updateCashAsset
     * Cap nhat so tien tai san
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function updateCashAsset($amount, $amountUpdate, $id)
    {
        $cashasset = app(CashAssetService::class)->find($id);
        $cashasset_remainamount = $cashasset->remainamount;
        $cashasset_remainamount = $cashasset_remainamount + $amount - $amountUpdate;    

        $updated_user_id = quote_smart(Auth()->user()->id);
        $data = [
            'remainamount' => $cashasset_remainamount,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->update($data, $id);
    }
    
    /**
     * getListAccountAssetFromCustomer
     * Lay danh sach tai san cua khach hang
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListAccountAssetFromCustomer($customer_id, $sfromDate, $stoDate)
    {

        $check = [
                    ['cash_assets.deleted_at', '=', null],
                    ['cash_assets.customer_id', '=', "$customer_id"],
                 ];
        if($sfromDate != ""){
            $check[] = ['cash_assets.assetdate', '>=', "$sfromDate"];   
        }
        if($stoDate != ""){
            $check[] = ['cash_assets.assetdate', '<=', "$stoDate"];   
        }

        $listData = DB::table('cash_assets')->leftjoin('customers', 'customers.id', '=', 'cash_assets.customer_id')
                        ->leftjoin('config_types', 'config_types.id', '=', 'cash_assets.assettype')
                        ->leftjoin('config_type_details', 'config_type_details.id', '=', 'cash_assets.assettypedetail')
                        ->select('cash_assets.id','fullname','assetname','assettype','assettypedetail','assetdate','assetstatustype','amount','remainamount','currency','config_types.name as config_types_name','config_type_details.name as config_type_details_name','document')
                        ->where($check)
                        ->orderBy('cash_assets.assetdate', 'desc');

        return $listData;    
    }

    /**
     * getListAccountAssetFromCustomerByAssetStatusType
     * Lay danh sach tai san cua khach hang theo tai san no, tai san co
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListAccountAssetFromCustomerByAssetStatusType($customer_id, $assetstatustype)
    {
        $search = array('customer_id'=>$customer_id, 'assetstatustype'=>$assetstatustype);
        $listData = app(CashAssetRepository::class)->findWhere($search);

        return $listData;    
    }


    /**
     * getListAccountAssetFromCustomerId
     * Lay danh sach thu nhap chi phi cua khach hang theo ngay
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListAccountAssetFromCustomerId($customer_id, $searchdate)
    {
        $search = array('customer_id'=>$customer_id, 'assetdate'=>$searchdate);
        $listData = app(CashAssetRepository::class)->findWhere($search);

        return $listData;    
    }    

    /**
     * getListAssetExpenseFromCustomerIdByAssetStatusType
     * Lay danh sach va tra ve 2 array tai san no, co cua khach hang
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListAssetExpenseFromCustomerIdByAssetStatusType($customer_id, $assetstatustype)
    {
        $ret_array = array();

        $listassets = DB::table('cash_assets')
                        ->leftjoin('config_types', 'config_types.id', '=', 'cash_assets.assettype')
                        ->select('assettype', 'config_types.name as assettypename', DB::raw('sum(remainamount) as amount'))
                        ->where('customer_id', '=', $customer_id)
                        ->where('assetstatustype', '=', $assetstatustype)
                        ->where('cash_assets.deleted_at', '=', null)
                        ->groupBy('assettype')
                        ->orderBy('assettype', 'asc')
                        ->get();

        foreach($listassets as $cashasset){

            $dataItem = [
                'amount' => $cashasset->amount,
                'assettype' => $cashasset->assettype,
                'assettypename' => $cashasset->assettypename,                
            ];

            $ret_array [] = $dataItem; 
        }

        
        return $ret_array;    
    }  
 
}
