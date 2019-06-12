@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                	<div class="row">
						<div class="col-sm-2">
							<img src="{{ url($user->avatar) }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-7">
                            <div class="setting-info">
                                <h3>
                                    <b>{{ $user->name }}</b>
                                    (@if($user->isExecutor)
                                        Исполнитель
                                    @else
                                        Заказчик
                                    @endif)
                                </h3>

                                <p><b>Email:</b> {{ $user->email }}</p>
                            </div>
						</div>
                        <div class="col-sm-3 text-right">
                            @if($user->isExecutor)
                                <p>Ваш баланс: <b>{{ $user->cash->balance }} руб.</b></p>
                            @endif
                        </div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h4>Ваши автомобили:</h4>
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addAuto">Добавить автомобиль +</a>

                    <div class="cars mt-4">
                        @isset($user->auto)
                            <p>
                                <b>Автомобиль:</b> {{ $user->auto->name }} <br>
                                <img src="{{ url($user->auto->image) }}" alt="" class="setting-auto">
                            </p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('modals.addAuto')
@endsection
