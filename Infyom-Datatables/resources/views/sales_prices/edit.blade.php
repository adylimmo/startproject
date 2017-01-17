@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sales Price
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salesPrice, ['route' => ['salesPrices.update', $salesPrice->id], 'method' => 'patch']) !!}

                        @include('sales_prices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection