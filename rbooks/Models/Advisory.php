<?php

namespace RBooks\Models;

class Advisory extends BaseModel
{
    protected $forceDeleting = true;

    protected $table = "advisorys";

    protected $fillable = ['fullname', 'email', 'phone', 'titleadvisory', 'contentadvisory', 'priority', 'type', 'status', 'created_user_id', 'created_at', 'updated_user_id'];

    public function advisoryAnswer()
    {
    	return $this->hasOne(AdvisoryAnswer::class, 'advisory_id');
    }
}
