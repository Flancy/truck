@extends('layouts.app')

@section('content')
<div class="who">
    @include('elements.nav')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <h1>Как это работает?</h1>
               <img src="{{ url('img/utrack-who.png') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection