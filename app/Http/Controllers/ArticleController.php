<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::query()
        ->when($request->input('search'), function($query, $search)
        {
            $query
            ->where('title', 'like', "%{$search}%")
            ->orWhere('content', 'like', "%{$search}%");
        })
        ->with(['author:id,name'])
        ->latest()
        ->paginate(9, ['id', 'author', 'status', 'slug', 'title', 'published_at', 'read_time'])
        ->withQueryString();

        return Inertia::render('Laru/Article/Index', [
            'articles' => $articles,
            'filters' => $request->only('search')
        ]);
    }

    public function create()
    {
        return Inertia::render('Laru/Article/Create', [
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        //
    }

    public function show(Article $article)
    {
        //
    }

    public function edit(Article $article)
    {
        return Inertia::render('Laru/Article/Edit');
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    public function destroy(Article $article)
    {
        return "yes";
    }
}
