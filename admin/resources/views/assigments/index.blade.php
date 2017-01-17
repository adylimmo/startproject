@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Assigments</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('assigments.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('assigments.table')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var dataTasks = {};
    </script>

    <script src="{{ url('node_modules/firebase/firebase.js') }}"></script>
    <script>
        var config = {
            apiKey: "AIzaSyAi1BRDCMvnkpQNGErwooDndCBPB6Yol8o",
            authDomain: "salesforce-9c0b9.firebaseapp.com",
            databaseURL: "https://salesforce-9c0b9.firebaseio.com",
            storageBucket: "salesforce-9c0b9.appspot.com",
            messagingSenderId: "747848112206"
        };
        firebase.initializeApp(config);

        var tasksRef = firebase.database().ref("tasks/");

        @if (session()->has('flash_notification.message'))

            $.ajax({
                url: "{{ url('api/assigments') }}",
                async: false,
                type: "GET",
                success: function (response) {
                    dataTasks = response.data;
                }
            });
            tasksRef.set(dataTasks);
        @endif
    </script>
@endsection

