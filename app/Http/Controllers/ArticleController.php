<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Asset;
use App\Models\User;
use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::query()
            ->when($request->input('search'), function ($query, $search) {
                $query
                    ->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            })
            ->with(['author:id,name'])
            ->latest()
            ->paginate(7, ['id', 'author', 'status', 'slug', 'title', 'published_at', 'read_time'])
            ->withQueryString();

        return Inertia::render('Laru/Article/Index', [
            'articles' => $articles,
            'filters' => $request->only('search')
        ]);
    }

    public function create()
    {
        $statuses = [
            'draft' => "Draft",
            'published' => "Published",
            'archived' => "Archived",
        ];
        $authors = User::admin()->get(['id', 'name']);

        return Inertia::render('Laru/Article/Create', [
            'statuses' => $statuses,
            'authors' => $authors,
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        if (isset($validated['status'])) {
            if ($validated['status'] == 'published') {
                $validated['published_at'] = Carbon::now();
            }

            if ($validated['status'] == 'archived') {
                $validated['archived_at'] = Carbon::now();
            }
        }

        $article = new Article($validated);

        if (isset($validated['banner'])) {
            $banner = Asset::where('id', $validated['banner'])->first();
            $article->banner()->associate($banner);
        }

        auth()->user()->articles()->save($article);

        return redirect()->route('articles.index')->with([
            'success' => 'Article created successfull.'
        ]);
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
