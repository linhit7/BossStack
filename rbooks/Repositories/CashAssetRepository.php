<?php

namespace RBooks\Repositories;

use RBooks\Models\CashAsset;

class CashAssetRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'assetname',
        'assetdate',
        'amount',
    ];

    protected $modelName = CashAsset::class;
}
