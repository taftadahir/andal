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
            ->with(['author:id,name', 'banner:id,name'])
            ->latest()
            ->paginate(8, ['id', 'author', 'banner', 'status', 'slug', 'title', 'published_at', 'updated_at', 'read_time'])
            ->withQueryString();

        return Inertia::render('Laru/Article/Index', [
            'articles' => $articles,
            'filters' => $request->only('search')
        ]);
    }

    public function create()
    {
        $statuses = [
            Article::STATUS_DRAFT => "Draft",
            Article::STATUS_PUBLISHED => "Published",
            Article::STATUS_ARCHIVED => "Archived",
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
            if ($validated['status'] == Article::STATUS_PUBLISHED) {
                $validated['published_at'] = Carbon::now();
            }

            if ($validated['status'] == Article::STATUS_ARCHIVED) {
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
        $statuses = [
            Article::STATUS_DRAFT => "Draft",
            Article::STATUS_PUBLISHED => "Published",
            Article::STATUS_ARCHIVED => "Archived",
        ];
        $authors = User::admin()->get(['id', 'name']);

        $banners = Asset::get(['id', 'name']);
        
        return Inertia::render('Laru/Article/Edit', [
            'article' => $article->load(['banner:id,name', 'author:id,name']),
            'statuses' => $statuses,
            'authors' => $authors,
            'banners' => $banners,
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated = $request->validated();

        if (isset($validated['status'])) {
            if ($validated['status'] == Article::STATUS_PUBLISHED) {
                $validated['published_at'] = Carbon::now();
            }
            
            if ($validated['status'] == Article::STATUS_ARCHIVED) {
                $validated['archived_at'] = Carbon::now();
            }
        }
        
        if (isset($validated['banner'])) {
            $banner = Asset::where('id', $validated['banner'])->first();
            $article->banner()->associate($banner);
        }
        
        $article->update($validated);
        
        return redirect()->route('articles.index')->with([
            'success' => 'Article Updated successfull.'
        ]);
    }

    public function destroy(Article $article)
    {
        return $article->id;
    }
}
