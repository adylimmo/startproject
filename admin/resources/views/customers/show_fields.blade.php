<!-- Customer Id Field -->
<div class="form-group">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    <p>{!! $customer->customer_id !!}</p>
</div>

<!-- Customer Name Field -->
<div class="form-group">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    <p>{!! $customer->customer_name !!}</p>
</div>

<!-- Customer Address Field -->
<div class="form-group">
    {!! Form::label('customer_address', 'Customer Address:') !!}
    <p>{!! $customer->customer_address !!}</p>
</div>

<!-- Geolocation Lat Field -->
<div class="form-group">
    {!! Form::label('geolocation_lat', 'Geolocation Lat:') !!}
    <p>{!! $customer->geolocation_lat !!}</p>
</div>

<!-- Geolocation Lng Field -->
<div class="form-group">
    {!! Form::label('geolocation_lng', 'Geolocation Lng:') !!}
    <p>{!! $customer->geolocation_lng !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $customer->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $customer->updated_at !!}</p>
</div>

