<?php

namespace App\Http\Controllers\CompanyManage;

use \Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use RBooks\Services\UserService;
use Illuminate\Http\Request;
use App\Constants\Export;
use App\Constants\NotificationMessage;
use RBooks\Services\EmployeeService;
use RBooks\Models\User;
use Illuminate\Support\Facades\Crypt;
use RBooks\Services\ApplicationRolesService;
use RBooks\Services\APIAdminService;
use RBooks\Services\ServiceProductService;
use App\Exports\UserExport;
use Excel;

class UserController extends Controller
{
    public function __construct(UserService $service)
    {
        parent::__construct($service);
        $this->setViewPrefix('user-employees.user.');
        $this->setRoutePrefix('users-');
        $this->view->setHeading('Danh sách User quản trị');
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
        $this->view->accounttypes = config('rbooks.ACCOUNTTYPE');
        
        // Setup title
        $this->view->setSubHeading('Danh sách');
        return $this->view('user_account.index');
    }

    public function add()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->applicationroles = app(ApplicationRolesService::class)->getAll();
        $this->view->accounttypes = config('rbooks.ACCOUNTTYPE');
        
        $this->view->setSubHeading('Thêm mới tài khoản đăng nhập');
        return $this->view('user_account.add');
    }
        
    public function edit($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->model = $this->main_service->find($id);
        $this->view->applicationroles = app(ApplicationRolesService::class)->getAll();
        $this->view->accounttypes = config('rbooks.ACCOUNTTYPE');
                
        // Setup title
        $this->view->setSubHeading('Chỉnh sửa');
        return $this->view('user_account.edit');
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

    public function detail($id)
    {
        $userid = Crypt::decrypt($id);
        $user = $this->main_service->find($userid);
         
        $employeeid = "";
        $this->view->setSubHeading('Chi tiết nhân viên');
        if ($user->employee()->first() == NULL){
            return redirect()->route('employees-add');
        }

        $employeeid = $user->employee()->first()->id;
        
        $this->view->detai_employee = app(EmployeeService::class)->getEmployee($employeeid);
        $this->view->parameter = Crypt::encrypt($this->view->detai_employee->id);

        return $this->view('detail', ['parameter' => $this->view->parameter]);
    }

    public function export(Request $request)
    {
        $customers = $this->main_service->getListUserBySearch("", "")->paginate(100000);
        $serviceproduct = app(ServiceProductService::class)->getListServiceProduct(1);
        $accounttypes = config('rbooks.ACCOUNTTYPE');
        $accountproductstatus = config('rbooks.ACCOUNTPRODUCTSTATUS');
        
        foreach ($customers as $customer) {

            $data[] = array(
                'id' => $customer->id,
                'name' => $customer->name,
                'email' => $customer->email,
                'role' => $customer->role,
                'blocked' => $accounttypes[$customer->blocked],
                'created_at' => $customer->created_at,
            );
        }
        return Excel::download(new UserExport($data), 'users-export-' . '-' . date(Export::DATE_FORMAT) . '.xlsx');
    }


}
