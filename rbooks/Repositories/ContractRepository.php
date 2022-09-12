<?php

namespace RBooks\Repositories;

use RBooks\Models\Contract;

class ContractRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'contractno',
        'contractdate',
        'term',
    ];

    protected $modelName = Contract::class;
}
