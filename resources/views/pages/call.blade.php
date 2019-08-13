@extends('layouts.app')

@section('content')
<div class="operator">
	@include('elements.nav')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-9">
	        	<h1>Лучшее решение</h1>
	        	<h3>Для диспетчера</h3>

	        	<a href="{{ route('register') }}" class="btn btn-success">Создать профиль диспетчера</a>
	        </div>
	        <div class="col-md-3 text-right">
	        	<img src="{{ url('/img/iphone.png') }}" class="img-fluid">
	        </div>
	    </div>
	</div>
</div>
<div class="container operator-auto">
    <div class="row justify-content-center" style="margin-top: 40px">
        <div class="col-md-12">
        	<h1 class="text-center">Автоматизация работы <br>диспетчера</h1>

			<div class="row">
				<div class="col-md-8">
					<p class="text">
						Когда необходимо получить заявку на перевозку или оперативно найти водителя, нам приходится производить массу звонков, перебирать огромное количество различных источников. Это весьма трудоёмкий процесс.
					</p>
				</div>
				<div class="col-md-4 text-center">
					<img src="{{ url('/img/call/text-1.png') }}" alt="" class="img-fluid">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 text-center">
					<img src="{{ url('/img/call/text-2.png') }}" alt="" class="img-fluid">
				</div>
				<div class="col-md-8">
					<p class="text">
						Наша команда, постаралась максимально облегчить работу диспетчера! Работа диспетчера с нашим сервисом станет комфортной, удобной и, главное продуктивной!
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 text-center">
					<a href="{{ route('register') }}" class="btn btn-operator">Создать профиль диспетчера</a>
				</div>
			</div>
        </div>
    </div>
</div>
<div class="operator-form">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-6 text-center">
	        	<div class="wrap">
		        	<h1>Есть вопросы?</h1>
		        	<h3>Заполни форму и мы с <br>радостью вам поможем!</h3>

		        	<img src="{{ url('/img/call/question.png') }}" alt="" class="img-fluid">
		        </div>
	        </div>
	        <div class="col-md-6">
	        	<div class="form-wrap">
	        		<div class="form-head">
	        			<img src="{{ url('/img/call/feedback.png') }}" alt="" class="img-fluid img-feedback">
	        			<img src="{{ url('/img/call/triangle.png') }}" alt="" class="img-triangle">
	        		</div>
	        		<div class="form-body">
	        			<form>
			                <div class="form-row">
			                    <div class="col-md-12 mb-3">
			                        <input type="text" class="form-control" placeholder="Имя:" required>
			                    </div>
			                    <div class="col-md-12 mb-3">
			                        <input type="email" class="form-control" placeholder="E-mail:" required>
			                    </div>
			                    <div class="col-md-12 mb-3">
			                        <textarea class="form-control" name="question" placeholder="Вопрос" style="height: 300px"></textarea>
			                    </div>
			                </div>
			                <div class="form-row text-center">
			                	<div class="col-md-12">
			                		<button class="btn btn-operator" type="submit">Отправить</button>
			                	</div>
			                </div>
			            </form>
	        		</div>
	        	</div>
	        </div>
	    </div>
	</div>
</div>
@endsection
