<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function home(Request $request)
    {
        $articles = Article::query()
            ->when($request->input('search'), function($query, $search)
            {
                $query
                    ->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });

        if (!auth()->check() || auth()->user()->role != User::ROLE_ADMIN) {
            $articles->published();
        }

        $articles = $articles
                        ->with(['author:id,name', 'banner:id,name'])
                        ->latest()
                        ->paginate(12, ['author', 'banner', 'slug', 'title', 'published_at', 'read_time'])
                        ->withQueryString();

        return Inertia::render('Laru/Home', [
            'articles' => $articles,
            'filters' => $request->only('search')
        ]);
    }

    public function single(Article $article, Request $request)
    {
        if ( ( !auth()->check() || auth()->user()->role != User::ROLE_ADMIN ) &&  $article->status != Article::STATUS_PUBLISHED) {
            return redirect()->route('home');
        }

        $articlesBySameAuthor = Article::query();
        $latestArticles = Article::query();

        if (!auth()->check() || auth()->user()->role != User::ROLE_ADMIN) {
            $articlesBySameAuthor->published();
            $latestArticles->published();
        }

        $article->update([
            'views' => $article->views + 1
        ]);

        return Inertia::render('Laru/Single', [
            'article' => $article->load(['author:id,name', 'banner:id,name']),
            'articlesBySameAuthor' => $articlesBySameAuthor
                                        ->where('author', $article->author)
                                        ->limit(3)
                                        ->with(['author:id,name', 'banner:id,name'])
                                        ->latest()
                                        ->get(['author', 'banner', 'slug', 'title', 'published_at', 'read_time']),
            'latestArticles' => $latestArticles
                                        ->limit(3)
                                        ->with(['author:id,name', 'banner:id,name'])
                                        ->latest()
                                        ->get(['author', 'banner', 'slug', 'title', 'published_at', 'read_time']),
        ]);
    }
}
