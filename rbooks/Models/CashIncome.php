<?php

namespace RBooks\Models;

class CashIncome extends BaseModel
{
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $fillable = [
        'customer_id','incomename','incometype','incometypedetail','incometypedetaillevel','cashasset_id','incomedate','incomestatustype','cashaccount_id','accountno','currency','amount','description','document','created_user_id','created_at','updated_user_id','updated_at'
    ];

    public function configType()
    {
        return $this->belongsTo(ConfigType::class, 'config_type_id');
    }          

    public function configTypeDetail()
    {
        return $this->belongsTo(ConfigTypeDetail::class, 'config_type_detail_id');
    }          

}
