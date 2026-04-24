@extends('layout')

@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$article->shortDesc}}</h6>
            <p class="card-text">{{$article->desc}}</p>
            <a href="/article/{{$article->id}}/edit" class="card-link">Edit</a>
            <form action="/article/{{$article->id}}" method="post">
                @method('DELETE')
                @csrf
                <button class="card-link" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
