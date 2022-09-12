<?php

namespace RBooks\Models;

class Invest extends BaseModel
{

    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'newsdate', 'newstype', 'newstitle', 'newsimage' , 'shortcontent', 'content', 'newsorder', 'author', 'created_user_id', 'created_at', 'updated_user_id', 'updated_at' 
    ];



}
