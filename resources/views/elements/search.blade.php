<div class="card mb-3 mt-3 pb-3 pt-3 search">
	<form method="GET" action="{{ url('search') }}" class="form row align-items-center">
	    <div class="col">
	    	<select class="custom-select" name="isExecutor">
				<option value="1" {{ $isExecutor == 1 ? 'selected' : '' }}>Я ищу исполнителя</option>
				<option value="0" {{ $isExecutor == 0 ? 'selected' : '' }}>Я ищу заказы</option>
			</select>
	    </div>
	    @isset($cities)
		    <div class="col">
		    	<select class="custom-select" name="city_id">
					<option value="1" selected="selected">Выберите свой город</option>
					@foreach($cities as $city)
						<option value="{{ $city->id }}" {{ $city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
					@endforeach
				</select>
		    </div>
		@endisset
	    @isset($autocategories)
		    <div class="col">
		    	<select class="custom-select" name="autocategories_id">
					<option value="1" selected="selected">Категория транспорта</option>
					@foreach($autocategories as $category)
						<option value="{{ $category->id }}" {{ $autocategories_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
					@endforeach
				</select>
		    </div>
		@endisset
	    <div class="col-sm-2">
	    	<button class="btn btn-success" type="submit">Найти</button>
	    </div>
	</form>
</div>