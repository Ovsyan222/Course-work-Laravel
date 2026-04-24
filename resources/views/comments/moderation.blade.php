@extends('layout')

@section('content')
<div class="container">
    <h2>Модерация комментариев</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($comments->count() > 0)
        @foreach($comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <strong>{{ $comment->user->name }}</strong>
                                к статье <a href="/article/{{ $comment->article_id }}">{{ $comment->article->title }}</a>
                            </h6>
                            <p class="card-text">{{ $comment->content }}</p>
                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="btn-group">
                            <form action="{{ route('comments.approve', $comment) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">✓ Одобрить</button>
                            </form>
                            <form action="{{ route('comments.reject', $comment) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-danger">✗ Отклонить</button>
                            </form>
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Удалить комментарий?')">🗑 Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $comments->links() }}
    @else
        <div class="alert alert-info">Нет комментариев, ожидающих модерации.</div>
    @endif
</div>
@endsection
