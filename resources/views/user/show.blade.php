@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                	<div class="row">
                        <div class="col-sm-4">
                            <img src="{{ url($user->avatar) }}" class="card-img-top" alt="{{ $user->name }}">
                        </div>
                        <div class="col-sm-8 text-left">
                            <h3><b>{{ $user->name }}</b></h3>
                            <h5>Автомобили пользователя:</h5>

                            <div class="cars mt-4">
                                <div class="row">
                                    @isset($cars)
                                        @foreach($cars as $car)
                                            <div class="col-sm-4">
                                                <p>
                                                    <b>Автомобиль:</b> {{ $car->name }} <br>
                                                    <img src="{{ url($car->image) }}" alt="" class="setting-auto">
                                                </p>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
