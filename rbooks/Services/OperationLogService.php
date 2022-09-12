<?php

namespace RBooks\Services;

use RBooks\Repositories\OperationLogRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use RBooks\Models\OperationLog;

class OperationLogService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(OperationLogRepository::class);
    }
    
    public function createOperationLog($user_id, $logtype, $event, $description, $logresult)
    {

        $created_user_id = quote_smart(Auth()->user()->id);
        $updated_user_id = quote_smart(Auth()->user()->id);

        $data = [
            'user_id' => $user_id,
            'logtype' => $logtype,
            'event' => $event,
            'description' => $description,
            'logresult' => $logresult,
            'created_user_id' => $created_user_id,
            'updated_user_id' => $updated_user_id,
        ];

        return $this->repository->create($data);
    }

    public function getListOperationLog($user_id)
    {
        $listData = app(OperationLog::class)->where('user_id', '=', $user_id)->orderByDesc('created_at');
        return $listData;    
    }
}
