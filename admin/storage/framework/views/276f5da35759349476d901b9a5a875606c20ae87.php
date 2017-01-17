<!-- Activity Title Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('activity_title', 'Activity Title:'); ?>

    <?php echo Form::text('activity_title', null, ['class' => 'form-control']); ?>

</div>

<!-- Activity Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('activity_description', 'Activity Description:'); ?>

    <?php echo Form::textarea('activity_description', null, ['class' => 'form-control']); ?>

</div>

<!-- Type Report Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('type_report', 'Type Report:'); ?>

    <?php echo Form::select('type_report', ['text' => 'text', 'textarea' => 'textarea', 'radio' => 'radio', 'checkbox' => 'checkbox', 'file' => 'file'], null, ['class' => 'form-control']); ?>

</div>

<!-- Task Id Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('task_id', 'Task Id:'); ?>

    <?php echo Form::select('task_id', ['pilih' => 'pilih'], null, ['class' => 'form-control']); ?>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('activities.index'); ?>" class="btn btn-default">Cancel</a>
</div>
