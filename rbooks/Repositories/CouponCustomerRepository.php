<?php

namespace RBooks\Repositories;

use RBooks\Models\CouponCustomer;

class CouponCustomerRepository extends BaseRepository
{
    protected $fieldSearchable = ['key', 'email'];

    protected $modelName = CouponCustomer::class;
}