<?php

namespace App\Http\Controllers\CompanyManage;

use \Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use RBooks\Services\UserCustomerService;
use Illuminate\Http\Request;
use App\Constants\Export;
use App\Constants\NotificationMessage;
use RBooks\Services\CustomerService;
use RBooks\Models\UserCustomer;
use Illuminate\Support\Facades\Crypt;
use RBooks\Services\ApplicationRolesService;
use RBooks\Services\APIAdminService;
use RBooks\Services\ServiceProductService;
use App\Exports\UserCustomerExport;
use Excel;

class UserCustomerController extends Controller
{
    public function __construct(UserCustomerService $service)
    {
        parent::__construct($service);
        $this->setViewPrefix('user-employees.user.');
        $this->setRoutePrefix('usercustomers-');
        $this->view->setHeading('Danh sách User khách hàng');
    }

    public function index(Request $request )
    {
        $applicationmodules = app(APIAdminService::class)->getLeftMenu($request->user()->role);
        $this->view->leftmenu = $applicationmodules;       

        $searchValue = ($request->searchValue == null ? "" : $request->searchValue);
        $searchField = ($request->searchField == null ? "" : $request->searchField);
        $this->view->searchValue = $searchValue;
        $this->view->searchField = $searchField;

        $this->view->collections = $this->main_service->getListUserBySearch($searchField, $searchValue)->paginate($this->view->filter['limit']);

        $this->view->applicationroles = app(ApplicationRolesService::class)->getAll();
        $this->view->customers = app(CustomerService::class)->getAll();
        // Setup title
        $this->view->setSubHeading('Danh sách');
        return $this->view('user_account_customer.index');
    }

    public function add()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->applicationroles = app(ApplicationRolesService::class)->getAll();
        $this->view->customers = app(CustomerService::class)->getAll();
        $this->view->accounttypes = config('rbooks.ACCOUNTTYPE');
        $this->view->accountproductstatus = config('rbooks.ACCOUNTPRODUCTSTATUS');        
        $this->view->serviceproduct = app(ServiceProductService::class)->getListServiceProduct(1);
                
        $this->view->setSubHeading('Thêm mới tài khoản đăng nhập');
        return $this->view('user_account_customer.add');
    }
    
    public function edit($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        
        $this->view->model = $this->main_service->find($id);
        $this->view->applicationroles = app(ApplicationRolesService::class)->getAll();
        $this->view->customers = app(CustomerService::class)->getAll();
        $this->view->accounttypes = config('rbooks.ACCOUNTTYPE');
        $this->view->accountproductstatus = config('rbooks.ACCOUNTPRODUCTSTATUS');        
        $this->view->serviceproduct = app(ServiceProductService::class)->getListServiceProduct(1);
                        
        // Setup title
        $this->view->setSubHeading('Chỉnh sửa');
        return $this->view('user_account_customer.edit');
    }

    public function store(UserStoreRequest $request)
    {
        return $this->_store($request);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $model = $this->main_service->update($request, $id);

        if (!$model) {
            return redirect()
                ->route($this->route_prefix . 'index')
                ->withErrors(NotificationMessage::UPDATE_ERROR);
        }

        if ($request->continue) {
            return redirect()
                ->route($this->route_prefix . 'edit', ['id' => $id, 'applicationroles' => $applicationroles])
                ->with(NotificationMessage::UPDATE_SUCCESS);
        }

        return redirect()
            ->route($this->route_prefix . 'index')
            ->with(NotificationMessage::UPDATE_SUCCESS);
    }

    public function delete($id)
    {
        $result = $this->main_service->delete($id);

        $message = "";
        if ($result){
            $message = "Thông tin đã được xóa thành công !";
        }else{
            $message = "Lỗi lưu dữ liệu !";
        }
        
        $this->view->infor = $message;

        return redirect()
            ->route($this->route_prefix . 'index')
            ->with(NotificationMessage::DELETE_SUCCESS);
    }

    public function export(Request $request)
    {
        $customers = $this->main_service->getListUserBySearch("", "")->paginate(100000);
        $serviceproduct = app(ServiceProductService::class)->getListServiceProduct(1);
        $accounttypes = config('rbooks.ACCOUNTTYPE');
        $accountproductstatus = config('rbooks.ACCOUNTPRODUCTSTATUS');
        
        foreach ($customers as $customer) {
            $product = ""; $product_time = ""; $product_status = "";

            $product = $customer->service_product_id == null ? '' : $serviceproduct->find($customer->service_product_id)->name;

            if($customer->service_product_id != 4){
                $product_time = ($customer->begin_at_product == null ? '' : ConvertSQLDate($customer->begin_at_product) ) . " - " . ($customer->finish_at_product == null ? '' : ConvertSQLDate($customer->finish_at_product) );
            } 

            $data[] = array(
                'id' => $customer->id,
                'name' => $customer->name,
                'email' => $customer->email,
                'role' => $customer->role,
                'blocked' => $accounttypes[$customer->blocked],
                'approved_product' => $accountproductstatus[$customer->approved_product],
                'product' => $product . " " . $product_time,
                'created_at' => $customer->created_at,
            );
        }
        return Excel::download(new UserCustomerExport($data), 'usercustomers-export-' . '-' . date(Export::DATE_FORMAT) . '.xlsx');
    }
}
