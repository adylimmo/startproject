@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Salesorders
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('salesorders.show_fields')
                    <a href="{!! route('salesorders.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
