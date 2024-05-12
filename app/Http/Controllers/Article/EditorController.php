<?php

namespace App\Http\Controllers\Article;

use App\Http\Requests\Editor\StoreRequest;
use App\Http\Requests\Editor\UpdateRequest;
use App\Models\Article;
use App\Models\Project;

class EditorController
{
    public function index()
    {
        $articles = Article::paginate(20);

        return view('blog.editor.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        $projects = Project::get();

        return view('blog.editor.create', [
            'projects' => $projects
        ]);
    }

    public function store(StoreRequest $request)
    {
        $params = $request->params();
        Article::create($params);

        return to_route('blog.editor.index');
    }

    public function edit(int $id)
    {
        $article = Article::find($id);
        $projects = Project::get();

        return view('blog.editor.edit', [
            'article' => $article,
            'projects' => $projects
        ]);
    }

    public function update(int $id, UpdateRequest $request)
    {
        $params = $request->params();
        Article::where('id', $id)
            ->update($params);

        return to_route('blog.editor.index');
    }

    public function destroy(int $id)
    {
        Article::destroy($id);

        return to_route('blog.editor.index');
    }
}
