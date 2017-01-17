<!-- Task Title Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('task_title', 'Task Title:'); ?>

    <?php echo Form::text('task_title', null, ['class' => 'form-control']); ?>

</div>

<!-- Task Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('task_description', 'Task Description:'); ?>

    <?php echo Form::textarea('task_description', null, ['class' => 'form-control']); ?>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('tasks.index'); ?>" class="btn btn-default">Cancel</a>
</div>
