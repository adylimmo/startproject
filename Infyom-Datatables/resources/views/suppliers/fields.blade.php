<!-- Suppliercode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supplierCode', 'Suppliercode:') !!}
    {!! Form::text('supplierCode', null, ['class' => 'form-control']) !!}
</div>

<!-- Suppliername Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supplierName', 'Suppliername:') !!}
    {!! Form::text('supplierName', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Fax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fax', 'Fax:') !!}
    {!! Form::text('fax', null, ['class' => 'form-control']) !!}
</div>

<!-- Contactperson Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contactPerson', 'Contactperson:') !!}
    {!! Form::text('contactPerson', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('suppliers.index') !!}" class="btn btn-default">Cancel</a>
</div>
