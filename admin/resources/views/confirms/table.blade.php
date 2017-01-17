<table class="table table-responsive" id="confirms-table">
    <thead>
        <th>Customer Id</th>
        <th>Assignment Id</th>
        <th>Confirmation</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($confirms as $confirm)
        <tr>
            <td>{!! $confirm->customer_id !!}</td>
            <td>{!! $confirm->assignment_id !!}</td>
            <td>{!! $confirm->confirmation !!}</td>
            <td>
                {!! Form::open(['route' => ['confirms.destroy', $confirm->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('confirms.show', [$confirm->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('confirms.edit', [$confirm->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>