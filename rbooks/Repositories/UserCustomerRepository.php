<?php

namespace RBooks\Repositories;

use RBooks\Models\UserCustomer;

class UserCustomerRepository extends BaseRepository
{
    protected $modelName = UserCustomer::class;

    protected $fieldSearchable = [
        'id',
        'name',
        'email'
    ];
}
