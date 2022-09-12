<?php

namespace RBooks\Repositories;

use RBooks\Models\CashPlan;

class CashPlanRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'incomename',
        'incomedate',
        'amount',
    ];

    protected $modelName = CashPlan::class;
}
