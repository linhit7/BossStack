<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CashAccountService;
use RBooks\Services\UserService;
use App\Http\Requests\CashAccountStoreRequest;
use RBooks\Models\CashAccount;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use \Auth;

class CashAccountController extends Controller
{
    public function __construct(CashAccountService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.cashaccount.');
        $this->setRoutePrefix('cashaccounts-');

        $this->view->setHeading('QUẢN LÝ VÍ TIỀN');
    }

    public function index(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->accountstatustype = config('rbooks.ACCOUNTSTATUSTYPE');

        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $collections = $this->main_service->getListAccountFromCustomer($customer_id, $request)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;
                
        return $this->view('index');
    }
    
    public function beforeAdd()
    {
        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $customer_id_encrypt = Crypt::encrypt($customer_id);
        $this->view->customer_id = $customer_id_encrypt;

        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->accountstatustype = config('rbooks.ACCOUNTSTATUSTYPE');
        $this->view->accountdate = getCurrentDate('d');
    }

    public function store(CashAccountStoreRequest $request)
    {
        $result = $this->main_service->create($request);
        $message = "";
        if ($result){
            $message = "Thông tin đã được lưu thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;

        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->accountstatustype = config('rbooks.ACCOUNTSTATUSTYPE');

        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $collections = $this->main_service->getListAccountFromCustomer($customer_id, $request)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        return $this->view('index');
    }

    public function edit($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->accountstatustype = config('rbooks.ACCOUNTSTATUSTYPE');
                
        $this->view->model = $this->main_service->find($id);
        $this->view->setSubHeading('Chỉnh sửa');

        return $this->view('edit');
    }

    public function update(CashAccountStoreRequest $request, $id)
    {
        $result = $this->main_service->update($request, $id);

        $message = "";
        if ($result){
            $message = "Thông tin đã được cập nhật thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;

        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->accountstatustype = config('rbooks.ACCOUNTSTATUSTYPE');

        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $collections = $this->main_service->getListAccountFromCustomer($customer_id, $request)->paginate($this->view->filter['limit']);
        $this->view->collections = $collections;

        return $this->view('index');
    }

    public function viewAccount($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->accountstatustype = config('rbooks.ACCOUNTSTATUSTYPE');

        $this->view->cashaccount = $id;
                
        $model = $this->main_service->find($id);
        $this->view->model = $model;
         
        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $listaccounts = $this->main_service->getListAccountFromCustomerId($customer_id)->paginate();
        $this->view->listaccounts = $listaccounts;

        $now = Carbon::now();
        $firstDate = DateAdd (getCurrentDate('d'),'d',-5);
        $fromDate = $firstDate;
        $toDate = getCurrentDate('d');
        $this->view->fromDate = $fromDate;
        $this->view->toDate = $toDate;

        $sfromDate = FormatDateForSQL($fromDate);
        $stoDate = FormatDateForSQL($toDate);

        $listCashTransaction = $this->main_service->getListCashTransactionFromCustomerIdAccountNo($customer_id, $model->accountno, '', $sfromDate, $stoDate);
        $this->view->listCashTransaction = $listCashTransaction;

        $listCashTransactionIncome = $this->main_service->getListCashTransactionFromCustomerIdAccountNo($customer_id, $model->accountno, '0', $sfromDate, $stoDate);
        $this->view->listCashTransactionIncome = $listCashTransactionIncome;

        $listCashTransactionExpense = $this->main_service->getListCashTransactionFromCustomerIdAccountNo($customer_id, $model->accountno, '1', $sfromDate, $stoDate);
        $this->view->listCashTransactionExpense = $listCashTransactionExpense;
       
        $this->view->setSubHeading('Chi tiết ví tiền');

        return $this->view('view');
    }

    public function detailAccount(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->accountstatustype = config('rbooks.ACCOUNTSTATUSTYPE');
        
        $cashaccount_id = $request->cashaccount;
        $this->view->cashaccount = $cashaccount_id;
                
        $model = $this->main_service->find($cashaccount_id);
        $this->view->model = $model;

        $customer_id = (Auth::user()->customer() == null ? "-1" : Auth::user()->customer()->first()->id);
        $listaccounts = $this->main_service->getListAccountFromCustomerId($customer_id)->paginate();;
        $this->view->listaccounts = $listaccounts;

        $now = Carbon::now();
        $firstDate = DateAdd (getCurrentDate('d'),'d',-5);
        $fromDate = $firstDate;
        $toDate = getCurrentDate('d');
        $this->view->fromDate = $fromDate;
        $this->view->toDate = $toDate;

        $sfromDate = FormatDateForSQL($fromDate);
        $stoDate = FormatDateForSQL($toDate);

        $listCashTransaction = $this->main_service->getListCashTransactionFromCustomerIdAccountNo($customer_id, $model->accountno, '', $sfromDate, $stoDate);
        $this->view->listCashTransaction = $listCashTransaction;

        $listCashTransactionIncome = $this->main_service->getListCashTransactionFromCustomerIdAccountNo($customer_id, $model->accountno, '0', $sfromDate, $stoDate);
        $this->view->listCashTransactionIncome = $listCashTransactionIncome;

        $listCashTransactionExpense = $this->main_service->getListCashTransactionFromCustomerIdAccountNo($customer_id, $model->accountno, '1', $sfromDate, $stoDate);
        $this->view->listCashTransactionExpense = $listCashTransactionExpense;

        $this->view->setSubHeading('Chi tiết ví tiền');

        return $this->view('view');
    }
  
}
