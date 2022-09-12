<?php

namespace RBooks\Models;

class Revenue extends BaseModel
{
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $table = "tc_revenues";

    protected $fillable = ['revenuesourcesid', 'customerid', 'cashierid', 'vat', 'revenue_vat', 'revenue_notvat', 'dathu_vat', 'dathu_notvat', 'conlai_vat', 'conlai_notvat', 'revenuecode', 'revenuedate', 'methodpayment', 'content', 'note', 'status', 'created_user_id', 'updated_user_id'];

    public function customer()
    {
    	return $this->belongsTo(Customer::class, 'customerid');
    }

    public function cashier()
    {
    	return $this->belongsTo(User::class, 'cashierid');
    }
}
