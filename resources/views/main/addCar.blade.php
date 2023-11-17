@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">Добавить автомобиль</div>

                    <div class="card-body">
                        <form method="POST" action="/main" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group mb-3">
                                <label for="title">Название:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') }}" required>
                            </div>

                            <label for="mark_id">Выберите марку:</label>
                            <select id="mark-dropdown" class="form-control" name="mark_id">
                                <option value="">-- Макрка --</option>
                                @foreach ($mark as $m)
                                    <option value="{{$m->id}}">
                                        {{$m->name}}
                                    </option>
                                @endforeach
                            </select>

                            <div class="form-group mb-3">
                                <label for="body">Описание:</label>
                                <textarea name="description" id="description" class="form-control"
                                          rows="8" required>{{ old('description') }}</textarea>
                            </div>

                            <!-- фото-->
                            <div class="form-group bmd-form-group is-focused file-input">
                                <label for="photo">Выберите фотографию:</label>
                                <input type="file" name="img" id="img" class="form-control-file">
                            </div>

                            <div class="form-group mb-3">
                                <label for="title">Год:</label>
                                <input type="text" class="form-control" id="year" name="year"
                                       value="{{ old('year') }}" required>
                            </div>

                            <label for="driver_id">Выберите деталь:</label>
                            <select id="driver-dropdown" class="form-control" name="driver_id">
                                <option value="">-- Деталь --</option>
                                @foreach ($driver as $d)
                                    <option value="{{$d->id}}">
                                        {{$d->name}}
                                    </option>
                                @endforeach
                            </select>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Опубликовать</button>
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
