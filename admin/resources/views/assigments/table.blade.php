<table class="table table-responsive" id="assigments-table">
    <thead>
        <th>Assigment Date</th>
        <th>Task Title</th>
        <th>Sales Name</th>
        <th>Customer Name</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($assigments as $assigment)
        <tr>
            <td>{!! $assigment->assigment_date !!}</td>
            <td>{!! $assigment->task['task_title'] !!}</td>
            <td>{!! $assigment->sales['sales_name'] !!}</td>
            <td>{!! $assigment->customer['customer_name'] !!}</td>
            <td>{!! $assigment->status !!}</td>
            <td>
                {!! Form::open(['route' => ['assigments.destroy', $assigment->assigment_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('assigments.show', [$assigment->assigment_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('assigments.edit', [$assigment->assigment_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>