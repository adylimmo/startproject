@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Assigment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($assigment, ['route' => ['assigments.update', $assigment->assigment_id], 'method' => 'patch']) !!}

                        @include('assigments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection