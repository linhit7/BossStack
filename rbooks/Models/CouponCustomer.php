<?php

namespace RBooks\Models;

class CouponCustomer extends BaseModel
{
    protected $table = "coupon_customer";

    protected $fillable = ['coupon_id', 'key', 'email', 'active'];


}
