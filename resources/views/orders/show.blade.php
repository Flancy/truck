@extends('layouts.app')

@section('content')
@include('elements.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                	<div class="row">
                        <div class="col-sm-3">
                            <img src="{{ url($order->user->avatar) }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-9">
                            <div class="setting-info">
                                <h3>
                                    {{ $order->user->name }}
                                </h3>
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

                                @if(!Auth::guest() && Auth::user()->isExecutor == 0)
                                    <form action="{{ route('orderChange.changeStatus') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                                        <button type="submit" class="btn btn-success mb-3">Отлкликнуться</button>
                                    </form>
                                @endif
                            </div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
