<?php

namespace App\Repositories;

use App\Models\Tracking;
use InfyOm\Generator\Common\BaseRepository;

class TrackingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sales_id',
        'geolocation_lat',
        'geolocation_lng'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tracking::class;
    }
}
