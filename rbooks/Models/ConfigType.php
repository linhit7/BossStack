<?php

namespace RBooks\Models;

class ConfigType extends BaseModel
{
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $fillable = [
        'code','name','type','order'
    ];

    public function cashincome()
    {
        return $this->hasMany(CashIncome::class);
    }    

}
