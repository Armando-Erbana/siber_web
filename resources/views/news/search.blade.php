@extends('layouts.app')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f4f6fb;
        color: #1e293b;
        line-height: 1.6;
        padding: 0 20px 60px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 0;
        margin-bottom: 32px;
        border-bottom: 1px solid #e2e8f0;
        flex-wrap: wrap;
        gap: 16px;
    }

    .logo {
        font-size: 22px;
        font-weight: 800;
        color: #0b2b4a;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 8px;
        flex-shrink: 0;
    }
    .logo span {
        background: #2563eb;
        color: white;
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 16px;
    }

    .nav-menu {
        display: flex;
        align-items: center;
        gap: 28px;
        list-style: none;
        flex-wrap: wrap;
    }

    .nav-item { position: relative; }

    .nav-link {
        font-weight: 600;
        font-size: 14px;
        color: #1e293b;
        text-decoration: none;
        padding: 8px 0;
        display: flex;
        align-items: center;
        gap: 4px;
        transition: color 0.2s;
    }
    .nav-link:hover { color: #2563eb; }

    .has-dropdown .nav-link::after {
        content: "▾";
        font-size: 11px;
        color: #94a3b8;
        transition: color 0.2s;
    }
    .has-dropdown:hover .nav-link::after { color: #2563eb; }

    .dropdown-menu {
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        background: white;
        border-radius: 12px;
        box-shadow: 0 16px 32px rgba(0,0,0,0.08);
        padding: 8px 0;
        min-width: 190px;
        border: 1px solid #e8eef6;
        opacity: 0;
        visibility: hidden;
        transform: translateY(6px);
        transition: all 0.18s ease;
        z-index: 100;
    }
    .has-dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        padding: 9px 18px;
        color: #334155;
        text-decoration: none;
        display: block;
        font-size: 13.5px;
        font-weight: 500;
        transition: background 0.15s, color 0.15s;
    }
    .dropdown-item:hover { background: #f1f5f9; color: #2563eb; }

    .btn-login {
        background: #0b2b4a;
        color: white !important;
        padding: 9px 22px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
        transition: background 0.2s;
    }
    .btn-login:hover { background: #163d63; }

    .inactive { opacity: 0.5; cursor: not-allowed; }
    .inactive .nav-link { pointer-events: none; }

    .search-form { display: flex; align-items: center; }
    .search-input {
        padding: 8px 16px;
        border: 1.5px solid #e2e8f0;
        border-radius: 30px;
        font-size: 13px;
        font-family: inherit;
        outline: none;
        width: 200px;
        background: white;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .search-input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,0.08);
    }
    .search-button {
        background: none;
        border: none;
        margin-left: -38px;
        cursor: pointer;
        font-size: 15px;
        color: #94a3b8;
        transition: color 0.2s;
    }
    .search-button:hover { color: #2563eb; }

    .csirt-badge {
        background: linear-gradient(135deg, #0b2b4a 0%, #163d63 100%);
        color: white;
        padding: 18px 28px;
        margin-bottom: 36px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 6px 20px rgba(11,43,74,0.18);
    }
    .csirt-chip {
        background: white;
        color: #0b2b4a;
        padding: 10px 18px;
        border-radius: 10px;
        font-weight: 800;
        font-size: 16px;
        white-space: nowrap;
        flex-shrink: 0;
    }
    .csirt-badge h3 {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 3px;
        line-height: 1.5;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }
    .csirt-badge p {
        font-size: 13px;
        opacity: 0.8;
    }

    .site-header {
        margin-bottom: 28px;
    }
    .site-header h1 {
        font-size: 28px;
        font-weight: 800;
        color: #0b2b4a;
        letter-spacing: -0.5px;
        margin-bottom: 6px;
    }
    .site-header .query {
        font-size: 15px;
        font-weight: 400;
        color: #64748b;
    }
    .site-header .query strong {
        color: #0b2b4a;
        font-weight: 700;
    }

    .results-bar {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
    }
    .results-bar .count {
        font-size: 14px;
        font-weight: 600;
        color: #64748b;
        white-space: nowrap;
    }
    .results-bar hr {
        flex: 1;
        border: none;
        border-top: 2px solid #e2e8f0;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 24px;
        margin-bottom: 60px;
    }

    .news-card-link {
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }

    .news-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e8eef6;
        transition: box-shadow 0.25s, border-color 0.25s, transform 0.2s;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .news-card:hover {
        box-shadow: 0 16px 36px rgba(0,0,0,0.1);
        border-color: #b0bec5;
        transform: translateY(-3px);
    }

    .news-card-img-wrap { overflow: hidden; }
    .news-card img {
        width: 100%;
        height: 195px;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }
    .news-card:hover img { transform: scale(1.06); }

    .news-card-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .category-tag {
        display: inline-flex;
        align-items: center;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #2563eb;
        background: #dbeafe;
        padding: 4px 12px;
        border-radius: 30px;
        margin-bottom: 10px;
        align-self: flex-start;
    }

    .meta {
        font-size: 12px;
        color: #94a3b8;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .news-card h3 {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #0f172a;
        line-height: 1.45;
        transition: color 0.2s;
    }
    .news-card-link:hover .news-card h3 { color: #2563eb; }

    .excerpt {
        font-size: 13.5px;
        color: #64748b;
        line-height: 1.65;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
        margin-bottom: 16px;
    }

    .news-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 14px;
        border-top: 1px solid #f1f5f9;
        margin-top: auto;
    }

    .read-more {
        color: #2563eb;
        font-weight: 700;
        text-decoration: none;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: gap 0.2s;
    }
    .read-more:hover { gap: 8px; }

    .no-results {
        text-align: center;
        padding: 64px 24px;
        background: white;
        border-radius: 16px;
        border: 1px solid #e8eef6;
        color: #64748b;
    }
    .no-results .icon {
        font-size: 48px;
        margin-bottom: 16px;
        opacity: 0.5;
    }
    .no-results h3 {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 8px;
    }
    .no-results p {
        font-size: 15px;
        color: #94a3b8;
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
        .site-header h1 { font-size: 24px; }
        .csirt-badge { flex-direction: column; align-items: flex-start; }
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
        <div class="csirt-chip">Metra TV Telkom Group</div>
        <div>
            <h3>Indonesia Computer Security Incident Response Team Community</h3>
            <p>Komunitas tanggap insiden siber Indonesia</p>
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
                                <span class="read-more">Selengkapnya →</span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        @else
            <div class="no-results">
                <div class="icon"></div>
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