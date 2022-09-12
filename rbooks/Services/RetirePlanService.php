<?php

namespace RBooks\Services;

use RBooks\Repositories\RetirePlanRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\RetirePlan;
use RBooks\Repositories\CashAccountRepository;

class RetirePlanService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(RetirePlanRepository::class);
    }


}
