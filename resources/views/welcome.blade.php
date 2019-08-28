@extends('layouts.app')

@section('content')
<div class="welcome">
	<video loop muted autoplay class="fullscreen-bg__video">
		<source src="{{ url('/video/home.mp4') }}" type="video/mp4">>
	</video>
	@include('elements.nav')
	<div class="container container-welcome">
	    <div class="row justify-content-center">
	        <div class="col-md-12">
	        	<h1 class="text-center">Быстрый поиск спецтехники TruckService</h1>
	        	<h3 class="text-center">Более 10 000 исполнителей ожидают вас!</h3>

				@include('elements.search')

			</div>
		</div>
	</div>
</div>
<div class="welcome-slider">
	<div class="container">
	    <div class="row justify-content-center">
	    	<div class="col-md-12">
	    		<h1>Выберите нужный вид спецтехники</h1>
	    	</div>
	        <div class="col-md-12">
	            <div class="card-body_autocategory text-center">
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
		                					<div class="card-img-wrap">
												<img src="{{ url($category->image) }}" class="card-img-top" alt="{{ $category->name }}">
											</div>
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
	    </div>
	</div>
</div>
<div class="welcome-counter">
	<div class="container">
	    <div class="row justify-content-center">
	    	<div class="col-md-3">
	    		<h3>10327</h3>
	    		<p class="text">Исполнителей</p>
	    	</div>
	    	<div class="col-md-3">
	    		<h3>32</h3>
	    		<p class="text">Города</p>
	    	</div>
	    	<div class="col-md-3">
	    		<h3>7482</h3>
	    		<p class="text">Заказчиков</p>
	    	</div>
	    	<div class="col-md-3">
	    		<h3>1240</h3>
	    		<p class="text">Диспетчеров</p>
	    	</div>
	    </div>
	</div>
</div>
<div class="container executor">
	<div class="row justify-content-center">
		<div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header text-center">
                	<h2 class="h2"><span>Лучшие исполнители</span></h2>
                </div>

                <div class="card-body text-center">
                	<div class="row">
                		<!--@isset($users)
		                	@foreach($users as $user)
		                		@if($user->isExecutor == 0)
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
						@endisset-->
						<div class="col-sm-6 mb-2">
							<div class="card card-item">
								<div class="row">
									<div class="col-sm-5 card-left">
										<img src="{{ url($user->avatar) }}" class="card-img-top" alt="{{ $user->name }}">
										<p class="text-name">Андрей</p>
									</div>
									<div class="col-sm-7 card-right">
										<h5 class="text-center">Эвакуатор</h5>

										<div class="list-group">
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Грузоподъемность:</p>
												<p class="text float-right"><b>2.5</b></p>
											</div>
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Выполнено заказов:</p>
												<p class="text float-right"><b>24</b></p>
											</div>
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Ставка:</p>
												<p class="text float-right"><b>500</b></p>
											</div>
										</div>

										<a href="#" class="btn btn-success float-right">Заказать</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 mb-2">
							<div class="card card-item">
								<div class="row">
									<div class="col-sm-5 card-left">
										<img src="{{ url($user->avatar) }}" class="card-img-top" alt="{{ $user->name }}">
										<p class="text-name">Андрей</p>
									</div>
									<div class="col-sm-7 card-right">
										<h5 class="text-center">Эвакуатор</h5>

										<div class="list-group">
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Грузоподъемность:</p>
												<p class="text float-right"><b>2.5</b></p>
											</div>
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Выполнено заказов:</p>
												<p class="text float-right"><b>24</b></p>
											</div>
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Ставка:</p>
												<p class="text float-right"><b>500</b></p>
											</div>
										</div>

										<a href="#" class="btn btn-success float-right">Заказать</a>
									</div>
								</div>
							</div>
						</div>
	                </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header text-center">
                	<h2 class="h2"><span>Новые заявки</span></h2>
                </div>

                <div class="card-body text-center">
                	<div class="row p-4">
                		<!--@isset($orders)
		                	@foreach($orders as $order)
		                		@if($order->status == 0)
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
		                                
		                                @if(!Auth::guest() && Auth::user()->isExecutor == 0)
		                                    <a href="{{ route('order.show', ['id' => $order->id]) }}" class="btn btn-success mb-3">Отлкликнуться</a>
		                                @endif
		                            </div>
		                        @endif
		                	@endforeach
						@endisset-->
						<div class="col-sm-6 mb-2">
							<div class="card card-item">
								<div class="row">
									<div class="col-sm-5 card-left">
										<img src="{{ url($user->avatar) }}" class="card-img-top" alt="{{ $user->name }}">
									</div>
									<div class="col-sm-7 card-right">
										<h5 class="text-center">Эвакуатор</h5>

										<div class="list-group">
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Перевезти из точки А в точку Б</p>
											</div>
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Время:</p>
												<p class="text float-right"><b>04.02.19 12:56</b></p>
											</div>
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Ставка:</p>
												<p class="text float-right"><b>3000</b></p>
											</div>
										</div>

										<a href="#" class="btn btn-success float-right">Ответить</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 mb-2">
							<div class="card card-item">
								<div class="row">
									<div class="col-sm-5 card-left">
										<img src="{{ url($user->avatar) }}" class="card-img-top" alt="{{ $user->name }}">
									</div>
									<div class="col-sm-7 card-right">
										<h5 class="text-center">Грузовые</h5>

										<div class="list-group">
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Перевезти из точки А в точку Б</p>
											</div>
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Время:</p>
												<p class="text float-right"><b>04.02.19 12:56</b></p>
											</div>
											<div class="list-group-item list-group-item-action">
												<p class="text float-left">Ставка:</p>
												<p class="text float-right"><b>3000</b></p>
											</div>
										</div>

										<a href="#" class="btn btn-success float-right">Ответить</a>
									</div>
								</div>
							</div>
						</div>
	                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
    	<a href="#" class="btn btn-transparent">Посмотреть все заявки</a>
    </div>
</div>
@endsection
