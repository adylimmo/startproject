<!-- Assigment Id Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('assigment_id', 'Assigment Id:'); ?>

    <?php echo Form::select('assigment_id', ['pilih' => 'pilih'], null, ['class' => 'form-control']); ?>

</div>

<!-- Task Id Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('task_id', 'Task Id:'); ?>

    <?php echo Form::select('task_id', ['pilih' => 'pilih'], null, ['class' => 'form-control']); ?>

</div>

<!-- Ativity Id Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('ativity_id', 'Ativity Id:'); ?>

    <?php echo Form::select('ativity_id', ['pilih' => 'pilih'], null, ['class' => 'form-control']); ?>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('reports.index'); ?>" class="btn btn-default">Cancel</a>
</div>
