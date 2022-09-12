<?php

namespace RBooks\Repositories;

use RBooks\Models\CashTransaction;

class CashTransactionRepository extends BaseRepository
{
    protected $fieldSearchable = [
    ];

    protected $modelName = CashTransaction::class;
}
