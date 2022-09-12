<?php

namespace RBooks\Models;

class FamilyRelationship extends BaseModel
{
    protected $table = "familyrelationships"; // Mối quan hệ nhân thân

    protected $fillable = ['customer_id', 'relation', 'fullname', 'birthday', 'address', 'phone', 'work', 'dependent', 'created_user_id', 'updated_user_id'];

    protected $forceDeleting = true;
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
