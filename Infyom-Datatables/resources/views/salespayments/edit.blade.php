@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Salespayments
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salespayments, ['route' => ['salespayments.update', $salespayments->id], 'method' => 'patch']) !!}

                        @include('salespayments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection