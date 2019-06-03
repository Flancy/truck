@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Отзыв или пожелание о сайте</h1>
            <form>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Имя</label>
                        <input type="text" class="form-control" placeholder="Имя" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>E-mail</label>
                        <input type="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Телефон</label>
                        <input type="tel" class="form-control" placeholder="Телефон" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Отзыв или пожелание</label>
                        <textarea class="form-control" style="height: 300px"></textarea>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Отправить отзыв</button>
            </form>
        </div>
    </div>
</div>
@endsection