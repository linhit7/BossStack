<?php

namespace RBooks\Repositories;

use RBooks\Models\OperationLog;

class OperationLogRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id',
        'logtype',
        'event',
    ];

    protected $modelName = OperationLog::class;
}
