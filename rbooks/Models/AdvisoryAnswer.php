<?php

namespace RBooks\Models;

class AdvisoryAnswer extends BaseModel
{
    protected $forceDeleting = true;

    protected $table = "advisory_answers";

    protected $fillable = ['advisory_id', 'answer_id', 'title', 'content', 'created_user_id', 'updated_user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'answer_id');
    }
}
