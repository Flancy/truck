@extends('layouts.app')

@section('content')
@include('elements.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="h2">Верификация аккаунта</h2>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5 class="modal-title" id="exampleModalLabel">Паспортные данные</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('info.create') }}" method="POST" class="form-passport">
                        {{ csrf_field() }} 
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="passportName">Имя:</label>
                                <input type="text" name="name" class="form-control" id="passportName" 
                                    value="@isset ($passport->name){{ $passport->name }}@endisset">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="passportSurname">Фамилия:</label>
                                <input type="text" name="surname" class="form-control" id="passportSurname" 
                                    value="@isset ($passport->surname){{ $passport->surname }}@endisset">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="passportPatronymic">Отчество:</label>
                                <input type="text" name="patronymic" class="form-control" id="passportPatronymic" 
                                    value="@isset ($passport->patronymic){{ $passport->patronymic }}@endisset">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="passportNumber">Серия и номер:</label>
                                <input type="number" name="number" class="form-control" id="passportNumber" 
                                    value="@isset ($passport->number){{ $passport->number }}@endisset">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="passportCity">Кем выдан:</label>
                                <textarea name="city" id="passportCity" class="form-control"
                                    value="@isset ($passport->city){{ $passport->city }}@endisset">@isset ($passport->city){{ $passport->city }}@endisset</textarea>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="passportDate">Дата выдачи:</label>
                                <input name="date" type="date" class="form-control" id="passportDate" 
                                    value="@isset ($passport->date){{ $passport->date }}@endisset">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-success">Отправить на проверку</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
