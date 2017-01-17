<!-- Sales Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_name', 'Sales Name:') !!}
    {!! Form::text('sales_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sales.index') !!}" class="btn btn-default">Cancel</a>
</div>
