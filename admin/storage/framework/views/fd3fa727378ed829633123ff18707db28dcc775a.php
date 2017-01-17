<!-- Customer Id Field -->
<div class="form-group">
    <?php echo Form::label('customer_id', 'Customer Id:'); ?>

    <p><?php echo $customer->customer_id; ?></p>
</div>

<!-- Customer Name Field -->
<div class="form-group">
    <?php echo Form::label('customer_name', 'Customer Name:'); ?>

    <p><?php echo $customer->customer_name; ?></p>
</div>

<!-- Customer Address Field -->
<div class="form-group">
    <?php echo Form::label('customer_address', 'Customer Address:'); ?>

    <p><?php echo $customer->customer_address; ?></p>
</div>

<!-- Customer Location Lat Field -->
<div class="form-group">
    <?php echo Form::label('customer_location_lat', 'Customer Location Lat:'); ?>

    <p><?php echo $customer->customer_location_lat; ?></p>
</div>

<!-- Customer Location Lng Field -->
<div class="form-group">
    <?php echo Form::label('customer_location_lng', 'Customer Location Lng:'); ?>

    <p><?php echo $customer->customer_location_lng; ?></p>
</div>

<!-- Created At Field -->
<div class="form-group">
    <?php echo Form::label('created_at', 'Created At:'); ?>

    <p><?php echo $customer->created_at; ?></p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <?php echo Form::label('updated_at', 'Updated At:'); ?>

    <p><?php echo $customer->updated_at; ?></p>
</div>

