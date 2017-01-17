@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Salesorders
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salesorders, ['route' => ['salesorders.update', $salesorders->id], 'method' => 'patch']) !!}

                        @include('salesorders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection