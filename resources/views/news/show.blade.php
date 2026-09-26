@extends('layouts.app')

@section('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;0,6..72,600;1,6..72,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
:root {
    --ink: #171310;
    --paper: #f6f3ec;
    --card: #ffffff;
    --line: #ddd6c6;
    --line-strong: #171310;
    --muted: #726a5a;
    --accent: #9c1c1c;
    --accent-soft: #f5e6e1;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background-color: var(--paper);
    color: var(--ink);
    line-height: 1.7;
}

.container {
    max-width: 860px;
    margin: 0 auto;
    padding: 0 20px 60px;
}

.navbar {
    max-width: 1100px;
    margin: 0 auto 48px auto;
    padding: 24px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 3px solid var(--line-strong);
}

.logo {
    text-decoration: none;
}

.logo-img {
    width: 190px;
    height: auto;
    display: block;
}

.nav-menu {
    display: flex;
    align-items: center;
    gap: 30px;
    list-style: none;
}

.nav-link {
    font-weight: 600;
    font-size: 14px;
    color: var(--ink);
    text-decoration: none;
    padding-bottom: 4px;
    transition: color 0.2s;
}

.nav-link:hover {
    color: var(--accent);
}

.search-form {
    display: flex;
    align-items: center;
}

.search-input {
    padding: 8px 4px;
    border: none;
    border-bottom: 1.5px solid var(--line-strong);
    font-size: 13px;
    font-family: inherit;
    outline: none;
    width: 170px;
    background: transparent;
    transition: border-color 0.2s;
}

.search-input:focus {
    border-color: var(--accent);
}

.search-button {
    background: none;
    border: none;
    border-bottom: 1.5px solid var(--line-strong);
    padding: 8px 6px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    color: var(--muted);
    transition: color 0.2s;
}

.search-button:hover {
    color: var(--accent);
}

.article-detail {
    background: var(--card);
    border-radius: 0;
    padding: 56px 70px;
    box-shadow: none;
    border: 1px solid var(--line);
    border-top: 3px solid var(--accent);
    position: relative;
}

.category {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: var(--accent);
    background: transparent;
    border-bottom: 2px solid var(--accent-soft);
    padding: 0 0 4px;
    margin-bottom: 22px;
}

.article-detail h1 {
    font-family: 'Newsreader', serif;
    font-size: 40px;
    font-weight: 500;
    margin-bottom: 18px;
    line-height: 1.25;
    color: var(--ink);
    border-bottom: 3px solid var(--line-strong);
    padding-bottom: 20px;
}

.meta {
    color: var(--muted);
    font-size: 13px;
    margin: 18px 0 36px;
}

.article-image-wrap {
    margin: 0 auto 42px auto;
    overflow: hidden;
    border: 1px solid var(--line);
}

.article-image-wrap img {
    width: 100%;
    max-height: 440px;
    object-fit: cover;
    filter: grayscale(0.08);
    display: block;
}

.content {
    font-family: 'Newsreader', serif;
    font-size: 19px;
    line-height: 1.85;
    color: #3c362c;
}

.content p:first-child {
    font-size: 21px;
    font-weight: 500;
    color: var(--ink);
}

.article-footer {
    margin-top: 50px;
    padding-top: 26px;
    border-top: 1px solid var(--line);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}

.back-link {
    color: var(--ink);
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    border: 1px solid var(--line-strong);
    padding: 9px 18px;
    border-radius: 2px;
    transition: background 0.2s, color 0.2s;
}

.back-link:hover {
    background: var(--ink);
    color: var(--paper);
}

.article-footer-brand {
    font-family: 'Newsreader', serif;
    font-size: 13px;
    color: var(--muted);
}

@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
    }

    .article-detail {
        padding: 40px 28px;
    }

    .article-detail h1 {
        font-size: 28px;
    }
}
</style>
@endsection


@section('content')
<nav class="navbar">
    <a href="{{ route('home') }}" class="logo">
        <img src="{{ asset('logo.png') }}" alt="Metra TV Logo" class="logo-img">
    </a>

    <ul class="nav-menu">
        <li><a href="#" class="nav-link">Berita</a></li>
        <li><a href="#" class="nav-link">Kegiatan</a></li>
        <li><a href="#" class="nav-link">Anggota</a></li>
        <li><a href="#" class="nav-link">Lainnya</a></li>
        <li>
            <form action="{{ route('news.search') }}" method="GET" class="search-form">
                <input type="text" name="q" class="search-input" placeholder="Cari berita..." required>
                <button type="submit" class="search-button">Cari</button>
            </form>
        </li>
    </ul>
</nav>

<div class="container">
    <article class="article-detail">
        <span class="category">{{ $news->category }}</span>
        <h1>{{ $news->title }}</h1>
        <div class="meta">{{ $news->published_at->format('d M Y H:i') }} WIB</div>

        @if($news->image)
        <div class="article-image-wrap">
            <img src="{{ $news->image }}" alt="{{ $news->title }}">
        </div>
        @endif

        <div class="content">
            {!! nl2br(e($news->content)) !!}
        </div>

        <div class="article-footer">
            <a href="{{ route('home') }}" class="back-link">Kembali ke Beranda</a>
            <span class="article-footer-brand">Metra TV</span>
        </div>
    </article>
</div>
@endsection