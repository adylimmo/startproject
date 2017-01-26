@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ubah Harga {{ $salesPrice->customerName }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salesPrice, ['class'=> 'form-horizontal', 'route' => ['salesPrices.update', $salesPrice->id], 'method' => 'patch']) !!}
                    @foreach($harga as $harga)
                       <div class="form-group col-sm-12">
                           {!! Form::label('harga' . $harga->id, $harga->productName .':', ['class' => 'col-sm-4']) !!}
                           <div class="col-sm-4">
                           {!! Form::text('harga' . $harga->id, null, ['class' => 'form-control']) !!}
                           </div>
                       </div>
                    @endforeach
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection