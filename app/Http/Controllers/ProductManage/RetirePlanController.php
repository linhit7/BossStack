<?php

namespace App\Http\Controllers\ProductManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;
use RBooks\Services\CustomerService;
use RBooks\Services\RetirePlanService;
use RBooks\Services\CashAccountService;
use RBooks\Services\UserService;
use App\Http\Requests\RetirePlanStoreRequest;
use RBooks\Models\RetirePlan;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use \Auth;
use App\Constants\NotificationMessage;

class RetirePlanController extends Controller
{
    public function __construct(RetirePlanService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('product-manage.retireplan.');
        $this->setRoutePrefix('retireplans-');

        $this->view->setHeading('TÍNH SỐ TIỀN NGHỈ HƯU');

    }

    public function index(Request $request)
    {
        $this->setViewInit();

        $this->view->currentage = 0;
        $this->view->retirementage = 0;
        $this->view->longevity = 0;
        $this->view->currentincome = 0;
        $this->view->currentcost = 0;
        $this->view->retirementsavings = 0;
        $this->view->otherplan = 0;       

        $this->view->workage_d = 0;          
        $this->view->retirementyear_e = 0;
        $this->view->retirementamount_j = 0;
        $this->view->expenseretirementamount_k = 0;
        $this->view->totalexpenseretirementamount_l = 0;
        $this->view->totalamount_m = 0;


        return $this->view('index');
    }

