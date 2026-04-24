@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <!-- Карточка статьи -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">{{$article->title}}</h2>
                <div class="text-muted mb-3">
                    <small>📅 {{$article->datePublic}}</small>
                </div>
                <h6 class="card-subtitle mb-3 text-muted">{{$article->shortDesc}}</h6>
                <p class="card-text">{{$article->desc}}</p>

                @auth
                <div class="mt-3">
                    <a href="/article/{{$article->id}}/edit" class="btn btn-sm btn-outline-warning">Edit</a>
                    <form action="/article/{{$article->id}}" method="post" style="display: inline-block;">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Удалить статью?')">Delete</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>

        <!-- Комментарии -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Комментарии ({{ $article->approvedComments->count() }})</h5>
            </div>

            <div class="card-body">
                <!-- Форма добавления комментария - компактная! -->
                @auth
                <div class="mb-4">
                    <form action="{{ route('comments.store', $article) }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="content" class="form-control @error('content') is-invalid @enderror"
                                   placeholder="Написать комментарий..." required>
                            <button class="btn btn-primary" type="submit">Отправить</button>
                        </div>
                        @error('content')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </form>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2 py-2" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                </div>
                @else
                <div class="alert alert-info text-center py-2">
                    <a href="/auth/login">Войдите</a>, чтобы оставить комментарий
                </div>
                @endauth

                <!-- Список комментариев -->
                @if($article->approvedComments->count() > 0)
                    @foreach($article->approvedComments as $comment)
                        <div class="border-bottom pb-2 mb-2">
                            <div>
                                <strong>{{ $comment->user->name }}</strong>
                                <small class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="text-center text-muted py-3">
                        Нет комментариев. Будьте первым!
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
