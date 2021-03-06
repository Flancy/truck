@extends('layouts.app')

@section('content')
@include('elements.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                	<div class="row">
						<div class="col-sm-2">
							<img src="{{ url($user->avatar) }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-10">
                            <div class="setting-info pos-rel">
                                <h3>
                                    <b>{{ $user->name }}</b>
                                    (@if($user->isExecutor == 0)
                                        Исполнитель
                                    @elseif($user->isExecutor == 2)
                                        Диспетчер
                                    @elseif($user->isExecutor == 10)
                                        Администратор
                                    @else
                                        Заказчик
                                    @endif)
                                </h3>

                                <p><b>Email:</b> {{ $user->email }}</p>

                                @if($verify)
                                    <span class="badge badge-success">✔ Ферифицирован</span>
                                @else
                                    <span class="badge badge-warning">✘ Не ферифицирован</span>
                                @endif
                            </div>
						</div>
                        <div class="col-sm-3 text-right">
                            <!--<p>Ваш баланс: <b>{{ $user->cash->balance }} руб.</b></p>-->
                        </div>
					</div>
                </div>
            </div>
        </div>
        @if($user->isExecutor == 0)
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>Ваши автомобили:</h4>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addAuto">Добавить автомобиль +</a>

                        <div class="cars mt-4">
                            <div class="row">
                                @isset($cars)
                                    @foreach($cars as $car)
                                        <div class="col-sm-4">
                                            <p>
                                                <b>Автомобиль:</b> {{ $car->name }}; <br>
                                                <b>Грузоподъемность:</b> {{ $car->weight }};<br>
                                                <b>Ставка:</b> {{ $car->price }} руб;<br>
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

            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>Ваши заказы:</h4>
                        <div class="cars ordersProcess mt-4">
                            @isset($ordersUser)
                                @foreach($ordersUser as $orderUser)
                                    <div class="col-sm-4">
                                        <div class="card card-orders mb-3 p-2">
                                            @if($orderUser->orders->status == 1 || $orderUser->orders->status == 2)
                                                <span class="badge badge-secondary remove-icon">Не выполнен</span>
                                            @else
                                                <span class="badge badge-success remove-icon">Выполнен</span>
                                            @endif
                                            <p>
                                                <b>Ставка:</b> {{ $orderUser->orders->price }} <br>
                                            </p>
                                            <p>
                                                <b>Описание:</b> {{ $orderUser->orders->description }} <br>
                                            </p>
                                            <p>
                                                <b>Город:</b> {{ $orderUser->orders->city->name }} <br>
                                            </p>
                                            @if($orderUser->orders->status == 1)
                                                <a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#getExecutor" data-id="{{ $orderUser->orders->user->id }}">Посмотреть заказчика</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        @elseif($user->isExecutor == 1)
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>Ваши объявления:</h4>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addOrder">Добавить объявление +</a>

                        <div class="cars ordersProcess mt-4">
                            @isset($orders)
                                @foreach($orders as $order)
                                    <div class="col-sm-4">
                                        <div class="card card-orders mb-3 p-2">
                                            @if($order->status == 0)
                                                <form method="POST" action="{{ route('order.destroy') }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                                    <button type="submit" class="btn btn-danger remove-icon">
                                                        Удалить ×
                                                    </button>
                                                </form>
                                            @elseif($order->status == 1 || $order->status == 2)
                                                <span class="badge badge-secondary remove-icon">Не выполнен</span>
                                            @else
                                                <span class="badge badge-success remove-icon">Выполнен</span>
                                            @endif
                                            <p>
                                                <b>Категория:</b> {{ $order->getAutoCategory->name }} <br>
                                            </p>
                                            <p>
                                                <b>Ставка:</b> {{ $order->price }} <br>
                                            </p>
                                            <p>
                                                <b>Описание:</b> {{ $order->description }} <br>
                                            </p>
                                            <p>
                                                <b>Город:</b> {{ $order->city->name }} <br>
                                            </p>
                                            @if($order->status == 1)
                                                <a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#getExecutor" data-id="{{ $order->getOrderComplete->user_id }}" data-order-id="{{ $order->id }}">Посмотреть исполнителя</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@include('modals.addAuto')
@include('modals.addOrder')
@include('modals.getExecutor')
@endsection
