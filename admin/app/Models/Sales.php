<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Sales",
 *      required={"sales_name"},
 *      @SWG\Property(
 *          property="sales_id",
 *          description="sales_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sales_name",
 *          description="sales_name",
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
class Sales extends Model
{
    use SoftDeletes;

    public $table = 'sales';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'sales_id';

    public $fillable = [
        'sales_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sales_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sales_name' => 'required'
    ];

    
}
