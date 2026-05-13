@extends('layouts.app')

@section('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Source+Serif+4:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<style>
:root {
    --ink: #0d0d0d;
    --ink-muted: #4a4a4a;
    --ink-light: #8a8a8a;
    --paper: #faf8f4;
    --paper-warm: #f2ede4;
    --accent: #c8102e;
    --accent-soft: #fdedef;
    --blue: #1a3a8f;
    --blue-soft: #e8edf8;
    --border: #e0dbd1;
    --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
    --shadow-md: 0 8px 32px rgba(0,0,0,0.08);
    --shadow-lg: 0 20px 60px rgba(0,0,0,0.1);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'DM Sans', sans-serif;
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
    border-bottom: 2px solid var(--ink);
    position: relative;
}

.navbar::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 20px;
    right: 20px;
    height: 1px;
    background: var(--border);
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
    gap: 28px;
    list-style: none;
}

.nav-link {
    font-weight: 600;
    font-size: 13px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--ink);
    text-decoration: none;
    border-bottom: 2px solid transparent;
    padding-bottom: 4px;
    transition: 0.2s;
}

.nav-link:hover {
    color: var(--accent);
    border-bottom-color: var(--accent);
}

.search-form {
    display: flex;
    align-items: center;
}

.search-input {
    padding: 8px 14px;
    border: 1.5px solid var(--border);
    font-size: 13px;
    outline: none;
    width: 200px;
    transition: 0.2s;
}

.search-input:focus {
    border-color: var(--accent);
}

.search-button {
    background: none;
    border: none;
    margin-left: -30px;
    cursor: pointer;
}

.article-detail {
    background: white;
    border-radius: 2px;
    padding: 60px 70px;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border);
    position: relative;
    animation: fadeUp 0.5s ease both;
}

.article-detail::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--accent);
}

.category {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: white;
    background: var(--accent);
    padding: 5px 14px;
    margin-bottom: 20px;
}

.article-detail h1 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 20px;
    line-height: 1.2;
}

.title-rule {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 18px;
}

.title-rule::before {
    content: '';
    width: 48px;
    height: 3px;
    background: var(--accent);
}

.title-rule::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--border);
}

.meta {
    color: var(--ink-light);
    font-size: 13px;
    margin-bottom: 36px;
}

.article-image-wrap {
    margin: 0 auto 42px auto;
    overflow: hidden;
}

.article-image-wrap img {
    width: 100%;
    max-height: 440px;
    object-fit: cover;
    transition: transform 0.5s;
}

.article-image-wrap img:hover {
    transform: scale(1.02);
}

.content {
    font-family: 'Source Serif 4', Georgia, serif;
    font-size: 19px;
    line-height: 1.9;
    color: var(--ink-muted);
}

.content p:first-child {
    font-size: 21px;
    font-weight: 400;
    color: var(--ink);
}

.article-footer {
    margin-top: 50px;
    padding-top: 28px;
    border-top: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.back-link {
    color: var(--accent);
    text-decoration: none;
    font-weight: 600;
    border: 1.5px solid var(--accent);
    padding: 8px 16px;
    transition: 0.2s;
}

.back-link:hover {
    background: var(--accent);
    color: white;
}

.article-footer-brand {
    font-family: 'Playfair Display', serif;
    font-size: 13px;
    color: var(--ink-light);
    font-style: italic;
}

@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
    }

    .article-detail {
        padding: 40px 30px;
    }

    .article-detail h1 {
        font-size: 30px;
    }
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(18px); }
    to { opacity: 1; transform: translateY(0); }
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
                <button type="submit" class="search-button">🔍</button>
            </form>
        </li>
    </ul>
</nav>

<div class="container">
    <article class="article-detail">
        <span class="category">{{ $news->category }}</span>
        <h1>{{ $news->title }}</h1>
        <div class="title-rule"></div>
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
            <a href="{{ route('home') }}" class="back-link">← Kembali ke Beranda</a>
            <span class="article-footer-brand">Metra TV</span>
        </div>
    </article>
</div>
@endsection