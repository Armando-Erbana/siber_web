<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $totalNews = News::count();

        $latestNews = News::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalNews', 'latestNews'));
    }
}