<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class customers
 * @package App\Models
 * @version January 17, 2017, 3:14 am UTC
 */
class customers extends Model
{
    use SoftDeletes;

    public $table = 'customers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'customerCode',
        'customerName',
        'contactPerson',
        'address',
        'address2',
        'village',
        'district',
        'city',
        'zipCode',
        'province',
        'phone',
        'fax',
        'phonecp1',
        'phonecp2',
        'email',
        'note',
        'npwp',
        'pkpName',
        'category',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'customerCode' => 'string',
        'customerName' => 'string',
        'contactPerson' => 'string',
        'address' => 'string',
        'address2' => 'string',
        'village' => 'string',
        'district' => 'string',
        'city' => 'string',
        'zipCode' => 'integer',
        'province' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'phonecp1' => 'string',
        'phonecp2' => 'string',
        'email' => 'string',
        'note' => 'string',
        'npwp' => 'string',
        'pkpName' => 'string',
        'category' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customerCode' => 'required',
        'customerName' => 'required',
        'contactPerson' => 'required',
        'address' => 'required',
        'address2' => 'min:5',
        'village' => 'required',
        'district' => 'required',
        'city' => 'required',
        'zipCode' => 'numeric',
        'province' => 'required',
        'phone' => 'required',
        'fax' => 'required',
        'phonecp1' => 'required',
        'phonecp2' => 'required',
        'email' => 'email',
        'note' => 'min:4',
        'npwp' => 'required',
        'pkpName' => 'required',
        'category' => 'required',
        'status' => 'required'
    ];

    
}
