@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Confirm
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($confirm, ['route' => ['confirms.update', $confirm->id], 'method' => 'patch']) !!}

                        @include('confirms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection