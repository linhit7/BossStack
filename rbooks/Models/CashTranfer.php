<?php

namespace RBooks\Models;

class CashTranfer extends BaseModel
{
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $fillable = [
        'customer_id','tranferdate','cashaccount_id_send','accountno_send','cashaccount_id_receive','accountno_receive','currency','amount','description','created_user_id','created_at','updated_user_id','updated_at'
    ];


}
