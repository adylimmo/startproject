<!-- Assigment Date Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('assigment_date', 'Assigment Date:'); ?>

    <?php echo Form::date('assigment_date', null, ['class' => 'form-control']); ?>

</div>

<!-- Task Id Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('task_id', 'Task Id:'); ?>

    <?php echo Form::select('task_id', $tasks, null, ['class' => 'form-control']); ?>

</div>

<!-- Sales Id Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('sales_id', 'Sales Id:'); ?>

    <?php echo Form::select('sales_id', $sales, null, ['class' => 'form-control']); ?>

</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('customer_id', 'Customer Id:'); ?>

    <?php echo Form::select('customer_id', $customers, null, ['class' => 'form-control']); ?>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('assigments.index'); ?>" class="btn btn-default">Cancel</a>
</div>
