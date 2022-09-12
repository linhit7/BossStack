<?php

namespace RBooks\Models;

class Contract extends BaseModel
{
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $fillable = [
        'customer_id','contractno','contractcode','contractdate','contractstatustype','currency','term','termtype','lastcontractdate','discount','amount','personalcashflow','invest','saving','financial','service_product_id','service_product_code','service_product_name','service_product_price','payment','paymentmethod','description','finish','finishdate','officer_user_id','approved','approved_user_id','approved_at','approvestatustype','created_user_id','created_at','updated_user_id','updated_at'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
