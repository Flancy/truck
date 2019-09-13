@extends('layouts.app')

@section('content')
@include('elements.nav_admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="h2">Пользователи:</h2>
            <users-index></users-index>
        </div>
    </div>
</div>
@endsection
