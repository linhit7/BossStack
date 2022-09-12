<?php

namespace RBooks\Services;

use \Auth;
use \DB;
use RBooks\Models\ConfigType;
use RBooks\Repositories\ConfigTypeRepository;
use RBooks\Repositories\ConfigTypeDetailRepository;
use RBooks\Repositories\ConfigTypeDetailLevelRepository;

class ConfigTypeService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(ConfigTypeRepository::class);
    }

    public function getConfigTypeFromType($type_id)
    {
        $search = array('type'=>$type_id);
        $listData = app(ConfigTypeRepository::class)->findWhere($search);

        return $listData;    
    }

    public function getConfigTypeFromId($id)
    {
        $search = array('id'=>$id);
        $listData = app(ConfigTypeRepository::class)->findWhere($search);

        return $listData;    
    }

    public function getConfigTypeDetailFromId($configtype_id)
    {
        $search = array('config_type_id'=>$configtype_id);
        $listData = app(ConfigTypeDetailRepository::class)->findWhere($search);

        return $listData;    
    }

    public function getConfigTypeDetailLevel1FromId($configtypedetail_id)
    {
        $search = array('config_type_detail_id'=>$configtypedetail_id);
        $listData = app(ConfigTypeDetailLevelRepository::class)->findWhere($search);

        return $listData;    
    }

}
