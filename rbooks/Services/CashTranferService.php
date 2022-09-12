<?php

namespace RBooks\Services;

use RBooks\Repositories\CashTranferRepository;
use RBooks\Repositories\CashPlanRepository;
use RBooks\Repositories\CashAccountRepository;
use RBooks\Repositories\CashTransactionRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\CashTranfer;
use RBooks\Services\CashAccountService;
use RBooks\Services\CashPlanService;
use RBooks\Services\CashPlanDetailService;

class CashTranferService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CashTranferRepository::class);
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {

            $customer_id = $request->customer_id;
            $customer_id_decrypt = Crypt::decrypt($customer_id);
    
            $cashaccount_id_send = quote_smart($request->cashaccount_id_send);
            $accountno_send = ''; $accountname_send = ''; $amount_send = 0;
            if ($cashaccount_id_send != ''){
                $accountData = app(CashAccountService::class)->getCashAccountFromCashAccountId($cashaccount_id_send);  
                $accountno_send = $accountData->first()->accountno;
                $accountname_send = $accountData->first()->accountname;
                $amount_send = $accountData->first()->amount;
            }
            $accountno_send = quote_smart($accountno_send);
    
            $cashaccount_id_receive = quote_smart($request->cashaccount_id_receive);
            $accountno_receive = ''; $accountname_receive = ''; $amount_receive = 0;
            if ($cashaccount_id_receive != ''){
                $accountData = app(CashAccountService::class)->getCashAccountFromCashAccountId($cashaccount_id_receive);  
                $accountno_receive = $accountData->first()->accountno;
                $accountname_receive = $accountData->first()->accountname;
                $amount_receive = $accountData->first()->amount;            
            }
            $accountno_receive = quote_smart($accountno_receive);
    
            $tranferdate = ($request->tranferdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->tranferdate)));
            $currency = quote_smart('VND');
            $amount = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));
            $description = quote_smart($request->description);
    
            $created_user_id = quote_smart(Auth()->user()->id);
            $updated_user_id = quote_smart(Auth()->user()->id);

            //Kiem tra vi chuyen tien co phai vi tong ko -> 1: vi tong thi chuyen binh thuong, 2: neu la vi muc tieu thi se tat toan vi muc tieu
            $accountno_primary = $request->accountno_primary;
            if ($accountno_primary != $cashaccount_id_send){
                //Lay vi muc tieu va so tai khoan da nhan tien tu vi tong
                $cashplanid = '';
                $cashplan = app(CashPlanService::class)->getCashPlanFromAccountno($accountno_send);  
                $cashplanid = $cashplan->get()->first()->id;
            	
                $dataCashPlan = [
                    'finish' => '1',
                    'finishdate' => $tranferdate,
                ];
                $retCashPlan = app(CashPlanRepository::class)->update($dataCashPlan, $cashplanid);
            }
            //Kiem tra vi nhan tien co phai vi tong ko ->1: neu la vi tong thi se khong cap nhat vao ke hoach muc tieu, 2: vi con thi cap nhat so tien thuc hien vao muc tieu 
            if ($accountno_primary != $cashaccount_id_receive){
                //Cap nhat vao cashplandetail so tien da thuc hien chuyen tien tu vi tong sang vi con
                $retcashPlanDetail = app(CashPlanDetailService::class)->updateCashPlanDetailFromTranferCashAccount($request->tranferdate, $amount, $accountno_receive);
            }
                        
            $data = [
                'customer_id' => $customer_id_decrypt,
                'cashaccount_id_send' => $cashaccount_id_send,
                'accountno_send' => $accountno_send,
                'cashaccount_id_receive' => $cashaccount_id_receive,
                'accountno_receive' => $accountno_receive,
                'tranferdate' => $tranferdate,
                'currency' => $currency,
                'amount' => $amount,
                'description' => $description,
                'created_user_id' => $created_user_id,
                'updated_user_id' => $updated_user_id,
            ];
    
            $retCashTranfer = $this->repository->create($data);
    
            //Cap nhat vi tien lien quan sau khi chuyen tien
            $amount_send = $amount_send - $amount;
            $dataCashAccount = [
                'amount' => $amount_send,
                'updated_user_id' => $updated_user_id,
            ];
            $retCashAccount = app(CashAccountRepository::class)->update($dataCashAccount, $cashaccount_id_send);
    
            $amount_receive = $amount_receive + $amount;
            $dataCashAccount = [
                'amount' => $amount_receive,
                'updated_user_id' => $updated_user_id,
            ];
            $retCashAccount = app(CashAccountRepository::class)->update($dataCashAccount, $cashaccount_id_receive);
    
            //Transaction luu cac thao tac chuyen tien
            $content = "Chuyển tiền tới ví $accountno_receive $accountname_receive";
            $dataCashTransaction = [
                'customer_id' => $customer_id_decrypt,
                'accountno' => $accountno_send,
                'incomestatus' => '2',//0: Thu nhap; 1: Chi phí; 2: Chuyen tien
                'incomestatustype' => '1',//Loai Chi Chuyen tien
                'incometype' => '1',//Chi
                'content' => $content,
                'transactiondate' => $tranferdate,
                'amount' => $amount,
                'description' => $retCashTranfer->id,
                'created_user_id' => $created_user_id,
                'updated_user_id' => $updated_user_id,
            ];
            $retCashTransaction = app(CashTransactionRepository::class)->create($dataCashTransaction);
    
            $content = "Nhận tiền từ ví $accountno_send $accountname_send";
            $dataCashTransaction = [
                'customer_id' => $customer_id_decrypt,
                'accountno' => $accountno_receive,
                'incomestatus' => '2',//0: Thu nhap; 1: Chi phí; 2: Chuyen tien
                'incomestatustype' => '0',//Loai Nhan Chuyen tien
                'incometype' => '0',//Nhan
                'content' => $content,
                'transactiondate' => $tranferdate,
                'amount' => $amount,
                'description' => $retCashTranfer->id,
                'created_user_id' => $created_user_id,
                'updated_user_id' => $updated_user_id,
            ];
            $retCashTransaction = app(CashTransactionRepository::class)->create($dataCashTransaction);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return $retCashTranfer;
    }

    public function update($request, $id)
    {
        $cashaccount_id_send = quote_smart($request->cashaccount_id_send);
        $accountno_send = '';
        if ($cashaccount_id_send != ''){
            $accountData = app(CashAccountService::class)->getCashAccountFromCashAccountId($cashaccount_id_send);  
            $accountno_send = $accountData->first()->accountno;
        }
        $accountno_send = quote_smart($accountno_send);

        $cashaccount_id_receive = quote_smart($request->cashaccount_id_receive);
        $accountno_receive = '';
        if ($cashaccount_id_receive != ''){
            $accountData = app(CashAccountService::class)->getCashAccountFromCashAccountId($cashaccount_id_receive);  
            $accountno_receive = $accountData->first()->accountno;
        }
        $accountno_receive = quote_smart($accountno_receive);

        $tranferdate = ($request->tranferdate==""?quote_smart("0000-00-00"):quote_smart(FormatDateForSQL($request->tranferdate)));
        $currency = quote_smart('VND');
        $amount = (removeFormatNumber($request->amount) == '' ? '0' : removeFormatNumber($request->amount));
        $description = quote_smart($request->description);

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'customer_id' => $customer_id_decrypt,
            'cashaccount_id_send' => $cashaccount_id_send,
            'accountno_send' => $accountno_send,
            'cashaccount_id_receive' => $cashaccount_id_receive,
            'accountno_receive' => $accountno_receive,
            'tranferdate' => $tranferdate,
            'currency' => $currency,
            'amount' => $amount,
            'description' => $description,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->update($data, $id);
    }

    public function tranferCashAccountToPrimaryAcount($customer_id, $accountno)
    {
        DB::beginTransaction();

        try {
            //Vi tai chinh chuyen tien
            $accountno_send = $accountno; 
            $cashaccount_id_send = ''; $accountname_send = ''; $amount_send = 0;
            if ($accountno_send != ''){
                $accountData = app(CashAccountService::class)->getCashAccountFromAccountno($accountno_send);  
                $cashaccount_id_send = $accountData->first()->id;
                $accountno_send = $accountData->first()->accountno;
                $accountname_send = $accountData->first()->accountname;
                $amount_send = $accountData->first()->amount;
            }
    
            //Vi tai chinh nhan: vi tong
            $accountno_primary = (Auth::user() == null ? "-1" : Auth::user()->customer()->first()->customercode) . "0000";
            $accountData_primary = app(CashAccountService::class)->getCashAccountFromAccountno($accountno_primary);

            $cashaccount_id_receive = ''; $accountno_receive = ''; $accountname_receive = ''; $amount_receive = 0;
            if ($accountData_primary->first() != null){
                $cashaccount_id_receive = $accountData_primary->first()->id;
                $accountno_receive = $accountData_primary->first()->accountno;
                $accountname_receive = $accountData_primary->first()->accountname;
                $amount_receive = $accountData_primary->first()->amount;            
            }
    
            $tranferdate = quote_smart(FormatDateForSQL(getCurrentDate('d')));
            $currency = quote_smart('VND');
            $amount = $amount_send;
    
            $created_user_id = quote_smart(Auth()->user()->id);
            $updated_user_id = quote_smart(Auth()->user()->id);

            //Vi muc tieu => tat toan vi muc tieu can xoa
            $cashplanid = '';
            $cashplan = app(CashPlanService::class)->getCashPlanFromAccountno($accountno_send);  
            $cashplanid = $cashplan->get()->first()->id;
            $dataCashPlan = [
                'finish' => '1',
                'finishdate' => $tranferdate,
            ];
            $retCashPlan = app(CashPlanRepository::class)->update($dataCashPlan, $cashplanid);

            $description = "Nhận tiền từ ví $accountno_send $accountname_send do xóa ví tài chính";
            $data = [
                'customer_id' => $customer_id,
                'cashaccount_id_send' => $cashaccount_id_send,
                'accountno_send' => $accountno_send,
                'cashaccount_id_receive' => $cashaccount_id_receive,
                'accountno_receive' => $accountno_receive,
                'tranferdate' => $tranferdate,
                'currency' => $currency,
                'amount' => $amount,
                'description' => $description,
                'created_user_id' => $created_user_id,
                'updated_user_id' => $updated_user_id,
            ];
    
            $retCashTranfer = $this->repository->create($data);
    
            //Cap nhat vi tien lien quan sau khi chuyen tien
            $amount_send = $amount_send - $amount;
            $dataCashAccount = [
                'amount' => $amount_send,
                'updated_user_id' => $updated_user_id,
            ];
            $retCashAccount = app(CashAccountRepository::class)->update($dataCashAccount, $cashaccount_id_send);
    
            $amount_receive = $amount_receive + $amount;
            $dataCashAccount = [
                'amount' => $amount_receive,
                'updated_user_id' => $updated_user_id,
            ];
            $retCashAccount = app(CashAccountRepository::class)->update($dataCashAccount, $cashaccount_id_receive);
    
            //Transaction luu cac thao tac chuyen tien
            $content = "Chuyển tiền tới ví $accountno_receive $accountname_receive";
            $dataCashTransaction = [
                'customer_id' => $customer_id,
                'accountno' => $accountno_send,
                'incomestatus' => '2',//0: Thu nhap; 1: Chi phí; 2: Chuyen tien
                'incomestatustype' => '1',//Loai Chi Chuyen tien
                'incometype' => '1',//Chi 
                'content' => $content,
                'transactiondate' => $tranferdate,
                'amount' => $amount,
                'description' => $retCashTranfer->id,
                'created_user_id' => $created_user_id,
                'updated_user_id' => $updated_user_id,
            ];
            $retCashTransaction = app(CashTransactionRepository::class)->create($dataCashTransaction);
    
            $content = "Nhận tiền từ ví $accountno_send $accountname_send";
            $dataCashTransaction = [
                'customer_id' => $customer_id,
                'accountno' => $accountno_receive,
                'incomestatus' => '2',// 0: Thu nhap; 1: Chi phí; 2: Chuyen tien
                'incomestatustype' => '0',//Loai Nhan Chuyen tien
                'incometype' => '0',//Nhan 
                'content' => $content,
                'transactiondate' => $tranferdate,
                'amount' => $amount,
                'description' => $retCashTranfer->id,
                'created_user_id' => $created_user_id,
                'updated_user_id' => $updated_user_id,
            ];
            $retCashTransaction = app(CashTransactionRepository::class)->create($dataCashTransaction);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return $retCashTranfer;
    }
}
