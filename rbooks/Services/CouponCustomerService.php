<?php

namespace RBooks\Services;

use RBooks\Repositories\CouponCustomerRepository;
use \Auth;
use \DB;

class CouponCustomerService extends BaseService
{
    public function __construct()
    {
        $this->repository = app(CouponCustomerRepository::class);
    }

    public function create($request)
    {
        $data = [
            'coupon_id' => $request->coupon_id,
            'key' => $request->key,
            'email' => $request->email,
            'active' => 0,
        ];

        $coupon = $this->repository->create($data);

        return $coupon;
    }

    public function update($request, $id)
    {
        $data = [
            'coupon_id' => $request->coupon_id,
            'key' => $request->key,
            'email' => $request->email,
            'active' => 0,
        ];

        $coupon = $this->repository->update($data, $id);

        return $coupon;
    }

    public function updateActive($active, $id)
    {
        $data = [
            'active' => 1,
        ];

        $coupon = $this->repository->update($data, $id);

        return $coupon;
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
    public function getCouponCustomerBySearch($id, $key)
    {
        $listData = DB::table('coupon_customer')
                        ->select('id', 'coupon_id', 'key', 'email', 'active')
                        ->where('deleted_at', '=', null)
                        ->where('id', '=', "$id")
                        ->where('key', '=', "$key");
                        
        return $listData;    
    } 
}

