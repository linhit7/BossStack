<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Constants\NotificationMessage;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CouponService;
use App\Http\Requests\CouponStoreRequest;
use App\Http\Requests\CouponCustomerStoreRequest;

class CouponController extends Controller
{
    public function __construct(CouponService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.coupon.');
        $this->setRoutePrefix('coupons-');

        $this->view->setHeading('Quản lý giảm giá');
    }

    public function index(Request $request )
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->coupontypes = config('rbooks.COUPONTYPE');
        $this->view->couponstatus = config('rbooks.COUPONSTATUS');
        
        $searchValue = ($request->searchValue == null ? "" : $request->searchValue);
        $searchField = ($request->searchField == null ? "" : $request->searchField);
        $this->view->searchValue = $searchValue;
        $this->view->searchField = $searchField;

        $this->view->collections = $this->main_service->getListCouponBySearch($searchField, $searchValue)->paginate($this->view->filter['limit']);
        
        $this->view->setSubHeading('Danh sách');
        return $this->view('index');
    }

    public function add()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->coupontypes = config('rbooks.COUPONTYPE');
        $this->view->couponstatus = config('rbooks.COUPONSTATUS');
        
        $this->view->setSubHeading('Thêm mới');
        return $this->view('add');
    }
    
    public function edit($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->coupontypes = config('rbooks.COUPONTYPE');
        $this->view->couponstatus = config('rbooks.COUPONSTATUS');
        
        $this->view->model = $this->main_service->find($id);

        $this->view->setSubHeading('Chỉnh sửa');
        return $this->view('edit');
    }

    public function mail($id)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();
        $this->view->coupontypes = config('rbooks.COUPONTYPE');
        $this->view->couponstatus = config('rbooks.COUPONSTATUS');
        
        $this->view->model = $this->main_service->find($id);

        $this->view->setSubHeading('Chỉnh sửa');
        return $this->view('mail');
    }

    public function store(CouponStoreRequest $request)
    {
        return $this->_store($request);
    }

    public function update(CouponStoreRequest $request, $id)
    {
        $model = $this->main_service->update($request, $id);

        if (!$model) {
            return redirect()
                ->route($this->route_prefix . 'index')
                ->withErrors(NotificationMessage::UPDATE_ERROR);
        }

        return redirect()
            ->route($this->route_prefix . 'index')
            ->with(NotificationMessage::UPDATE_SUCCESS);
    }

    public function sendMail(CouponCustomerStoreRequest $request, $id)
    {
        $check = 0;
        $quantitied = $request->quantitied;

        if ($quantitied > 0){
            $model = $this->main_service->sendMail($request, $id);
        }else{
            $check = 1;        	
        }

        if ($check == 1) {
            return redirect()
                ->route($this->route_prefix . 'index')
                ->withErrors(NotificationMessage::SEND_ERROR);
        }

        return redirect()
            ->route($this->route_prefix . 'index')
            ->with(NotificationMessage::UPDATE_SUCCESS);
    }
}
