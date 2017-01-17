<table class="table table-responsive" id="customers-table">
    <thead>
        <th>Customer Name</th>
        <th>Customer Address</th>
        <th>Geolocation Lat</th>
        <th>Geolocation Lng</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo $customer->customer_name; ?></td>
            <td><?php echo $customer->customer_address; ?></td>
            <td><?php echo $customer->geolocation_lat; ?></td>
            <td><?php echo $customer->geolocation_lng; ?></td>
            <td>
                <?php echo Form::open(['route' => ['customers.destroy', $customer->customer_id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('customers.show', [$customer->customer_id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="<?php echo route('customers.edit', [$customer->customer_id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>