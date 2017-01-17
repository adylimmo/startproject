<!-- Customer Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    {!! Form::text('customer_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('customer_address', 'Customer Address:') !!}
    {!! Form::textarea('customer_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Geolocation Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('geolocation_lat', 'Geolocation Lat:') !!}
    {!! Form::text('geolocation_lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Geolocation Lng Field -->
<div class="form-group col-sm-6">
    {!! Form::label('geolocation_lng', 'Geolocation Lng:') !!}
    {!! Form::text('geolocation_lng', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('customers.index') !!}" class="btn btn-default">Cancel</a>
</div>
