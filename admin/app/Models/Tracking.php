<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Tracking",
 *      required={"sales_id", "geolocation_lat", "geolocation_lng"},
 *      @SWG\Property(
 *          property="tracking_id",
 *          description="tracking_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sales_id",
 *          description="sales_id",
 *          type="integer",
 *          format="int32"
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
class Tracking extends Model
{
    use SoftDeletes;

    public $table = 'trackings';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'tracking_id';

    public $fillable = [
        'sales_id',
        'geolocation_lat',
        'geolocation_lng'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sales_id' => 'integer',
        'geolocation_lat' => 'string',
        'geolocation_lng' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sales_id' => 'required',
        'geolocation_lat' => 'required',
        'geolocation_lng' => 'required'
    ];

    public function sales()
    {
        return $this->belongsTo('App\Models\Sales');
    }
    
}
