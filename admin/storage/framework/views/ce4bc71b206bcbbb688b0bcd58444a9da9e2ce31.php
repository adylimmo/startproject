<table class="table table-responsive" id="assigments-table">
    <thead>
        <th>Assigment Date</th>
        <th>Task Id</th>
        <th>Sales Id</th>
        <th>Customer Id</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php $__currentLoopData = $assigments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assigment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo $assigment->assigment_date; ?></td>
            <td><?php echo $assigment->task_id; ?></td>
            <td><?php echo $assigment->sales_id; ?></td>
            <td><?php echo $assigment->customer_id; ?></td>
            <td><?php echo $assigment->status; ?></td>
            <td>
                <?php echo Form::open(['route' => ['assigments.destroy', $assigment->assigment_id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('assigments.show', [$assigment->assigment_id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="<?php echo route('assigments.edit', [$assigment->assigment_id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>