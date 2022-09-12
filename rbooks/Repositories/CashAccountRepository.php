<?php

namespace RBooks\Repositories;

use RBooks\Models\CashAccount;

class CashAccountRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'accountno',
        'accountname',        
        'accountdate',
        'amount',
    ];

    protected $modelName = CashAccount::class;
}
