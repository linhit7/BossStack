<?php

namespace RBooks\Services;

use RBooks\Repositories\CareerRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use RBooks\Models\Cash;

class CareerService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CareerRepository::class);
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
