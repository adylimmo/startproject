<!-- Invoiceno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoiceNo', 'Invoiceno:') !!}
    {!! Form::text('invoiceNo', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoicedate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoiceDate', 'Invoicedate:') !!}
    {!! Form::date('invoiceDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Soid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('soID', 'Soid:') !!}
    {!! Form::text('soID', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['0' => 'New_Invoice', '1' => 'Dibayar_Sebagian', '2' => 'Lunas'], null, ['class' => 'form-control']) !!}
</div>

<!-- Paymenttype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paymentType', 'Paymenttype:') !!}
    {!! Form::select('paymentType', ['0' => 'New_Invoice', '1' => 'Dibayar_Sebagian', '2' => 'Lunas'], null, ['class' => 'form-control']) !!}
</div>

<!-- Expiredpayment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiredPayment', 'Expiredpayment:') !!}
    {!! Form::date('expiredPayment', null, ['class' => 'form-control']) !!}
</div>

<!-- Ppn Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ppn', 'Ppn:') !!}
    {!! Form::text('ppn', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Discount:') !!}
    {!! Form::text('discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Grandtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grandtotal', 'Grandtotal:') !!}
    {!! Form::text('grandtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerID', 'Customerid:') !!}
    {!! Form::text('customerID', null, ['class' => 'form-control']) !!}
</div>

<!-- Customername Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerName', 'Customername:') !!}
    {!! Form::text('customerName', null, ['class' => 'form-control']) !!}
</div>

<!-- Customeraddress Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('customerAddress', 'Customeraddress:') !!}
    {!! Form::textarea('customerAddress', null, ['class' => 'form-control']) !!}
</div>

<!-- Staffid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('staffID', 'Staffid:') !!}
    {!! Form::text('staffID', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('salesinvoices.index') !!}" class="btn btn-default">Cancel</a>
</div>
