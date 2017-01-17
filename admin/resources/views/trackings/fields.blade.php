<!-- Sales Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_id', 'Sales Name:') !!}
    {!! Form::select('sales_id', $sales, null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('trackings.index') !!}" class="btn btn-default">Cancel</a>
</div>
