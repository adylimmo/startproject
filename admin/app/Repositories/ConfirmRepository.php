<?php

namespace App\Repositories;

use App\Models\Confirm;
use InfyOm\Generator\Common\BaseRepository;

class ConfirmRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer_id',
        'assignment_id',
        'confirmation'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Confirm::class;
    }
}
