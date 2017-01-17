@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

@if(Auth::user()->jabatan == 'admin')
@else
@endif
    </div>
</div>
@endsection
