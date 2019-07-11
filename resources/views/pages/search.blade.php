@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                @include('elements.search')
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                @isset($auto)
                    @if(count($auto) == 0)
                        <h4><b>По вашему запросу ничего не найдено</b></h4>
                    @else
                        @foreach($auto as $itemAuto)
                            <div class="col-sm-4 card">
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="{{ url($itemAuto->image) }}" class="card-img-top" alt="{{ $itemAuto->name }}">
                                            <p><b>Грузоподъемность:</b> {{ $itemAuto->weight }}</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <h5 class="text-left" style="margin-top: 20px"><a href="{{ url('/user/'.$itemAuto->user->id) }}">{{ $itemAuto->user->name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endisset
                @isset($orders)
                    @if(count($orders) == 0)
                        <h4><b>По вашему запросу ничего не найдено</b></h4>
                    @else
                        @foreach($orders as $order)
                            <div class="card mb-3 col-sm-4 pt-2">
                                <p>
                                    <b>Ставка:</b> {{ $order->price }} <br>
                                </p>
                                <p>
                                    <b>Описание:</b> {{ $order->description }} <br>
                                </p>
                                <p>
                                    <b>Город:</b> {{ $order->city->name }} <br>
                                </p>
                                
                                @if(Auth::user()->isExecutor)
                                    <a href="#" class="btn btn-success mb-3">Отлкликнуться</a>
                                @endif
                            </div>
                        @endforeach
                    @endif
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection
