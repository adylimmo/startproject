<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class products
 * @package App\Models
 * @version January 17, 2017, 8:02 am UTC
 */
class products extends Model
{
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'productCode' => 'string',
        'productName' => 'string',
        'unit' => 'integer',
        'note' => 'string',
        'stock' => 'integer',
        'image' => 'string',
        'status' => 'integer',
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
        'productCode' => 'required',
        'productName' => 'required',
        'note' => 'min:4',
        'stock' => 'numeric',
        'image' => 'file',
        'createdDate' => 'date',
        'createdUserID' => 'numeric',
        'modifiedDate' => 'date',
        'modifiedUserID' => 'numeric'
    ];

    
}
