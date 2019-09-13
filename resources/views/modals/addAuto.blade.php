<div class="modal fade" id="addAuto" tabindex="-1" role="dialog" aria-labelledby="addAutoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ url('auto') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление автомобиля</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nameAuto">Наименование:</label>
                        <input type="text" name="name" class="form-control" id="nameAuto" placeholder="Наименование транспорта:">
                    </div>
                    <div class="form-group">
                        <label for="weightAuto">Грузоподъемность:</label>
                        <select class="custom-select" name="weight" id="weightAuto">
                            <option value="0">Грузоподъемность:</option>
                            <option value="до 500 кг">до 500 кг</option>
                            <option value="до 1000 кг">до 1000 кг</option>
                            <option value="до 1500 кг">до 1500 кг</option>
                            <option value="до 2000 кг">до 2000 кг</option>
                            <option value="от 2000 кг">от 2000 кг</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="priceAuto">Ставка:</label>
                        <input type="number" name="price" class="form-control" id="priceAuto" placeholder="Ставка:">
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
                        <label for="autocategories_id">Изображение:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="imageAuto">
                            <label class="custom-file-label" for="imageAuto">Выберите файл...</label>
                        </div>
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