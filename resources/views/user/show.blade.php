@extends('layouts.app')

@section('content')
@include('elements.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                	<div class="row">
                        <div class="col-sm-4">
                            <img src="{{ url($user->avatar) }}" class="card-img-top" alt="{{ $user->name }}">
                        </div>
                        <div class="col-sm-8 text-left pos-rel">
                            <h3><b>{{ $user->name }}</b></h3>
                            @if($user->isExecutor == 0)
                                <h5>Количество успешных заказов: <b>{{ $ordersComplete }}</b></h5>
                            @elseif($user->isExecutor == 2)

                            @else
                                <h5>Количество успешных заказов: <b>{{ $ordersComplete }}</b></h5>
                            @endif
                            @if($verify)
                                <span class="badge badge-success">✔ Ферифицирован</span>
                            @else
                                <span class="badge badge-warning">✘ Не ферифицирован</span>
                            @endif
                        </div>
					</div>
                </div>
            </div>

             @if(Auth::user()->isExecutor == 10)
                <div class="card mt-4">
                    <div class="card-body">
                        <h2>Паспортные данные:</h2>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><b>ФИО:</b> {{ $passport->name }} {{ $passport->surname }} {{ $passport->patronymic }}</p>
                                <p><b>Дата выдачи:</b> {{ $passport->number }}</p>
                                <p><b>Кем выдан:</b> {{ $passport->city }}</p>
                                <p><b>Дата выдачи:</b> {{ $passport->date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($user->isExecutor == 0)
                <div class="card mt-4">
                    <div class="card-body">
                        <h2>Автомобили пользователя</h2>
                        <div class="row">
                            @isset($cars)
                                @foreach($cars as $car)
                                    <div class="col-sm-4">
                                        <div class="p-4 card">
                                            <p>
                                                <b>Автомобиль:</b> {{ $car->name }}; <br>
                                                <b>Грузоподъемность:</b> {{ $car->weight }}<br>
                                                <b>Ставка:</b> {{ $car->price }} руб;<br>
                                                <img src="{{ url($car->image) }}" alt="" class="setting-auto">
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            @endif

            <div class="card mt-4">
                <div class="card-body">
                    <h3><b>Отзывы ({{ count($reviews) }})</b></h3>

                    @if (count($reviews) >= 1)
                        @foreach($reviews as $review)
                            <div class="card p-4 reviews mb-4">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="{{ url($review->user->avatar) }}"  alt="" class="img-fluid">
                                    </div>
                                    <div class="col-sm-10">
                                        <h4>
                                            <b>{{ $review->name }}</b>
                                            (@if($review->user->isExecutor == 0)
                                                Исполнитель
                                            @elseif($review->user->isExecutor == 2)
                                                Диспетчер
                                            @else
                                                Заказчик
                                            @endif)
                                        </h4>
                                        <p>{{ $review->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h5>Ничего не найдено.</h5>
                    @endif
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h3><b>Оставить свой отзыв</b></h3>

                    @if (Auth::check())
                        <form action="{{ route('reviews') }}" method="POST">
                            {{ csrf_field() }} 
                            <div class="form-row">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="col-md-12 mb-3">
                                    <label>Имя</label>
                                    <input disabled="disabled" type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Отзыв или пожелание</label>
                                    <textarea name="description" class="form-control" style="height: 300px"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Оставить отзыв</button>
                        </form>
                    @else
                        <h5>Только <a href="{{ route('register') }}">зарегистрированные</a> заказчики могут оставлять отзывы</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
