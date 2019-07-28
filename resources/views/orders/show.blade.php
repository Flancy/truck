@extends('layouts.app')

@section('content')
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
                                    <b>Ставка:</b> {{ $order->price }} <br>
                                </p>
                                <p>
                                    <b>Описание:</b> {{ $order->description }} <br>
                                </p>
                                <p>
                                    <b>Город:</b> {{ $order->city->name }} <br>
                                </p>
                            </div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
