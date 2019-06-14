@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<h1 class="text-center">Быстрый поиск спецтехники по России и странам СНГ</h1>
        	<h3 class="text-center">Более 10 000 исполнителей ожидают вас!</h3>

			@include('elements.search')

            <div class="card">
                <div class="card-header text-center"><b>Любые виды спецтехники и не только!</b></div>

                <div class="card-body card-body_autocategory text-center">
                	<div class="row">
	                	@foreach($autocategories as $category)
	                		<div class="col-sm-2">
	                			<form method="GET" action="{{ url('search') }}">
	                				<input type="hidden" name="isExecutor" value="1">
	                				<input type="hidden" name="city_id" value="0">
	                				<input type="hidden" name="autocategories_id" value="{{ $category->id }}">
	                				<button type="submit">
										<img src="{{ url($category->image) }}" class="card-img-top" alt="{{ $category->name }}">
										<h5 class="card-title">{{ $category->name }}</h5>
									</button>
								</form>
							</div>
	                	@endforeach
	                </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                	<b>Новые исполнители</b><br>
                	исполнители которые недавно зарегистрировались
                </div>

                <div class="card-body text-center">
                	<div class="row">
	                	@foreach($cars as $car)
	                		@isset($car)
		                		<div class="col-sm-6 mb-2">
									<div class="p-2">
										<div class="card">
											<div class="row">
												<div class="col-sm-5">
													<img src="{{ url($car->image) }}" class="card-img-top" alt="{{ $car->name }}">
													<p><b>Грузоподъемность:</b> {{ $car->weight }}</p>
												</div>
												<div class="col-sm-7">
													<h5 class="text-left" style="margin-top: 20px"><a href="{{ url('/user/'.$car->user->id) }}">{{ $car->user->name }}</a></h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endisset
	                	@endforeach
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
