<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;

class ReaderController
{
    public function index()
    {
        $articles = Article::with('project')
            ->where('status', '公開')
            ->paginate(10);

        return view('blog.index', [
            'articles' => $articles
        ]);
    }

    public function show(int $id)
    {
        $article = Article::find($id);

        return view('blog.show', [
            'article' => $article
        ]);
    }
}
