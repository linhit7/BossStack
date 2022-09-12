<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RBooks\Services\OperationLogService;
use RBooks\Services\UserService;
use \Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $errorlog = config('rbooks.ERRORLOG');
        $captchacode_check = Session::get('captchacode');
        $captchacode = $request->captchacode;                  
                 
        $user_id = Auth()->user()->id;
        $email = Auth()->user()->email;
        $retLog = app(OperationLogService::class)->createOperationLog($user_id, '0', 'Login', $email, 'Đăng nhập vào hệ thống');
        $retUser = app(UserService::class)->updateLastLoginAt($user_id);

        $currentdate = getCurrentDate('d');
        $blocked = Auth()->user()->blocked;
        $role = Auth()->user()->role;
        $finish_at = (Auth()->user()->finish_at == null ? '' : ConvertSQLDate(Auth()->user()->finish_at));

        if ($captchacode != $captchacode_check){
            Auth::logout();
            return redirect('/login')->with('infor', $errorlog[6]);            
        }

        //Kiem tra tai khoan dang nhap con han su dung hay khong
        if ($blocked == 0 and $role == 'KH'){
            if ($finish_at != '' and Date1GreaterThanDate2($currentdate, $finish_at)){
                Auth::logout();
                return redirect('/login')->with('infor', $errorlog[4]);            
            }
        }elseif ($blocked == 1){//Kiem tra tai khoan dang nhap co bi khoa
            Auth::logout();
            return redirect('/login')->with('infor', $errorlog[5]);            
        }
       
        if ($role == 'KH'){
        	return redirect('/customer');
        }

        return redirect('/manage');
    }

}
