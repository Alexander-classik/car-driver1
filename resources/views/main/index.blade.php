@extends('layouts.site')
@section('content')
    <style>
        p {
            margin: 0;
            font-size: 30px;
            text-indent: 3ch;
        }

        p.pilcrow {
            text-indent: 0;
            display: inline;
        }
        p.pilcrow + p.pilcrow::before {
            content: " ¶ ";
        }
        .grad {
            font-family: 'Rubik One', sans-serif;
            font-size: 45px;
            text-transform: uppercase;
            background: linear-gradient(45deg, #0B2349 33%, #0D61BC 66%, #8AA9D6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            color: #0B2349;
            display: table;
            margin: 20px auto;
        }
    </style>
    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse  ($car->sortByDesc('id') as $c)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{asset('storage/' . $c->img) }}" class="card-img-top img-fluid aspect-ratio-square @if($c->imageIsSmaller()) img-cover @endif" alt="">
                        <div class="row row-cols-1">
                            <h class="card-text grad">{{ $c->name }}</h>
                            <p class="card-text">{{ $c->description }}</p>
                            <button href="" type="button" class="btn btn-outline-info">Info</button>
                        </div>
{{--                        <a class="btn btn-outline-info" href="tasks/index?id={{$block->id}}">Подробнее</a>--}}
                    </div>
                </div>
            @empty
                <p>Пока что здесь ничего нет.</p>
            @endforelse
        </div>
    </div>

@endsection
