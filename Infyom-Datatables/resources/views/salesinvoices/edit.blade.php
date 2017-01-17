@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Salesinvoice
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salesinvoice, ['route' => ['salesinvoices.update', $salesinvoice->id], 'method' => 'patch']) !!}

                        @include('salesinvoices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection