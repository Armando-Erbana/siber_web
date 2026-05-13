<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;

class UserController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->get();
        $headline = $news->shift();

        // pakai view versi user
        return view('user.home', compact('headline', 'news'));
    }
}
