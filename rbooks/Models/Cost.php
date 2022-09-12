<?php

namespace RBooks\Models;

class Cost extends BaseModel
{
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $table = "tc_costs";

    protected $fillable = ['costcode', 'costdate', 'costprice', 'methodpayment', 'content', 'note', 'status', 'cashierid', 'created_user_id', 'updated_user_id'];

    public function cashier()
    {
    	return $this->belongsTo(User::class, 'cashierid');
    }
}
