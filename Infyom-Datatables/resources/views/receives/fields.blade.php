<!-- Invoiceid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoiceID', 'Invoiceid:') !!}
    {!! Form::text('invoiceID', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerID', 'Customerid:') !!}
    {!! Form::text('customerID', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoicetotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoiceTotal', 'Invoicetotal:') !!}
    {!! Form::text('invoiceTotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Receivetotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('receiveTotal', 'Receivetotal:') !!}
    {!! Form::text('receiveTotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Refundtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('refundTotal', 'Refundtotal:') !!}
    {!! Form::text('refundTotal', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('receives.index') !!}" class="btn btn-default">Cancel</a>
</div>
