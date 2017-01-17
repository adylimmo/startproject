<?php

namespace App\Repositories;

use App\Models\salesinvoice;
use InfyOm\Generator\Common\BaseRepository;

class salesinvoiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'invoiceNo',
        'invoiceDate',
        'soID',
        'status',
        'paymentType',
        'expiredPayment',
        'ppn',
        'total',
        'discount',
        'grandtotal',
        'customerID',
        'customerName',
        'customerAddress',
        'staffID',
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
        return salesinvoice::class;
    }
}
