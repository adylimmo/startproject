<!-- Assigment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('assigment_id', 'Assigment Id:') !!}
    {!! Form::select('assigment_id', ['pilih' => 'pilih'], null, ['class' => 'form-control']) !!}
</div>

<!-- Task Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('task_id', 'Task Id:') !!}
    {!! Form::select('task_id', ['pilih' => 'pilih'], null, ['class' => 'form-control']) !!}
</div>

<!-- Ativity Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ativity_id', 'Ativity Id:') !!}
    {!! Form::select('ativity_id', ['pilih' => 'pilih'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('reports.index') !!}" class="btn btn-default">Cancel</a>
</div>
