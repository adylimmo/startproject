<!-- Task Id Field -->
<div class="form-group">
    {!! Form::label('task_id', 'Task Id:') !!}
    <p>{!! $task->task_id !!}</p>
</div>

<!-- Task Title Field -->
<div class="form-group">
    {!! Form::label('task_title', 'Task Title:') !!}
    <p>{!! $task->task_title !!}</p>
</div>

<!-- Task Description Field -->
<div class="form-group">
    {!! Form::label('task_description', 'Task Description:') !!}
    <p>{!! $task->task_description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $task->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $task->updated_at !!}</p>
</div>

