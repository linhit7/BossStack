<?php

namespace RBooks\Services;

use RBooks\Repositories\FamilyRelationshipRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use RBooks\Models\Customer;
use Illuminate\Support\Facades\Crypt;

class FamilyRelationshipService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(FamilyRelationshipRepository::class);
    }

    public function createFamilyRelationship($request, $id)
    {
        $customer_id = $id;
        $relation = quote_smart($request->relation);
        $fullname = quote_smart($request->fullname);
        $birthday = ($request->birthday==""?quote_smart(""):quote_smart(FormatDateForSQL($request->birthday)));
        $address = quote_smart($request->address);
        $phone = quote_smart($request->phone);
        $work = quote_smart($request->work);
        $dependent = quote_smart($request->dependent);        
        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'customer_id' => $customer_id,
            'relation' => $relation,
            'fullname' => $fullname,
            'birthday' => $birthday,
            'address' => $address,
            'phone' => $phone,
            'work' => $work,
            'dependent' => $dependent,
            'created_user_id' => $created_user_id,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->create($data);
    }

    public function updateFamilyRelationship($request, $id)
    {
        $relation = quote_smart($request->relation);
        $fullname = quote_smart($request->fullname);
        $birthday = ($request->birthday==""?quote_smart(""):quote_smart(FormatDateForSQL($request->birthday)));
        $address = quote_smart($request->address);
        $phone = quote_smart($request->phone);
        $work = quote_smart($request->work);
        $dependent = quote_smart($request->dependent);
        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'relation' => $relation,
            'fullname' => $fullname,            
            'birthday' => $birthday,
            'address' => $address,
            'phone' => $phone,
            'work' => $work,
            'dependent' => $dependent,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->update($data, $id);
    }

       
    public function getListFamilyRelationshipFromCustomerId($customer_id)
    {
        $search = array('customer_id'=>$customer_id);
        $listData = $this->repository->findWhere($search);

        return $listData;    
    }    
}
