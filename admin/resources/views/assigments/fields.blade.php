<!-- Assigment Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('assigment_date', 'Assigment Date:') !!}
    {!! Form::date('assigment_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Task Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('task_id', 'Task Title:') !!}
    {!! Form::select('task_id', $tasks, null, ['class' => 'form-control']) !!}
</div>

<!-- Sales Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_id', 'Sales Name:') !!}
    {!! Form::select('sales_id', $sales, null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Name:') !!}
    {!! Form::select('customer_id', $customers, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('assigments.index') !!}" class="btn btn-default">Cancel</a>
</div>
