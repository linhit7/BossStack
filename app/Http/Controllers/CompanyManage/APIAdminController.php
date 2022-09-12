<?php

namespace App\Http\Controllers\CompanyManage;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use RBooks\Services\APIAdminService;

class APIAdminController extends Controller
{
    public function __construct(APIAdminService $service)
    {
        parent::__construct($service);

        $this->setViewPrefix('company-manage.apiadmin.');
        $this->setRoutePrefix('apiadmin-');
        
        $this->view->setHeading('Thông báo hệ thống');
        $this->view->setSubHeading('Chi tiết');        
    }

    public function index(Request $request)
    {
        $this->view->setHeading('Thông báo hệ thống');
        return $this->view('index');        
    }

    public function access()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $message = "Thiết lập bảo mật truy cập hệ thống, bạn không được phép truy cập chức năng này !";
        $this->view->infor = $message;        
        $this->view->setHeading('Thông báo hệ thống');

        return $this->view('access');  
    }

    public function accesspage()
    {
        $this->view->leftmenu = app(APIAdminService::class)->setLeftMenu();

        $message = "Thiết lập bảo mật truy cập hệ thống, bạn không được phép truy cập chức năng này !";
        $this->view->infor = $message;        
        $this->view->setHeading('Thông báo hệ thống');

        return $this->view('accesspage');  
    }
    
    public function getCaptcha(Request $request)
    {
        $font = public_path('fonts/gothic.ttf'); //đường dẫn font chữ trong public
        $name = $request->name?$request->name:'captchacode'; //lấy tên session từ request, mặc định là captchacode
        $length = $request->length?$request->length:'5'; //số ký tự lấy từ request, mặc định là 5
        $width = $request->width?$request->width:'100'; //chiều rộng hình lấy từ request, mặc định là 160
        $height = $request->height?$request->height:'30'; //chiều cao hình lấy từ request, mặc định là 40
        $code = $this->generateCode($length); //Hàm lấy ngẫu nhiên theo số ký tự
        $font_size = $height * 0.75;
        $image = imagecreate($width, $height) or die('Cannot initialize new GD image stream');
        $background_color = imagecolorallocate($image, 255, 255, 255);
        $text_color = imagecolorallocate($image, 37, 138, 30);
        $noise_color = imagecolorallocate($image, 255, 255, 255);
        $line_color = imagecolorallocate($image, 125, 145, 122);        
        for( $i=0; $i<($width*$height)/3; $i++ ) {
            imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
        }
        for( $i=0; $i<($width*$height)/150; $i++ ) {
            imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
        }
        for( $i=0; $i<3; $i++ ) {
            imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $line_color);
        }
        $textbox = imagettfbbox($font_size, 0, $font, $code);
        $x = ($width - $textbox[4])/2;
        $y = ($height - $textbox[5])/2;
        imagettftext($image, $font_size, 0, $x, $y, $text_color, $font , $code);
        ob_start();
        header('Content-Type: image/jpeg');
        imagejpeg($image);
        imagedestroy($image);
        $image_data = ob_get_contents();
        ob_end_clean();
        Session::put($name, $code); //Lưu session mã captcha để kiểm tra khi submit
        return Response::make($image_data, 200, ['Content-Type' => 'image/jpeg']);
    }
     
    public function GenerateCode($str)
    {
        $possible = '123456789'; //Danh sách các chữ cái được lấy ngẫu nhiên
        $code = '';
        $i = 0;
        while ($i < $str) { 
            $code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
            $i++;
        }
        return $code;
    }    
}
