<?php

namespace RBooks\Models;

class CashPlanDetail extends BaseModel
{
    protected $forceDeleting = true;
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $fillable = [
        'cash_plans_id','plandate','planamount','planamount_total','realamount','realamount_total','created_user_id','created_at','updated_user_id','updated_at'
    ];


}
