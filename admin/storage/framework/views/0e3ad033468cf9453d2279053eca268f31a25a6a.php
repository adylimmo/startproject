<!-- Customer Name Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('customer_name', 'Customer Name:'); ?>

    <?php echo Form::text('customer_name', null, ['class' => 'form-control']); ?>

</div>

<!-- Customer Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('customer_address', 'Customer Address:'); ?>

    <?php echo Form::textarea('customer_address', null, ['class' => 'form-control']); ?>

</div>

<!-- Geolocation Lat Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('geolocation_lat', 'Geolocation Lat:'); ?>

    <?php echo Form::text('geolocation_lat', null, ['class' => 'form-control']); ?>

</div>

<!-- Geolocation Lng Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('geolocation_lng', 'Geolocation Lng:'); ?>

    <?php echo Form::text('geolocation_lng', null, ['class' => 'form-control']); ?>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('customers.index'); ?>" class="btn btn-default">Cancel</a>
</div>
