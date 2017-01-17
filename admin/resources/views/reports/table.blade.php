<table class="table table-responsive" id="reports-table">
    <thead>
        <th>Assigment Date</th>
        <th>Sales Name</th>
        <th>Task Title</th>
        <th>Activity Title</th>
        <th>Report Title</th>
        <!--<th colspan="3">Action</th>-->
    </thead>
    <tbody>
    @foreach($reports as $report)
        <tr>
            <td>{!! $report->assigment['assigment_date'] !!}</td>
            <td>{!! $report->sales['sales_name'] !!}</td>
            <td>{!! $report->task['task_title'] !!}</td>
            <td>{!! $report->activity['activity_title'] !!}</td>
            <td>{!! $report->report_title !!}</td>
            <!--<td>
                {!! Form::open(['route' => ['reports.destroy', $report->report_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('reports.show', [$report->report_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('reports.edit', [$report->report_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>-->
        </tr>
    @endforeach
    </tbody>
</table>