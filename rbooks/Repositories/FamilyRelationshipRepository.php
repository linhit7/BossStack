<?php

namespace RBooks\Repositories;

use RBooks\Models\FamilyRelationship;

class FamilyRelationshipRepository extends BaseRepository
{
    protected $fieldSearchable = [
    	'customer_id',
        'relation',
        'fullname',
    ];

    protected $modelName = FamilyRelationship::class;
}