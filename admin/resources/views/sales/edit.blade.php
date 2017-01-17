@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sales
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sales, ['route' => ['sales.update', $sales->sales_id], 'method' => 'patch']) !!}

                        @include('sales.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection