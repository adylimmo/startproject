<!-- Tracking Id Field -->
<div class="form-group">
    {!! Form::label('tracking_id', 'Tracking Id:') !!}
    <p>{!! $tracking->tracking_id !!}</p>
</div>

<!-- Sales Id Field -->
<div class="form-group">
    {!! Form::label('sales_id', 'Sales Id:') !!}
    <p>{!! $tracking->sales_id !!}</p>
</div>

<!-- Geolocation Lat Field -->
<div class="form-group">
    {!! Form::label('geolocation_lat', 'Geolocation Lat:') !!}
    <p>{!! $tracking->geolocation_lat !!}</p>
</div>

<!-- Geolocation Lng Field -->
<div class="form-group">
    {!! Form::label('geolocation_lng', 'Geolocation Lng:') !!}
    <p>{!! $tracking->geolocation_lng !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tracking->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tracking->updated_at !!}</p>
</div>

