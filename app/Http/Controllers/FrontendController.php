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


    public function single(Article $article)
    {
        return Inertia::render('Laru/Single', [
            'article' => $article,
        ]);
    }
}
