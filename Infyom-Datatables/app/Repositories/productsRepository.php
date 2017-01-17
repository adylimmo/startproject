<?php

namespace App\Repositories;

use App\Models\products;
use InfyOm\Generator\Common\BaseRepository;

class productsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'productCode',
        'productName',
        'unit',
        'note',
        'stock',
        'image',
        'status',
        'createdDate',
        'createdUserID',
        'modifiedDate',
        'modifiedUserID'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return products::class;
    }
}
