<?php

namespace RBooks\Repositories;

use RBooks\Models\AdvisoryAnswer;

class AdvisoryAnswerRepository extends BaseRepository
{
    protected $modelName = AdvisoryAnswer::class;

    protected $fieldSearchable = [
        'id',
        'advisory_id',
        'answer_id'
    ];
}
