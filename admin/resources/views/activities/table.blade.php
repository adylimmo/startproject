<table class="table table-responsive" id="activities-table">
    <thead>
        <th>Activity Title</th>
        <th>Activity Description</th>
        <th>Type Report</th>
        <th>Task Title</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($activities as $activity)
        <tr>
            <td>{!! $activity->activity_title !!}</td>
            <td>{!! $activity->activity_description !!}</td>
            <td>{!! $activity->type_report !!}</td>
            <td>{!! $activity->task['task_title'] !!}</td>
            <td>
                {!! Form::open(['route' => ['activities.destroy', $activity->activity_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('activities.show', [$activity->activity_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('activities.edit', [$activity->activity_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>