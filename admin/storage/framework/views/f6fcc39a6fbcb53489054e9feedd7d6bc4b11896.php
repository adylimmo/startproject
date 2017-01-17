<table class="table table-responsive" id="activities-table">
    <thead>
        <th>Activity Title</th>
        <th>Activity Description</th>
        <th>Type Report</th>
        <th>Task Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo $activity->activity_title; ?></td>
            <td><?php echo $activity->activity_description; ?></td>
            <td><?php echo $activity->type_report; ?></td>
            <td><?php echo $activity->task_id; ?></td>
            <td>
                <?php echo Form::open(['route' => ['activities.destroy', $activity->activity_id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('activities.show', [$activity->activity_id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="<?php echo route('activities.edit', [$activity->activity_id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>