<!-- Productcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productCode', 'Productcode:') !!}
    {!! Form::text('productCode', null, ['class' => 'form-control']) !!}
</div>

<!-- Productname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productName', 'Productname:') !!}
    {!! Form::text('productName', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit', 'Unit:') !!}
    {!! Form::select('unit', ['0' => 'PCS', '1' => 'SET', '2' => 'BOX'], null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::text('stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['0' => 'Inactive', '1' => 'Active'], null, ['class' => 'form-control']) !!}
</div>

<!-- Createddate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('createdDate', 'Createddate:') !!}
    {!! Form::date('createdDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Createduserid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('createdUserID', 'Createduserid:') !!}
    {!! Form::text('createdUserID', null, ['class' => 'form-control']) !!}
</div>

<!-- Modifieddate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modifiedDate', 'Modifieddate:') !!}
    {!! Form::date('modifiedDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Modifieduserid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modifiedUserID', 'Modifieduserid:') !!}
    {!! Form::text('modifiedUserID', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
