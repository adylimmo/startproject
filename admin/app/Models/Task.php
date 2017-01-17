<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Task",
 *      required={"task_title"},
 *      @SWG\Property(
 *          property="task_id",
 *          description="task_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="task_title",
 *          description="task_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="task_description",
 *          description="task_description",
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
class Task extends Model
{
    use SoftDeletes;

    public $table = 'tasks';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'task_id';

    public $fillable = [
        'task_title',
        'task_description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'task_title' => 'string',
        'task_description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'task_title' => 'required'
    ];

    public function activities()
    {
        return $this->hasMany('App\Model\Activity');
    }
}
