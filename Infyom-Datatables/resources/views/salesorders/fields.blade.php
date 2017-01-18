<div class="form-group col-sm-2">
    {!! Form::label('orderDate', 'Tanggal Pesan:') !!}
    {!! Form::date('orderDate', $tanggal, ['class' => 'form-control input-large']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label('needDate', 'Tanggal Dibutuhkan:') !!}
    {!! Form::date('needDate', $tanggal, ['class' => 'form-control input-large']) !!}
</div>

<div class="form-group col-sm-2"></div>

<div class="form-group col-sm-6">
    {!! Form::label('soNo', 'Nomor Faktur:') !!}
    {!! Form::text('soNo', null, ['class' => 'form-control input-small', 'readonly' => 'readonly']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('customerName', 'Customername:') !!}
    {!! Form::text('customerName', null, ['class' => 'form-control input-medium']) !!}
    <input type="hidden" name="customerID" id="customerID" >
</div>

<div class="form-group col-sm-6">
    {!! Form::label('customerAddress', 'Alamat :') !!}
    <textarea class="form-control" readonly="readonly" name="customerAddress" cols="50" rows="2" id="customerAddress"></textarea>
</div>

<div class="form-group col-sm-12 col-lg-12">
    <label class="label-inline">Produk</label>
    <div class="input-group">
        <input type="text" name="itemName" id="itemName" class="form-control" placeholder="Nama Produk, Kode Produk">
        <input type="hidden" name="itemID" id="itemID">
        <input type="hidden" name="itemSKU" id="itemSKU">
        <input type="hidden" name="itemPrice" id="itemPrice">
        <input type="hidden" name="itemPricelabel" id="itemPricelabel">
        <input type="hidden" name="itemUnit" id="itemUnit">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-plus"></i> Tambah Produk</button>
        </span>
    </div>
</div>

<div class="col-sm-12 col-lg-12">
    <div class="table-responsive">
        <table id="detailso" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="header">SKU</th>
                    <th class="header">NAMA PRODUK</th>
                    <th class="header">HARGA</th>
                    <th class="header">QTY</th>
                    <th class="header">SUBTOTAL</th>
                    <th class="header"></th>
                </tr>
            </thead>
            <tbody id="loaditems"></tbody>
        </table>
    </div>
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
