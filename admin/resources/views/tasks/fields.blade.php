<!-- Task Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('task_title', 'Task Title:') !!}
    {!! Form::text('task_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Task Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('task_description', 'Task Description:') !!}
    {!! Form::textarea('task_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tasks.index') !!}" class="btn btn-default">Cancel</a>
</div>
