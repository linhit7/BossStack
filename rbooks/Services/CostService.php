<?php

namespace RBooks\Services;

use RBooks\Repositories\CostRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class CostService extends BaseService
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
        $data = [
            'revenuesourcesid' => $request->revenuesourcesid,
            'customerid' => $request->customerid,
            'cashierid' => $request->cashierid,
            'revenuecode' => $request->revenuecode,
            'revenuedate' => $request->revenuedate,
            'methodpayment' => $request->methodpayment,
            'content' => $request->content,
            'status' => $request->status,
            'note' => $request->note,
            'created_user_id' => Auth::user()->id,
            'updated_user_id' => Auth::user()->id, 
        ];
        return $this->repository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'revenuesourcesid' => $request->revenuesourcesid,
            'customerid' => $request->customerid,
            'cashierid' => $request->cashierid,
            'revenuecode' => $request->revenuecode,
            'revenuedate' => $request->revenuedate,
            'methodpayment' => $request->methodpayment,
            'content' => $request->content,
            'status' => $request->status,
            'note' => $request->note,
            'updated_user_id' => Auth::user()->id,
        ];
        return $this->repository->update($data, $id);
    }

    public function getSortPage($field = 'id', $order = 'desc', $limit = null, $columns = ['*'])
    {
        $repository = $this->getRepository();
        return $repository->orderBy($field, $order)->paginate($limit, $columns);
    }
}
