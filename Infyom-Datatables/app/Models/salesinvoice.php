<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class salesinvoice
 * @package App\Models
 * @version January 17, 2017, 6:55 am UTC
 */
class salesinvoice extends Model
{
    use SoftDeletes;

    public $table = 'salesinvoices';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'invoiceNo' => 'string',
        'invoiceDate' => 'date',
        'soID' => 'integer',
        'status' => 'integer',
        'paymentType' => 'integer',
        'expiredPayment' => 'date',
        'ppn' => 'integer',
        'total' => 'double',
        'discount' => 'double',
        'grandtotal' => 'double',
        'customerID' => 'integer',
        'customerName' => 'string',
        'customerAddress' => 'string',
        'staffID' => 'integer',
        'createdDate' => 'date',
        'createdUserID' => 'integer',
        'modifiedDate' => 'date',
        'modifiedUserID' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'invoiceNo' => 'required',
        'invoiceDate' => 'date',
        'soID' => 'numeric',
        'expiredPayment' => 'date',
        'ppn' => 'numeric',
        'total' => 'numeric',
        'discount' => 'numeric',
        'customerID' => 'numeric',
        'customerName' => 'required',
        'customerAddress' => 'min:3',
        'staffID' => 'numeric',
        'createdDate' => 'date',
        'createdUserID' => 'numeric',
        'modifiedDate' => 'date',
        'modifiedUserID' => 'numeric'
    ];

    
}
