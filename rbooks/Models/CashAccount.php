<?php

namespace RBooks\Models;

class CashAccount extends BaseModel
{
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $forceDeleting = true;
         
    protected $fillable = [
        'customer_id','accountno','accountname','accountdate','accountstatustype','currency','amount','description','finish','finishdate','created_user_id','created_at','updated_user_id','updated_at'
    ];


}
