<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class salespayments
 * @package App\Models
 * @version January 17, 2017, 2:56 am UTC
 */
class salespayments extends Model
{
    use SoftDeletes;

    public $table = 'salespayments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'paymentNo',
        'invoiceID',
        'paymentDate',
        'payType',
        'bankNo',
        'bankName',
        'bankAC',
        'effectiveDate',
        'total',
        'customerID',
        'customerName',
        'customerAddress',
        'ref',
        'note',
        'staffID',
        'staffName',
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
        'paymentNo' => 'string',
        'invoiceID' => 'integer',
        'paymentDate' => 'date',
        'payType' => 'string',
        'bankNo' => 'string',
        'bankName' => 'string',
        'bankAC' => 'string',
        'effectiveDate' => 'date',
        'total' => 'integer',
        'customerID' => 'integer',
        'customerName' => 'string',
        'customerAddress' => 'string',
        'ref' => 'string',
        'note' => 'string',
        'staffID' => 'integer',
        'staffName' => 'string',
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
        'paymentNo' => 'required',
        'invoiceID' => 'numeric',
        'paymentDate' => 'date',
        'payType' => 'required',
        'bankNo' => 'required',
        'bankName' => 'required',
        'bankAC' => 'required',
        'effectiveDate' => 'date',
        'total' => 'numeric',
        'customerID' => 'numeric',
        'customerName' => 'required',
        'customerAddress' => 'min:5',
        'ref' => 'required',
        'note' => 'min:5',
        'staffID' => 'numeric',
        'staffName' => 'required',
        'createdDate' => 'date',
        'createdUserID' => 'numeric',
        'modifiedDate' => 'date',
        'modifiedUserID' => 'numeric'
    ];

    
}
