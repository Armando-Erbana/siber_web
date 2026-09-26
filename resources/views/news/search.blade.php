@extends('layouts.app')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;0,6..72,600;1,6..72,400&family=Inter:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root{
        --ink: #171310;
        --paper: #f6f3ec;
        --card: #ffffff;
        --line: #ddd6c6;
        --line-strong: #171310;
        --muted: #726a5a;
        --accent: #9c1c1c;
        --accent-soft: #f5e6e1;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--paper);
        color: var(--ink);
        line-height: 1.6;
        padding: 0 20px 60px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* ---------- Navbar ---------- */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 0;
        margin-bottom: 0;
        border-bottom: 3px solid var(--line-strong);
        flex-wrap: wrap;
        gap: 16px;
    }

    .logo {
        font-family: 'Newsreader', serif;
        font-size: 22px;
        font-weight: 500;
        color: var(--ink);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }
    .logo span {
        background: var(--accent);
        color: var(--paper);
        padding: 4px 12px;
        border-radius: 0;
        font-size: 14px;
        font-family: 'Inter', sans-serif;
        font-weight: 700;
    }

    .nav-menu {
        display: flex;
        align-items: center;
        gap: 30px;
        list-style: none;
        flex-wrap: wrap;
    }

    .nav-item { position: relative; }

    .nav-link {
        font-weight: 600;
        font-size: 14px;
        color: var(--ink);
        text-decoration: none;
        padding: 8px 0;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: color 0.2s;
    }
    .nav-link:hover { color: var(--accent); }

    .has-dropdown .nav-link::after {
        content: "▾";
        font-size: 11px;
        color: var(--muted);
        transition: color 0.2s;
    }
    .has-dropdown:hover .nav-link::after { color: var(--accent); }

    .dropdown-menu {
        position: absolute;
        top: calc(100% + 10px);
        left: 0;
        background: var(--card);
        border-radius: 0;
        box-shadow: none;
        padding: 4px 0;
        min-width: 190px;
        border: 1px solid var(--line-strong);
        opacity: 0;
        visibility: hidden;
        transform: translateY(4px);
        transition: all 0.15s ease;
        z-index: 100;
    }
    .has-dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        padding: 10px 18px;
        color: var(--ink);
        text-decoration: none;
        display: block;
        font-size: 13.5px;
        font-weight: 500;
        border-top: 1px solid var(--line);
        transition: background 0.15s, color 0.15s;
    }
    .dropdown-item:first-child{ border-top: none; }
    .dropdown-item:hover { background: var(--accent-soft); color: var(--accent); }

    .btn-login {
        background: var(--ink);
        color: var(--paper) !important;
        padding: 10px 22px;
        border-radius: 2px;
        font-weight: 600;
        font-size: 14px;
        border-bottom: 3px solid var(--accent);
        transition: background 0.2s;
    }
    .btn-login:hover { background: var(--accent); border-bottom-color: var(--ink); }

    .inactive { opacity: 0.45; cursor: not-allowed; }
    .inactive .nav-link { pointer-events: none; }

    .search-form { display: flex; align-items: center; }
    .search-input {
        padding: 8px 4px;
        border: none;
        border-bottom: 1.5px solid var(--line-strong);
        border-radius: 0;
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
    .search-button::after{ content: "Cari"; }
    .search-button:hover { color: var(--accent); }

    /* ---------- CSIRT strap ---------- */
    .csirt-badge {
        background: var(--ink);
        color: var(--paper);
        padding: 16px 0;
        margin-bottom: 40px;
        border-radius: 0;
        display: flex;
        align-items: center;
        gap: 22px;
        box-shadow: none;
        border-bottom: 3px solid var(--accent);
    }
    .csirt-badge > .container{
        display:flex;
        align-items:center;
        gap:22px;
        width:100%;
    }
    .csirt-chip {
        background: var(--accent);
        color: var(--paper);
        padding: 9px 18px;
        border-radius: 0;
        font-weight: 700;
        font-size: 14px;
        white-space: nowrap;
        flex-shrink: 0;
        font-family: 'Inter', sans-serif;
    }
    .csirt-badge h3 {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 3px;
        line-height: 1.4;
        text-transform: none;
        letter-spacing: 0;
        font-family: 'Inter', sans-serif;
    }
    .csirt-badge p {
        font-size: 13px;
        opacity: 0.65;
    }

    /* ---------- Section header ---------- */
    .site-header {
        margin-bottom: 28px;
    }
    .site-header h1 {
        font-family: 'Newsreader', serif;
        font-size: 32px;
        font-weight: 500;
        color: var(--ink);
        letter-spacing: -0.01em;
        margin-bottom: 8px;
    }
    .site-header .query {
        font-size: 14.5px;
        font-weight: 400;
        color: var(--muted);
    }
    .site-header .query strong {
        color: var(--ink);
        font-weight: 600;
        font-family: 'Newsreader', serif;
    }

    .results-bar {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 26px;
        padding-bottom: 18px;
        border-bottom: 3px solid var(--line-strong);
    }
    .results-bar .count {
        font-size: 13px;
        font-weight: 600;
        color: var(--muted);
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }
    .results-bar hr {
        flex: 1;
        border: none;
        border-top: 1px solid var(--line);
    }

    /* ---------- Article grid ---------- */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 28px;
        margin-bottom: 60px;
    }

    .news-card-link {
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }

    .news-card {
        background: var(--card);
        border-radius: 0;
        overflow: hidden;
        border: 1px solid var(--line);
        transition: border-color 0.2s;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .news-card:hover {
        border-color: var(--line-strong);
    }

    .news-card-img-wrap { overflow: hidden; }
    .news-card img {
        width: 100%;
        height: 195px;
        object-fit: cover;
        display: block;
        filter: grayscale(0.08);
    }

    .news-card-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .category-tag {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--accent);
        background: transparent;
        border-bottom: 2px solid var(--accent-soft);
        padding: 0 0 4px;
        margin-bottom: 12px;
        align-self: flex-start;
    }

    .meta {
        font-size: 12px;
        color: var(--muted);
        margin-bottom: 12px;
        font-family: 'Inter', sans-serif;
    }

    .news-card h3 {
        font-family: 'Newsreader', serif;
        font-size: 19px;
        font-weight: 500;
        margin-bottom: 10px;
        color: var(--ink);
        line-height: 1.4;
        transition: color 0.2s;
    }
    .news-card-link:hover .news-card h3 { color: var(--accent); }

    .excerpt {
        font-size: 13.5px;
        color: #4a4438;
        line-height: 1.65;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
        margin-bottom: 18px;
    }

    .news-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 16px;
        border-top: 1px solid var(--line);
        margin-top: auto;
    }

    .read-more {
        color: var(--ink);
        font-weight: 600;
        text-decoration: none;
        font-size: 12.5px;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        border-bottom: 2px solid var(--accent-soft);
        padding-bottom: 2px;
        transition: border-color 0.2s, color 0.2s;
    }
    .read-more:hover { border-color: var(--accent); color: var(--accent); }

    /* ---------- No results ---------- */
    .no-results {
        text-align: center;
        padding: 70px 24px;
        background: var(--card);
        border-radius: 0;
        border: 1px solid var(--line);
        border-top: 3px solid var(--accent);
        color: var(--muted);
    }
    .no-results h3 {
        font-family: 'Newsreader', serif;
        font-size: 22px;
        font-weight: 500;
        color: var(--ink);
        margin-bottom: 10px;
    }
    .no-results p {
        font-size: 14px;
        color: var(--muted);
    }

    @media (max-width: 768px) {
        .navbar { flex-direction: column; align-items: flex-start; }
        .nav-menu { flex-direction: column; align-items: flex-start; width: 100%; gap: 14px; }
        .nav-item { width: 100%; }
        .dropdown-menu {
            position: static;
            box-shadow: none;
            border: none;
            padding-left: 16px;
            opacity: 1;
            visibility: visible;
            transform: none;
            display: none;
        }
        .has-dropdown:hover .dropdown-menu { display: block; }
        .search-form { width: 100%; }
        .search-input { width: 100%; }
        .btn-login { width: 100%; text-align: center; }
    }

    @media (max-width: 640px) {
        .site-header h1 { font-size: 26px; }
        .csirt-badge, .csirt-badge > .container { flex-direction: column; align-items: flex-start; }
        .news-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
    <nav class="navbar">
        <a href="{{ route('home') }}" class="logo">
            <span>Metra TV</span> Telkom Group
        </a>
        <ul class="nav-menu">
            <li class="nav-item has-dropdown">
                <a href="#" class="nav-link">Berita</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Berita Terkini</a>
                    <a href="#" class="dropdown-item">Berita Populer</a>
                    <a href="#" class="dropdown-item">Rilis Pers</a>
                </div>
            </li>
            <li class="nav-item has-dropdown">
                <a href="#" class="nav-link">Kegiatan</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Workshop</a>
                    <a href="#" class="dropdown-item">Webinar</a>
                    <a href="#" class="dropdown-item">Pelatihan</a>
                </div>
            </li>
            <li class="nav-item inactive">
                <a href="#" class="nav-link">Anggota</a>
            </li>
            <li class="nav-item has-dropdown">
                <a href="#" class="nav-link">Lainnya</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Berlangganan</a>
                    <a href="#" class="dropdown-item">Tentang Kami</a>
                </div>
            </li>
            <li class="nav-item">
                <form action="{{ route('news.search') }}" method="GET" class="search-form">
                    <input type="text" name="q" class="search-input" placeholder="Cari berita..." value="{{ $query ?? '' }}" required>
                    <button type="submit" class="search-button"></button>
                </form>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link btn-login">Login</a>
            </li>
        </ul>
    </nav>

    <div class="csirt-badge">
        <div class="container">
            <div class="csirt-chip">Metra TV Telkom Group</div>
            <div>
                <h3>Indonesia Computer Security Incident Response Team Community</h3>
                <p>Komunitas tanggap insiden siber Indonesia</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="site-header">
            <h1>Hasil Pencarian</h1>
            @if($query)
            <div class="query">Menampilkan hasil untuk: <strong>"{{ $query }}"</strong></div>
            @endif
        </div>

        @if($results->count() > 0)
            <div class="results-bar">
                <span class="count">{{ $results->count() }} berita ditemukan</span>
                <hr>
            </div>
            <div class="news-grid">
                @foreach($results as $item)
                <a href="{{ route('news.show', $item->slug) }}" class="news-card-link" target="_blank" rel="noopener">
                    <div class="news-card">
                        <div class="news-card-img-wrap">
                            <img
                                src="{{ $item->image ?? 'https://cdn.phototourl.com/uploads/2026-02-12-2ddab8d4-3fa2-4005-a9e5-0d3c5d14abf0.jpg' }}"
                                alt="{{ $item->title }}"
                            >
                        </div>
                        <div class="news-card-body">
                            <span class="category-tag">{{ $item->category }}</span>
                            <div class="meta">{{ $item->published_at->format('d M Y, H:i') }} WIB</div>
                            <h3>{{ $item->title }}</h3>
                            <p class="excerpt">{{ $item->excerpt }}</p>
                            <div class="news-card-footer">
                                <span class="read-more">Baca Selengkapnya</span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        @else
            <div class="no-results">
                <h3>
                    @if($query)
                        Tidak ada hasil untuk "{{ $query }}"
                    @else
                        Silakan masukkan kata kunci pencarian
                    @endif
                </h3>
                <p>
                    @if($query)
                        Coba kata kunci lain atau periksa ejaan Anda
                    @else
                        Gunakan kolom pencarian di atas untuk menemukan berita
                    @endif
                </p>
            </div>
        @endif
    </div>
@endsection