<?php

namespace RBooks\Services;

use RBooks\Repositories\CouponRepository;
use RBooks\Repositories\CouponCustomerRepository;
use \Auth;
use \DB;
use Illuminate\Support\Facades\Mail;

class CouponService extends BaseService
{
    public function __construct()
    {
        $this->repository = app(CouponRepository::class);
    }

    public function create($request)
    {
        $data = [
            'key' => $request->key,
            'typecoupon' => $request->typecoupon,
            'percent' => $request->percent,
            'quantity' => $request->quantity,
            'quantitied' => $request->quantity,
            'description' => $request->description,
            'status' => 0
        ];

        $coupon = $this->repository->create($data);

        return $coupon;
    }

    public function update($request, $id)
    {
        $data = [
            'key' => $request->key,
            'typecoupon' => $request->typecoupon,
            'percent' => $request->percent,
            'quantity' => $request->quantity,
            'quantitied' => $request->quantitied,
            'description' => $request->description,
            'status' => $request->status
        ];

        $coupon = $this->repository->update($data, $id);

        return $coupon;
    }

    public function sendMail($request, $id)
    {
        DB::beginTransaction();
        try {

            $coupon = app(CouponService::class)->find($id)->first();
            $key = $coupon->key;

            $email = $request->email;
            $quantitied = $request->quantitied - 1;            
            $data = [
                'quantitied' => $quantitied,
            ];
            $coupon = $this->repository->update($data, $id);
    
            $dataCouponCustomer = [
                'coupon_id' => $id,
                'key' => $key,
                'email' => $email,
            ];
            $retCouponCustomer = app(CouponCustomerRepository::class)->create($dataCouponCustomer);

            //Gui mail thong bao coupon
            if ($email != ""){
                $coupon_customer_id = $retCouponCustomer->id;
                $this->sendMailCoupon($email, $key, $coupon_customer_id);
            }
                
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return $coupon;
    }

    public function sendMailCoupon($email, $key, $coupon_customer_id)
    {

        $url = config('app.urlhost');
        $activeUrl = "$url/activeCoupon/$coupon_customer_id/$key";

        Mail::send('mail.coupon', ['email' => $email, 'key' => $key, 'activeUrl' => $activeUrl], function ($message) use ($email, $key, $activeUrl) {
            $message->from('infor@dongtiencanhan.com', 'BSP Ecommerce');
            $message->to($email)->subject('Email thong bao ma khuyen mai - BSP Ecommerce');
        });

        $ret = 1;
        if (Mail::failures()) {
            $ret = 0;
        }

        return $ret;
    }
        
    /**
     * getListUserBySearch
     * Lay danh sach user
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getListCouponBySearch($searchField, $searchValue)
    {
        $listData = DB::table('coupons')
                        ->select('id','key', 'typecoupon', 'percent', 'quantity', 'quantitied', 'description', 'status')
                        ->where('coupons.deleted_at', '=', null)
                        ->where('key', 'like', "%$searchValue%")
                        ->where('status', 'like', "%$searchField%");
                        
        return $listData;    
    } 

    /**
     * getListUserBySearch
     * Lay danh sach user
     * 
     * @author  linh
     * @return  string
     * @access  public
     * @date    03 14, 2020 5:18:52 PM
     */
    public function getCouponBySearch($searchField, $searchValue)
    {
        $listData = DB::table('coupons')
                        ->select('id','key', 'typecoupon', 'percent', 'quantity', 'quantitied', 'description', 'status')
                        ->where('coupons.deleted_at', '=', null)
                        ->where('key', '=', "$searchValue")
                        ->where('status', '=', "$searchField");
                        
        return $listData;    
    } 

}

