@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
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
            </div>
        </div>
    </div>
</div>
@endsection
