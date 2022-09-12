<?php

namespace RBooks\Services;

use \Auth;
use \DB;
use RBooks\Models\ConfigType;
use RBooks\Repositories\ConfigTypeDetailLevelRepository;

class ConfigTypeDetailLevelService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(ConfigTypeDetailLevelRepository::class);
    }



}
