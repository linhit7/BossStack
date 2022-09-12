<?php

namespace RBooks\Services;

use RBooks\Repositories\CostRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class PayDebtService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(CostRepository::class);
    }

    public function create($request)
    {

    }

    public function update($request, $id)
    {

    }

    public function getSortPage($field = 'id', $order = 'desc', $limit = null, $columns = ['*'])
    {
        $repository = $this->getRepository();
        return $repository->orderBy($field, $order)->paginate($limit, $columns);
    }
}
