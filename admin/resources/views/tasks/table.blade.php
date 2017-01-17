<table class="table table-responsive" id="tasks-table">
    <thead>
        <th>Task Title</th>
        <th>Task Description</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{!! $task->task_title !!}</td>
            <td>{!! $task->task_description !!}</td>
            <td>
                {!! Form::open(['route' => ['tasks.destroy', $task->task_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tasks.show', [$task->task_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tasks.edit', [$task->task_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>