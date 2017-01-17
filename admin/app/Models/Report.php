<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Report",
 *      required={"assigment_id", "task_id", "ativity_id"},
 *      @SWG\Property(
 *          property="report_id",
 *          description="report_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="assigment_id",
 *          description="assigment_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="task_id",
 *          description="task_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ativity_id",
 *          description="ativity_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="report_title",
 *          description="report_title",
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
class Report extends Model
{
    use SoftDeletes;

    public $table = 'reports';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'report_id';

    public $fillable = [
        'assigment_id',
        'task_id',
        'ativity_id',
        'report_title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'assigment_id' => 'integer',
        'task_id' => 'integer',
        'ativity_id' => 'integer',
        'report_title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'assigment_id' => 'required',
        'task_id' => 'required',
        'ativity_id' => 'required'
    ];

    public function assigment()
    {
        return $this->belongsTo('App\Models\Assigment', 'assigment_id', 'assigment_id');
    }

    public function sales()
    {
        return $this->belongsTo('App\Models\Sales', 'sales_id', 'sales_id');
    }

    public function activity()
    {
        return $this->belongsTo('App\Models\Activity', 'ativity_id', 'activity_id');
    }

    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'task_id', 'task_id');
    }

    
}
