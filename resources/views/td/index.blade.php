@extends('layouts.site')
@section('content')
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Наименование</th>
        </tr>
        </thead>
        <tbody>
        @forelse  ($type_driver->sortByDesc('id') as $row)
            <tr>
                <th scope="row">{{$row->id}}</th>
                <td><p class="card-text">{{ $row->name }}</p></td>
            </tr>
        @empty
            <p>Пока что здесь ничего нет.</p>
        @endforelse
        </tbody>
    </table>

@endsection
