<?php

namespace RBooks\Repositories;

use RBooks\Models\CashPlanDetail;

class CashPlanDetailRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'plandate',
        'planamount',
        'planamount_total',
    ];

    protected $modelName = CashPlanDetail::class;
}
