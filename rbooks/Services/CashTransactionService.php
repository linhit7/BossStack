<?php

namespace RBooks\Services;

use RBooks\Repositories\CashTransactionRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\CashTransaction;

class CashTransactionService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CashTransactionRepository::class);
    }

    public function create($request)
    {

    }

    public function update($request, $id)
    {

    }

}
