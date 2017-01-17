<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    {!! Form::select('customer_id', ['cutomer1' => 'cutomer1'], null, ['class' => 'form-control']) !!}
</div>

<!-- Assignment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('assignment_id', 'Assignment Id:') !!}
    {!! Form::select('assignment_id', ['asssignment1' => 'asssignment1'], null, ['class' => 'form-control']) !!}
</div>

<!-- Confirmation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('confirmation', 'Confirmation:') !!}
    {!! Form::textarea('confirmation', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('confirms.index') !!}" class="btn btn-default">Cancel</a>
</div>
