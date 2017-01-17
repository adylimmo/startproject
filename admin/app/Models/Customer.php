<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Customer",
 *      required={"customer_name"},
 *      @SWG\Property(
 *          property="customer_id",
 *          description="customer_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="customer_name",
 *          description="customer_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="customer_address",
 *          description="customer_address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="geolocation_lat",
 *          description="geolocation_lat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="geolocation_lng",
 *          description="geolocation_lng",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Customer extends Model
{
    use SoftDeletes;

    public $table = 'customers';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'customer_id';

    public $fillable = [
        'customer_name',
        'customer_address',
        'geolocation_lat',
        'geolocation_lng'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'customer_name' => 'string',
        'customer_address' => 'string',
        'geolocation_lat' => 'string',
        'geolocation_lng' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_name' => 'required'
    ];

    
}
