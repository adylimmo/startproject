@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.css') }}" type="text/css">
<style>
.input-tanggal{ width: 15%; }
.input-small{ width: 25%; }
.input-medium{ width: 50%; }
.input-large{ width: 75%; }
</style>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('jquery-ui/jquery-ui.js') }}"></script>
<script>
$( function() {
    $( "#orderDate" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd-mm-yy",
        yearRange: 'c-1:c-0'
    });
            
    $( "#needDate" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd-mm-yy",
        yearRange: '2014:c-0'
    });

    $( "#customerName" ).autocomplete({
        source: "{{ url('ajax-cuxtomer') }}",
        minLength: 2,
        select: function( event, ui ) {
           $("#customerID").val(ui.item.cid);
           $("#customerName").val(ui.item.ckode + ' - ' + ui.item.cname);
           $("#customerAddress").html(ui.item.caddr);
        }
    });
});
    
$(document).ready(function() {
      
});
</script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Pemesanan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'salesorders.store']) !!}

                        @include('salesorders.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
