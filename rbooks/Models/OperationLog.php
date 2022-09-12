<?php

namespace RBooks\Models;

class OperationLog extends BaseModel
{

    protected $table = 'operation_logs';

    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $fillable = [
        'user_id','logtype','event','description','logresult','created_user_id','created_at','updated_user_id','updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    
}
