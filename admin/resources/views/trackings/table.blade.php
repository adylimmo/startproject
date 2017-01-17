<table class="table table-responsive" id="trackings-table">
    <thead>
        <th>Sales Name</th>
        <th>Geolocation Lat</th>
        <th>Geolocation Lng</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($trackings as $tracking)
        <tr>
            <td>{!! $tracking->sales['sales_name'] !!}</td>
            <td>{!! $tracking->geolocation_lat !!}</td>
            <td>{!! $tracking->geolocation_lng !!}</td>
            <td>
                {!! Form::open(['route' => ['trackings.destroy', $tracking->tracking_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('trackings.show', [$tracking->tracking_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('trackings.edit', [$tracking->tracking_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>