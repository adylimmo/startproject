<?php

namespace App\Repositories;

use App\Models\Sales;
use InfyOm\Generator\Common\BaseRepository;

class SalesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sales_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sales::class;
    }
}
