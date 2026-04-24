<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Mail\ArticleMail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use App\Jobs\VeryLongJob;

class ArticleController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $article = Article::latest()->paginate(5);
        // return view('articles/index', ['articles' => $articles]);
        return response()->json($article, 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('create', [self::class]);
        // return view('articles/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'datePublic'=>'required',
            'title'=>'required',
            'shortDesc' => 'required',
            'desc'=>'required'
        ]);

        $article = new Article;
        $article->datePublic = $request->datePublic;
        $article->title = $request->title;
        $article->shortDesc = $request->shortDesc;
        $article->desc = $request->desc;
        $result = $article->save();
        if ($result) {
            dispatch(new VeryLongJob($article));
        }
        // return redirect(route('article.index'));
        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // return view('articles/show', ['article'=>$article]);
        return response()->json($article, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        // return view('articles/edit', ['article' => $article]);
        return response()->json($article, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'datePublic'=>'required',
            'title'=>'required',
            'desc'=>'required'
        ]);

        $article->datePublic = $request->datePublic;
        $article->title = $request->title;
        $article->shortDesc = $request->shortDesc;
        $article->desc = $request->desc;
        $result = $article->save();
        // return redirect(route('article.show', ['article'=>$article->id]));
        return response()->json($article, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        return response()->json($article->delete(), 201);
        // return redirect()->route('article.index');
    }
}
