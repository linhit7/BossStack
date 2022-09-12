<?php

namespace RBooks\Models;

class CashAsset extends BaseModel
{
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $fillable = [
        'customer_id','assetname','assettype','assettypedetail','assetdate','assetstatustype','cashaccount_id','accountno','currency','amount','remainamount','description','document','created_user_id','created_at','updated_user_id','updated_at'
    ];


}
