<table class="table table-responsive" id="reports-table">
    <thead>
        <th>Assigment Id</th>
        <th>Task Id</th>
        <th>Ativity Id</th>
        <th>Report Title</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo $report->assigment_id; ?></td>
            <td><?php echo $report->task_id; ?></td>
            <td><?php echo $report->ativity_id; ?></td>
            <td><?php echo $report->report_title; ?></td>
            <td>
                <?php echo Form::open(['route' => ['reports.destroy', $report->report_id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('reports.show', [$report->report_id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="<?php echo route('reports.edit', [$report->report_id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>