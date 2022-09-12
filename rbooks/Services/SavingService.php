<?php

namespace RBooks\Services;

use RBooks\Repositories\SavingRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\Saving;

class SavingService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(SavingRepository::class);
    }

    public function create($request)
    {


        return $this->repository->create($data);
    }

    public function update($request, $id)
    {


        return $this->repository->update($data, $id);
    }

}
