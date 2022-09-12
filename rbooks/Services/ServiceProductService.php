<?php

namespace RBooks\Services;

use RBooks\Repositories\ServiceProductRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use RBooks\Models\ServiceProduct;

class ServiceProductService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(ServiceProductRepository::class);
    }

    public function getListServiceProduct($active)
    {
        $search = array('active'=>$active);
        $listData = $this->repository->findWhere($search)->sortBy('orderproduct');

        return $listData;    
    } 

    public function getServiceProductFromId($id, $active)
    {
        $search = array('id'=>$id, 'active'=>$active);
        $listData = $this->repository->findWhere($search);

        return $listData;    
    }  
       
}
