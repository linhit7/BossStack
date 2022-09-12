<?php

namespace RBooks\Services;

use RBooks\Repositories\RevenueRepository;
use \Auth;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class RevenueService extends BaseService
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->repository = app(RevenueRepository::class);
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
            'vat' => $request->vat,
            'revenue_vat' => $request->revenue_vat,
            'revenue_notvat' => $request->revenue_notvat,
            'dathu_vat' => $request->dathu_vat,
            'dathu_notvat' => $request->dathu_notvat,
            'conlai_vat' => $request->conlai_vat,
            'conlai_notvat' => $request->conlai_notvat,
            'content' => $request->content,
            'note' => $request->note,
            'status' => $request->status,
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
            'vat' => $request->vat,
            'revenue_vat' => $request->revenue_vat,
            'revenue_notvat' => $request->revenue_notvat,
            'dathu_vat' => $request->dathu_vat,
            'dathu_notvat' => $request->dathu_notvat,
            'conlai_vat' => $request->conlai_vat,
            'conlai_notvat' => $request->conlai_notvat,
            'content' => $request->content,
            'note' => $request->note,
            'status' => $request->status,
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
