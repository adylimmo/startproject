<div class="form-group col-sm-4 col-lg-4">
    {!! Form::label('orderDate', 'Tanggal Pesan:') !!}
    {!! Form::date('orderDate', null, ['class' => 'form-control input-medium']) !!}
</div>

<div class="form-group col-sm-4 col-lg-4">
    {!! Form::label('needDate', 'Tanggal Dibutuhkan:') !!}
    {!! Form::date('needDate', null, ['class' => 'form-control input-medium']) !!}
</div>

<div class="form-group col-sm-4 col-lg-4">
    {!! Form::label('soNo', 'Nomor Faktur:') !!}
    {!! Form::text('soNo', null, ['class' => 'form-control input-large', 'readonly' => 'readonly']) !!}
</div>

<!-- Customername Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('customerName', 'Customername:') !!}
    {!! Form::text('customerName', null, ['class' => 'form-control input-medium']) !!}
    {!! Form::text('customerID', null, ['class' => 'form-control input-medium']) !!}
    
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('customerAddress', 'Alamat :') !!}
    <textarea class="form-control" readonly="readonly" name="customerAddress" cols="50" rows="3" id="customerAddress"></textarea>
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', 'Keterangan:') !!}
    <textarea class="form-control" readonly="readonly" name="note" cols="50" rows="3" id="note"></textarea>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('salesorders.index') !!}" class="btn btn-default">Cancel</a>
</div>
