<?php

namespace RBooks\Models;

class Customer extends BaseModel
{
    /**
     * Fillabled array for mass asign
     *
     * @var array
     */
    protected $fillable = [
        'user_id','customercode','avatar','fullname','birthday','gender','maritalstatus','address','phone','email','contactname','contactphone','introduction_facebook','introduction_email','introduction_user','introduction_orther','fathername','fatherbirthday','fatherwork','fatherdependentperson','mothername','motherbirthday','motherwork','motherdependentperson','familyname','familybirthday','familywork','childrenname','customertype','personalcashflow','invest','saving','financial','customerstatustype','officer_user_id','approved','approved_user_id','approved_at','approvestatustype','created_user_id','created_at','updated_user_id','updated_at'
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function userCustomer()
    {
        return $this->belongsTo(UserCustomer::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }          
}
