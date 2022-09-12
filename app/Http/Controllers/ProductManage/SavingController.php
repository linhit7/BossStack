<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\SavingService;
use RBooks\Services\UserService;
use App\Http\Requests\SavingStoreRequest;
use RBooks\Models\Saving;
use App\Exports\SavingExport;
use App\Constants\Export;
use Excel;

class SavingController extends Controller
{
    public function __construct(SavingService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.saving.');
        $this->setRoutePrefix('savings-');

        $this->view->setHeading('TIẾT KIỆM');

    }

    public function index(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

                
        return $this->view('index');
    }
    
    public function manage(Request $request)
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

                
        return $this->view('manage');
    }    
  
}
