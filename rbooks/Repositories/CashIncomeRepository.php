<?php

namespace RBooks\Repositories;

use RBooks\Models\CashIncome;

class CashIncomeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'incomename',
        'incomedate',
        'amount',
    ];

    protected $modelName = CashIncome::class;
}