    /**
     * setViewInit
     * Khoi tao tham so de hien thi view
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function setViewInit()
    {
        $customer_id = Auth::user()->customer()->first()->id;
        $this->viewInit($customer_id);
    }

    /**
     * viewInit
     * Khoi tao tham so de hien thi view
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function viewInit($customer_id)
    {
        $customer_id_encrypt = Crypt::encrypt($customer_id);
        $this->view->customer_id = $customer_id_encrypt;
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $this->view->setSubHeading('Tính số tiền nghỉ hưu');
    }
    
    /**
     * process
     * Tinh so tien nghi huu
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    04 14, 2020 5:18:52 PM
     */
    public function process(Request $request)
    {
        $this->setViewInit();

        $currentage = (removeFormatNumber($request->currentage) == '' ? '0' : removeFormatNumber($request->currentage));
        $retirementage = (removeFormatNumber($request->retirementage) == '' ? '0' : removeFormatNumber($request->retirementage));
        $longevity = (removeFormatNumber($request->longevity) == '' ? '0' : removeFormatNumber($request->longevity));
        $currentincome = (removeFormatNumber($request->currentincome) == '' ? '0' : removeFormatNumber($request->currentincome));
        $currentcost = (removeFormatNumber($request->currentcost) == '' ? '0' : removeFormatNumber($request->currentcost));
        $retirementsavings = (removeFormatNumber($request->retirementsavings) == '' ? '0' : removeFormatNumber($request->retirementsavings));
                                                
        $error = 0; $message = ""; $alert = "alert-success";
        if ($request->currentage == ''){
            $message = "Bạn chưa nhập tuổi hiện tại. Vui lòng nhập lại.";
            $error = 1;
            $alert = "alert-error";
        }elseif ($request->retirementage == ''){
            $message = "Bạn chưa nhập tuổi nghỉ hưu dự kiến. Vui lòng nhập lại.";
            $error = 1;
            $alert = "alert-error";
        }elseif ($request->longevity == ''){
            $message = "Bạn chưa nhập tuổi thọ dự kiến. Vui lòng nhập lại.";
            $error = 1;
            $alert = "alert-error";
        }elseif ($request->currentincome == ''){
            $message = "Bạn chưa nhập thu nhập hiện tại (tháng). Vui lòng nhập lại.";
            $error = 1;
            $alert = "alert-error";
        }elseif ($request->currentcost == ''){
            $message = "Bạn chưa nhập chi phí hiện tại (tháng) . Vui lòng nhập lại.";
            $error = 1;
            $alert = "alert-error";
        }elseif ($request->retirementsavings == ''){
            $message = "Bạn chưa nhập tiền đóng góp hưu trí (tháng). Vui lòng nhập lại.";
            $error = 1;
            $alert = "alert-error";
        }elseif ($currentage > $retirementage){
            $message = "Tuổi nghỉ hưu dự kiến phải lớn hơn tuổi hiện tại.";
            $error = 1;
            $alert = "alert-error";
        }elseif ($retirementage > $longevity){
            $message = "Tuổi thọ dự kiến phải lớn hơn tuổi nghỉ hưu dự kiến.";
            $error = 1;
            $alert = "alert-error";
        }

        if ($error == 1){
            $this->view->error = $error;
            $this->view->infor = $message;
            $this->view->alert = $alert;        
    
            $this->view->currentage = $currentage;     //Tuổi hiện tại của bạn
            $this->view->retirementage = $retirementage;     //Tuổi nghỉ hưu dự kiến
            $this->view->longevity = $longevity;   //Tuổi thọ dự kiến
            $this->view->currentincome = $currentincome;   //Thu nhập hiện tại 
            $this->view->currentcost = $currentcost;   //Chi phí hiện tại
            $this->view->retirementsavings = $retirementsavings;   //Tiền đóng góp hưu trí
            $this->view->otherplan = 0;    //Tiền cho các mục tiêu tài chính khác
    
            $this->view->workage_d = 0;      //Số năm còn làm việc    
            $this->view->retirementyear_e = 0;     //Số năm nghỉ hưu
            $this->view->retirementamount_j = 0;    //Tổng số tiền đóng góp dự kiến cho kỳ hưu trí
            $this->view->expenseretirementamount_k = 0;      //Tiền chi phí dự kiến để sống khi nghỉ hưu
            $this->view->totalexpenseretirementamount_l = 0;    //Tổng số tiền sinh hoạt phí dự kiến chúng ta cần cho kỳ nghỉ hưu
            $this->view->totalamount_m = 0; //Số tiền thiếu hụt khi nghỉ hưu
        }else{
            $otherplan = $currentincome - $currentcost - $retirementsavings;
            $workage_d = $retirementage - $currentage;          
            $retirementyear_e = $longevity - $retirementage;
            $retirementamount_j = ($retirementsavings * 12) * $workage_d;
            $expenseretirementamount_k = $currentcost + ($currentcost * ($workage_d * 0.03));
            $totalexpenseretirementamount_l = ($expenseretirementamount_k * 12) * $retirementyear_e;
            $totalamount_m = $totalexpenseretirementamount_l - $retirementamount_j;
    
            
            if ($totalamount_m <= 0){
            	$message = "Bạn đã tính đủ số tiền cho kỳ nghỉ hưu với đóng góp dự kiến hiện tại. Tuy nhiên, bạn nên đóng góp nhiều hơn nữa để đề phòng những rủi ro khác và sống đời sống hưu trí dư dả hơn.";
                $error = 2;
                $alert = "alert-success";
            }else{
                $message = "Bạn đang thiếu hụt số tiền " . formatNumber(abs($totalamount_m), 1, 0, 1) . " đồng, hãy thực hiện cắt giảm chi phí, tăng thu nhập để bổ sung thêm nguồn tiền vào quỹ hưu trí của bạn.";        	
                $error = 2;
                $alert = "alert-danger";
            }
    
            $this->view->error = $error;
            $this->view->infor = $message;
            $this->view->alert = $alert;        
    
            $this->view->currentage = $currentage;
            $this->view->retirementage = $retirementage;
            $this->view->longevity = $longevity;
            $this->view->currentincome = $currentincome;
            $this->view->currentcost = $currentcost;
            $this->view->retirementsavings = $retirementsavings;
            $this->view->otherplan = $otherplan;
    
            $this->view->workage_d = $workage_d;          
            $this->view->retirementyear_e = $retirementyear_e;
            $this->view->retirementamount_j = $retirementamount_j;
            $this->view->expenseretirementamount_k = $expenseretirementamount_k;
            $this->view->totalexpenseretirementamount_l = $totalexpenseretirementamount_l;
            $this->view->totalamount_m = $totalamount_m;
        }
        
        return $this->view('index');
    }
         
}
