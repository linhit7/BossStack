<?php

namespace RBooks\Services;

use \Auth;
use \DB;
use RBooks\Models\ConfigType;
use RBooks\Repositories\ConfigTypeDetailRepository;

class ConfigTypeDetailService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(ConfigTypeDetailRepository::class);
    }



}
