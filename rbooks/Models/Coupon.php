<?php

namespace RBooks\Models;

class Coupon extends BaseModel
{
    protected $table = "coupons";

    protected $fillable = ['key', 'typecoupon', 'percent', 'quantity', 'quantitied', 'description', 'status'];


}
