<!-- Sales Name Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('sales_name', 'Sales Name:'); ?>

    <?php echo Form::text('sales_name', null, ['class' => 'form-control']); ?>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('sales.index'); ?>" class="btn btn-default">Cancel</a>
</div>
