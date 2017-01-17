<table class="table table-responsive" id="tasks-table">
    <thead>
        <th>Task Title</th>
        <th>Task Description</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo $task->task_title; ?></td>
            <td><?php echo $task->task_description; ?></td>
            <td>
                <?php echo Form::open(['route' => ['tasks.destroy', $task->task_id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('tasks.show', [$task->task_id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="<?php echo route('tasks.edit', [$task->task_id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>