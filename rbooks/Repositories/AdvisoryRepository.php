<?php

namespace RBooks\Repositories;

use RBooks\Models\Advisory;
use RBooks\Criteria\AdvisoryFilterByStatusCriteria;

class AdvisoryRepository extends BaseRepository
{
    protected $modelName = Advisory::class;

    protected $fieldSearchable = [
        'fullname' => 'like',
        'email' => 'like',
    ];
    protected $criterias = [
        AdvisoryFilterByStatusCriteria::class,
    ];
}
