@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">Добавить деталь</div>

                    <div class="card-body">
                        <form method="POST" action="/drivers" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group mb-3">
                                <label for="title">Название:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="body">Описание:</label>
                                <textarea name="description" id="description" class="form-control"
                                          rows="8" required>{{ old('description') }}</textarea>
                            </div>

                            <label for="type_driver_id">Выберите тип детали:</label>
                            <select id="type_driver-dropdown" class="form-control" name="type_driver_id">
                                <option value="">-- Типы деталей --</option>
                                @foreach ($type_driver as $td)
                                    <option value="{{$td->id}}">
                                        {{$td->name}}
                                    </option>
                                @endforeach
                            </select>

                            <!-- фото-->
                            <div class="form-group bmd-form-group is-focused file-input">
                                <label for="photo">Выберите фотографию:</label>
                                <input type="file" name="img" id="img" class="form-control-file">
                            </div>

                            <div class="form-group mb-3">
                                <label for="title">Цена:</label>
                                <input type="text" class="form-control" id="price" name="price"
                                       value="{{ old('price') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="title">Количество:</label>
                                <input type="text" class="form-control" id="number" name="number"
                                       value="{{ old('number') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>

                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
