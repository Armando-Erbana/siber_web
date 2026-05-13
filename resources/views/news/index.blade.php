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

    .logo { text-decoration: none; display: flex; align-items: center; }
    .logo-img { width: 220px; height: 88px; object-fit: contain; display: block; }

    .nav-menu {
        display: flex;
        align-items: center;
        gap: 28px;
        list-style: none;
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
        font-size: 17px;
        white-space: nowrap;
        flex-shrink: 0;
        letter-spacing: -0.2px;
    }
    .csirt-badge h3 {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 3px;
        line-height: 1.4;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }
    .csirt-badge p {
        font-size: 13px;
        opacity: 0.8;
    }

    .site-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
    }
    .site-header h1 {
        font-size: 30px;
        font-weight: 800;
        color: #0b2b4a;
        letter-spacing: -0.5px;
    }
    .site-header-line {
        flex: 1;
        height: 2px;
        background: linear-gradient(to right, #e2e8f0, transparent);
        border-radius: 2px;
    }

    .featured-section {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
        margin-bottom: 48px;
    }

    .featured-left {
        background: white;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        border: 1px solid #e8eef6;
        transition: box-shadow 0.25s, border-color 0.25s;
        display: flex;
        flex-direction: column;
    }
    .featured-left:hover {
        box-shadow: 0 12px 32px rgba(0,0,0,0.1);
        border-color: #b0bec5;
    }
    .featured-left img {
        width: 100%;
        height: 290px;
        object-fit: cover;
    }
    .featured-content { padding: 26px; flex: 1; display: flex; flex-direction: column; }

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
        margin-bottom: 14px;
        align-self: flex-start;
    }

    .featured-content h2 {
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 10px;
        color: #0f172a;
        line-height: 1.35;
        flex: 1;
    }
    .featured-content .meta {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #94a3b8;
        font-size: 13px;
        margin-bottom: 14px;
    }
    .featured-content .meta::before {
        content: "🗓";
        font-size: 12px;
    }
    .featured-content .excerpt {
        font-size: 15px;
        color: #475569;
        margin-bottom: 22px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.65;
    }

    .read-more-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: white;
        background: #2563eb;
        font-weight: 600;
        font-size: 13.5px;
        text-decoration: none;
        padding: 9px 20px;
        border-radius: 30px;
        align-self: flex-start;
        transition: background 0.2s, transform 0.15s;
    }
    .read-more-btn:hover { background: #1d4ed8; transform: translateY(-1px); }

    .sidebar-news { display: flex; flex-direction: column; gap: 14px; }

    .sidebar-card {
        background: white;
        border-radius: 14px;
        border: 1px solid #e8eef6;
        transition: box-shadow 0.2s, border-color 0.2s;
        text-decoration: none;
        color: inherit;
        display: flex;
        gap: 14px;
        padding: 14px;
        align-items: flex-start;
    }
    .sidebar-card:hover {
        box-shadow: 0 8px 20px rgba(0,0,0,0.07);
        border-color: #b0bec5;
    }
    .sidebar-image {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 10px;
        flex-shrink: 0;
    }
    .sidebar-card-body { display: flex; flex-direction: column; gap: 6px; }
    .sidebar-card h4 {
        font-size: 14px;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.45;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .sidebar-card .meta {
        font-size: 11.5px;
        color: #94a3b8;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .section-divider {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
    }
    .section-divider h2 {
        font-size: 20px;
        font-weight: 800;
        color: #0b2b4a;
        white-space: nowrap;
    }
    .section-divider hr {
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

    .news-card-link { text-decoration: none; color: inherit; display: block; }

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

    .news-card-img-wrap { overflow: hidden; position: relative; }
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
    .news-card .meta {
        font-size: 12px;
        color: #94a3b8;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
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
    .news-card .excerpt {
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
        display: flex;
        align-items: center;
        gap: 4px;
        transition: gap 0.2s;
    }
    .read-more:hover { gap: 8px; }

    .company-footer {
        background: white;
        border-radius: 20px;
        padding: 48px 44px;
        margin-top: 40px;
        border: 1px solid #e8eef6;
        display: grid;
        grid-template-columns: 1.6fr 1fr 1fr 1fr;
        gap: 40px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.03);
    }

    .company-info h4 {
        font-size: 22px;
        font-weight: 800;
        color: #0b2b4a;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }
    .company-info h4 span {
        background: #2563eb;
        color: white;
        padding: 4px 14px;
        border-radius: 30px;
        font-size: 16px;
    }
    .company-info p {
        color: #64748b;
        margin-bottom: 22px;
        line-height: 1.75;
        font-size: 14px;
    }
    .social-links { display: flex; gap: 12px; }
    .social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        background: #f1f5f9;
        border-radius: 50%;
        color: #0b2b4a;
        text-decoration: none;
        font-size: 16px;
        transition: background 0.2s, transform 0.15s;
    }
    .social-links a:hover { background: #2563eb; color: white; transform: translateY(-2px); }

    .footer-links h5 {
        font-size: 15px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 18px;
    }
    .footer-links ul { list-style: none; }
    .footer-links li {
        margin-bottom: 11px;
        font-size: 14px;
        color: #475569;
    }
    .footer-links a {
        color: #475569;
        text-decoration: none;
        transition: color 0.2s;
    }
    .footer-links a:hover { color: #2563eb; }

    .copyright {
        grid-column: 1 / -1;
        text-align: center;
        padding-top: 28px;
        margin-top: 8px;
        border-top: 1px solid #e2e8f0;
        color: #94a3b8;
        font-size: 13px;
    }

    @media (max-width: 992px) {
        .featured-section { grid-template-columns: 1fr; }
        .sidebar-card { gap: 12px; }
        .company-footer { grid-template-columns: 1fr 1fr; }
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
        .company-footer { grid-template-columns: 1fr; padding: 32px 24px; }
        .logo-img { width: 180px; height: 72px; }
    }

    @media (max-width: 640px) {
        .site-header h1 { font-size: 26px; }
        .featured-content h2 { font-size: 20px; }
        .csirt-badge { flex-direction: column; align-items: flex-start; }
        .news-grid { grid-template-columns: 1fr; }
        .logo-img { width: 160px; height: 64px; }
    }
</style>
@endsection

@section('content')
    <nav class="navbar">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('logo.png') }}" alt="Metra TV Logo" class="logo-img" loading="lazy">
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
                    <input type="text" name="q" class="search-input" placeholder="Cari berita..." required>
                    <button type="submit" class="search-button"></button>
                </form>
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
        @php
            $sidebarNews = $news->take(3);
            $gridNews = $news->slice(3);
        @endphp

        <div class="site-header">
            <h1>Berita Terbaru</h1>
            <div class="site-header-line"></div>
        </div>

        @if($headline)
            <div class="featured-section">
                <div class="featured-left">
                    <img src="{{ $headline->image ?? 'https://picsum.photos/800/400?random=' . $headline->id }}" alt="{{ $headline->title }}">
                    <div class="featured-content">
                        <span class="category-tag">{{ $headline->category }}</span>
                        <h2>{{ $headline->title }}</h2>
                        <div class="meta">{{ $headline->published_at->format('d M Y, H:i') }} WIB</div>
                        <p class="excerpt">{{ $headline->excerpt }}</p>
                        <a href="{{ route('news.show', $headline->slug) }}" class="read-more-btn">Selengkapnya →</a>
                    </div>
                </div>
                
                <div class="sidebar-news">
                    @foreach($sidebarNews as $item)
                        <a href="{{ route('news.show', $item->slug) }}" class="sidebar-card">
                            <img
                                src="{{ $item->image ?? 'https://picsum.photos/90/90?random=' . $item->id }}"
                                alt="{{ $item->title }}"
                                class="sidebar-image"
                            >
                            <div class="sidebar-card-body">
                                <span class="category-tag">{{ $item->category }}</span>
                                <h4>{{ $item->title }}</h4>
                                <div class="meta">{{ $item->published_at->format('d M Y, H:i') }} WIB</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if($gridNews->count() > 0)
            <div class="section-divider">
                <h2>Berita Lainnya</h2>
                <hr>
            </div>
            <div class="news-grid">
                @foreach($gridNews as $item)
                    <a href="{{ route('news.show', $item->slug) }}" class="news-card-link">
                        <div class="news-card">
                            <div class="news-card-img-wrap">
                                <img src="{{ $item->image ?? 'https://picsum.photos/350/200?random=' . $item->id }}" alt="{{ $item->title }}">
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
        @endif

        <div class="company-footer">
            <div class="company-info">
                <h4><span>Metra TV</span> Telkom Group</h4>
                <p>Menjadi mitra terpercaya dalam layanan keamanan siber dan informasi digital, memberdayakan masyarakat Indonesia dengan teknologi dan edukasi.</p>
                <div class="social-links">
                    <a href="#" title="Facebook">📘</a>
                    <a href="#" title="Twitter">🐦</a>
                    <a href="#" title="YouTube">📺</a>
                    <a href="#" title="Instagram">📱</a>
                </div>
            </div>
            <div class="footer-links">
                <h5>Perusahaan</h5>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat &amp; Ketentuan</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h5>Layanan</h5>
                <ul>
                    <li><a href="#">Berlangganan</a></li>
                    <li><a href="#">Kontak Kami</a></li>
                    <li><a href="#">Pusat Bantuan</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h5>Kontak</h5>
                <ul>
                    <li>📞 +62 21 1234 5678</li>
                    <li>✉️ info@metratv.co.id</li>
                    <li>📍 Jakarta, Indonesia</li>
                </ul>
            </div>
            <div class="copyright">
                © {{ date('Y') }} Metra TV Telkom Group. Seluruh hak cipta dilindungi.
            </div>
        </div>
    </div>
@endsection