@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<h1 class="text-center">Быстрый поиск спецтехники по России и странам СНГ</h1>
        	<h3 class="text-center">Более 10 000 исполнителей ожидают вас!</h3>
            <div class="card">
                <div class="card-header text-center"><b>Любые виды спецтехники и не только!</b></div>

                <div class="card-body text-center">
                	<div class="row">
	                	@foreach($autocategories as $category)
	                		<div class="col-sm-2">
								<a href="{{ url('/autoCategories/'.$category->id) }}">
									<img src="{{ url($category->image) }}" class="card-img-top" alt="{{ $category->name }}">
									<h5 class="card-title">{{ $category->name }}</h5>
								</a>
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
	                	@foreach($user as $autoUser)
	                		@isset($autoUser->auto)
		                		<div class="col-sm-6 card">
									<div class="row">
										<div class="col-sm-4">
											<img src="{{ url($autoUser->auto->image) }}" class="card-img-top" alt="{{ $autoUser->auto->name }}">
											<p><b>Грузоподъемность:</b> {{ $autoUser->auto->weight }}</p>
										</div>
										<div class="col-sm-8">
											<h5 class="text-left" style="margin-top: 20px"><a href="{{ url('/user/'.$autoUser->id) }}">{{ $autoUser->name }}</a></h5>
										</div>
									</div>
								</div>
							@endif
	                	@endforeach
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
