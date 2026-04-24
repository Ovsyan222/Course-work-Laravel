<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'content' => 'required|string|min:2|max:1000',
        ]);

        $comment = Comment::create([
            'article_id' => $article->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Комментарий отправлен на модерацию. Он появится после проверки.');
    }

    public function moderation()
    {
        $this->authorize('moderate', Comment::class);

        $pendingComments = Comment::with(['user', 'article'])
            ->where('status', 'pending')
            ->latest()
            ->paginate(20);

        return view('comments.moderation', ['comments' => $pendingComments]);
    }

    public function approve(Comment $comment)
    {
        $this->authorize('moderate', Comment::class);

        $comment->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Комментарий одобрен.');
    }

    public function reject(Comment $comment)
    {
        $this->authorize('moderate', Comment::class);

        $comment->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Комментарий отклонен.');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('moderate', Comment::class);

        $comment->delete();

        return redirect()->back()->with('success', 'Комментарий удален.');
    }
}
