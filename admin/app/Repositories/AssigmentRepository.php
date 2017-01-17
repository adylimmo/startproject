<?php

namespace App\Repositories;

use App\Models\Assigment;
use InfyOm\Generator\Common\BaseRepository;

class AssigmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'assigment_date',
        'task_id',
        'sales_id',
        'customer_id',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Assigment::class;
    }
}
