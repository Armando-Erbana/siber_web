<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->get();
        $headline = $news->shift();

        return view('news.index', compact('headline', 'news'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('news.show', compact('news'));
    }

    public function search(Request $request)
    {
        $q = $request->q;

        $news = News::where('title', 'like', "%{$q}%")
            ->orWhere('excerpt', 'like', "%{$q}%")
            ->orWhere('content', 'like', "%{$q}%")
            ->orderBy('published_at', 'desc')
            ->get();

        $headline = $news->shift();

        return view('user.home', compact('headline', 'news'));
    }
}
