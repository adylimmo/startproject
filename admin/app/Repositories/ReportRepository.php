<?php

namespace App\Repositories;

use App\Models\Report;
use InfyOm\Generator\Common\BaseRepository;

class ReportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'assigment_id',
        'task_id',
        'ativity_id',
        'report_title'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Report::class;
    }
}
