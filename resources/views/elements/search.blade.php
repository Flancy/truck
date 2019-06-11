<div class="card mb-3 mt-3 pb-3 pt-3 search">
	<form method="GET" action="{{ url('search') }}" class="form row align-items-center">
	    <div class="col">
	    	<select class="custom-select" name="isExecutor">
				<option value="0">Я ищу:</option>
				<option value="1">Я ищу исполнителя</option>
				<option value="2">Я ищу заказы</option>
			</select>
	    </div>
	    @isset($cities)
		    <div class="col">
		    	<select class="custom-select" name="city_id">
					<option value="0">Выберите город:</option>
					@foreach($cities as $city)
						<option value="{{ $city->id }}" {{ $city->id === old('city_id') ? 'selected' : '' }}>{{ $city->name }}</option>
					@endforeach
				</select>
		    </div>
		@endisset
	    @isset($autocategories)
		    <div class="col">
		    	<select class="custom-select" name="autocategories_id">
					<option value="0">Категегория транспорта:</option>
					@foreach($autocategories as $category)
						<option value="{{ $category->id }}" {{ $category->id === old('autocategories_id') ? 'selected' : '' }}>{{ $category->name }}</option>
					@endforeach
				</select>
		    </div>
		@endisset
	    <div class="col">
	    	<button class="btn btn-success" type="submit">Найти</button>
	    </div>
	</form>
</div>