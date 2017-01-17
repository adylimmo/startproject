<!-- Activity Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activity_title', 'Activity Title:') !!}
    {!! Form::text('activity_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Activity Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('activity_description', 'Activity Description:') !!}
    {!! Form::textarea('activity_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Report Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_report', 'Type Report:') !!}
    {!! Form::select('type_report', ['text' => 'text', 'textarea' => 'textarea', 'radio' => 'radio', 'checkbox' => 'checkbox', 'file' => 'file'], null, ['class' => 'form-control']) !!}
</div>

<!-- Task Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('task_id', 'Task Title:') !!}
    {!! Form::select('task_id', $tasks, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('activities.index') !!}" class="btn btn-default">Cancel</a>
</div>
