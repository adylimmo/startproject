{!! Form::open(['route' => ['salesPrices.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('salesPrices.show', $id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="bottom" title="Cetak Daftar Harga">
        <i class="glyphicon glyphicon-print"></i>
    </a>
    <a href="{{ route('salesPrices.edit', $id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" data-placement="bottom" title="Ubah Harga">
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Yakin Hapus Harga Customer ini?')"
    ]) !!}
</div>
{!! Form::close() !!}
