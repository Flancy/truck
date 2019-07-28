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
                	<div id="carouselAutoCategories" class="carousel slide" data-ride="carousel">
			            <div class="carousel-inner row w-100 mx-auto" role="listbox">
			            	@foreach($autocategories as $category)
				        		@if($loop->index == 0)
		                			<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
		                		@else
		                			<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
		                		@endif
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
			            <a class="carousel-control-prev" href="#carouselAutoCategories" role="button" data-slide="prev">
			                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			                <span class="sr-only">Previous</span>
			            </a>
			            <a class="carousel-control-next" href="#carouselAutoCategories" role="button" data-slide="next">
			                <span class="carousel-control-next-icon" aria-hidden="true"></span>
			                <span class="sr-only">Next</span>
			            </a>
			        </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header text-center">
                	<b>Новые исполнители</b><br>
                	исполнители которые недавно зарегистрировались
                </div>

                <div class="card-body text-center">
                	<div class="row">
                		@isset($users)
		                	@foreach($users as $user)
		                		@if($user->isExecutor)
			                		<div class="col-sm-6 mb-2">
										<div class="p-2">
											<div class="card">
												<div class="row">
													<div class="col-sm-5">
														<img src="{{ url($user->avatar) }}" class="card-img-top" alt="{{ $user->name }}">
													</div>
													<div class="col-sm-7">
														<h5 class="text-left" style="margin-top: 20px"><a href="{{ url('/user/'.$user->id) }}">{{ $user->name }}</a></h5>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endif
		                	@endforeach
						@endisset
	                </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header text-center">
                	<b>Новые заказы</b><br>
                </div>

                <div class="card-body">
                	<div class="row p-4">
                		@isset($orders)
		                	@foreach($orders as $order)
		                		<div class="card mb-3 col-sm-4 pt-2">
	                                <p>
	                                    <b>Имя:</b> {{ $order->user->name }} <br>
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
	                                
	                                @if(!Auth::guest() && Auth::user()->isExecutor == 1)
	                                    <a href="{{ route('order.show', ['id' => $order->id]) }}" class="btn btn-success mb-3">Отлкликнуться</a>
	                                @endif
	                            </div>
		                	@endforeach
						@endisset
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
