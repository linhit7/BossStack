<?php

namespace RBooks\Models;

class CashTransaction extends BaseModel
{
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $fillable = [
        'customer_id','accountno','incomestatus','incomestatustype','incometype','content','transactiondate','amount','description','created_user_id','created_at','updated_user_id','updated_at'
    ];


}
