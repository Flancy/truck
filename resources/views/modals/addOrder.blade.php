<div class="modal fade" id="addOrder" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ url('order') }}" method="POST">
                {{ csrf_field() }} 
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление объявления</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="price">Ставка:</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="Ставка в рублях:">
                    </div>
                    <div class="form-group">
                        <label for="city_id">Город:</label>
                        @isset($cities)
                            <select class="custom-select" name="city_id" id="city_id">
                                <option value="0">Выберите город:</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ $city->id === old('city_id') ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        @endisset
                    </div>
                    <div class="form-group">
                        <label for="autocategories_id">Категория:</label>
                        @isset($autocategories)
                            <select class="custom-select" name="autocategories_id" id="autocategories_id">
                                <option value="0">Категория транспорта:</option>
                                @foreach($autocategories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id === old('autocategories_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        @endisset
                    </div>
                    <div class="form-group">
                        <label for="price">Описание:</label>
                        <textarea name="description" class="form-control" style="height: 200px"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>