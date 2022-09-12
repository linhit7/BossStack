<?php

namespace RBooks\Models;

class Report extends BaseModel
{
    protected $table = 'coachings';
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $fillable = [
        'registerdate', 'course', 'fullname', 'email', 'phone' , 'address', 'title', 'content', 'created_user_id', 'created_at', 'updated_user_id', 'updated_at' 
    ];


}
