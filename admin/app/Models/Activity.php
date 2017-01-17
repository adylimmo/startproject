<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Activity",
 *      required={"activity_title", "type_report", "task_id"},
 *      @SWG\Property(
 *          property="activity_id",
 *          description="activity_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="activity_title",
 *          description="activity_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="activity_description",
 *          description="activity_description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="type_report",
 *          description="type_report",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="task_id",
 *          description="task_id",
 *          type="integer",
 *          format="int32"
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
class Activity extends Model
{
    use SoftDeletes;

    public $table = 'activities';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'activity_id';

    public $fillable = [
        'activity_title',
        'activity_description',
        'type_report',
        'task_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'activity_title' => 'string',
        'activity_description' => 'string',
        'type_report' => 'string',
        'task_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'activity_title' => 'required',
        'type_report' => 'required',
        'task_id' => 'required'
    ];

    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'task_id', 'task_id');
    }
}
