@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                	<div class="row">
						<div class="col-sm-4">
							<img src="{{ url($user->auto->image) }}" class="card-img-top" alt="{{ $user->auto->name }}">
							<p><b>Грузоподъемность:</b> {{ $user->auto->weight }}</p>
						</div>
						<div class="col-sm-8">
							<h5 class="text-left" style="margin-top: 20px"><a href="{{ url('/user/'.$user->id) }}">{{ $user->name }}</a></h5>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
