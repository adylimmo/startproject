<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Assigment",
 *      required={"assigment_date", "task_id", "customer_id"},
 *      @SWG\Property(
 *          property="assigment_id",
 *          description="assigment_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="assigment_date",
 *          description="assigment_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="task_id",
 *          description="task_id",
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
 *          property="customer_id",
 *          description="customer_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
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
class Assigment extends Model
{
    use SoftDeletes;

    public $table = 'assigments';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'assigment_id';

    protected $attributes = array(
        'status' => 'ready'
    );

    public $fillable = [
        'assigment_date',
        'task_id',
        'sales_id',
        'customer_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'assigment_date' => 'date',
        'task_id' => 'integer',
        'sales_id' => 'integer',
        'customer_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'assigment_date' => 'required',
        'task_id' => 'required',
        'customer_id' => 'required'
    ];

    public function sales()
    {
        return $this->belongsTo('App\Models\Sales', 'sales_id', 'sales_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'customer_id');
    }

    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'task_id', 'task_id');
    }
}
