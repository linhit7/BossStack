<?php

namespace RBooks\Services;

use RBooks\Repositories\ManageTransactionRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\ManageTransaction;

class ManageTransactionService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(ManageTransactionRepository::class);
    }

           

}
