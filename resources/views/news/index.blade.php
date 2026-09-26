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

    .logo { text-decoration: none; display: flex; align-items: center; }
    .logo-img { width: 220px; height: 88px; object-fit: contain; display: block; }

    .nav-menu {
        display: flex;
        align-items: center;
        gap: 30px;
        list-style: none;
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
        letter-spacing: 0;
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
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: 28px;
    }
    .site-header-kicker{
        display:flex;
        align-items:center;
        gap:8px;
        font-size:12px;
        color: var(--muted);
    }
    .site-header-kicker::before{
        content:"";
        width:7px;
        height:7px;
        background: var(--accent);
        display:inline-block;
    }
    .site-header h1 {
        font-family: 'Newsreader', serif;
        font-size: 34px;
        font-weight: 500;
        color: var(--ink);
        letter-spacing: -0.01em;
        border-bottom: 3px solid var(--line-strong);
        padding-bottom: 18px;
    }

    /* ---------- Featured / lead story ---------- */
    .featured-section {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 32px;
        margin-bottom: 56px;
    }

    .featured-left {
        background: var(--card);
        border-radius: 0;
        overflow: hidden;
        box-shadow: none;
        border: 1px solid var(--line);
        transition: border-color 0.2s;
        display: flex;
        flex-direction: column;
    }
    .featured-left:hover {
        border-color: var(--line-strong);
    }
    .featured-left img {
        width: 100%;
        height: 290px;
        object-fit: cover;
        filter: grayscale(0.08);
    }
    .featured-content { padding: 28px; flex: 1; display: flex; flex-direction: column; }

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
        margin-bottom: 16px;
        align-self: flex-start;
    }

    .featured-content h2 {
        font-family: 'Newsreader', serif;
        font-size: 28px;
        font-weight: 500;
        margin-bottom: 12px;
        color: var(--ink);
        line-height: 1.3;
        flex: 1;
    }
    .featured-content .meta {
        color: var(--muted);
        font-size: 12.5px;
        margin-bottom: 16px;
        font-family: 'Inter', sans-serif;
    }
    .featured-content .excerpt {
        font-size: 15px;
        color: #4a4438;
        margin-bottom: 24px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.65;
        font-family: 'Newsreader', serif;
    }

    .read-more-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--paper);
        background: var(--ink);
        font-weight: 600;
        font-size: 13.5px;
        text-decoration: none;
        padding: 10px 22px;
        border-radius: 2px;
        border-bottom: 3px solid var(--accent);
        align-self: flex-start;
        transition: background 0.2s;
    }
    .read-more-btn:hover { background: var(--accent); border-bottom-color: var(--ink); }

    /* ---------- Sidebar list ---------- */
    .sidebar-news { display: flex; flex-direction: column; }

    .sidebar-card {
        background: transparent;
        border-radius: 0;
        border: none;
        border-bottom: 1px solid var(--line);
        transition: background 0.15s;
        text-decoration: none;
        color: inherit;
        display: flex;
        gap: 14px;
        padding: 16px 4px;
        align-items: flex-start;
    }
    .sidebar-card:first-child{ padding-top: 0; }
    .sidebar-card:hover {
        background: var(--card);
    }
    .sidebar-image {
        width: 84px;
        height: 84px;
        object-fit: cover;
        border-radius: 0;
        flex-shrink: 0;
        filter: grayscale(0.08);
    }
    .sidebar-card-body { display: flex; flex-direction: column; gap: 6px; }
    .sidebar-card .category-tag{ margin-bottom: 6px; }
    .sidebar-card h4 {
        font-family: 'Newsreader', serif;
        font-size: 15px;
        font-weight: 500;
        color: var(--ink);
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .sidebar-card .meta {
        font-size: 11.5px;
        color: var(--muted);
        font-family: 'Inter', sans-serif;
    }

    /* ---------- Section divider ---------- */
    .section-divider {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 26px;
    }
    .section-divider h2 {
        font-family: 'Newsreader', serif;
        font-size: 24px;
        font-weight: 500;
        color: var(--ink);
        white-space: nowrap;
    }
    .section-divider hr {
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

    .news-card-link { text-decoration: none; color: inherit; display: block; }

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

    .news-card-img-wrap { overflow: hidden; position: relative; }
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
    .news-card .meta {
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
    .news-card .excerpt {
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

    /* ---------- Footer ---------- */
    .company-footer {
        background: transparent;
        border-radius: 0;
        padding: 44px 0 0;
        margin-top: 30px;
        border: none;
        border-top: 3px solid var(--line-strong);
        display: grid;
        grid-template-columns: 1.6fr 1fr 1fr 1fr;
        gap: 40px;
        box-shadow: none;
    }

    .company-info h4 {
        font-family: 'Newsreader', serif;
        font-size: 22px;
        font-weight: 500;
        color: var(--ink);
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }
    .company-info h4 span {
        background: var(--accent);
        color: var(--paper);
        padding: 3px 12px;
        border-radius: 0;
        font-size: 14px;
        font-family: 'Inter', sans-serif;
        font-weight: 700;
    }
    .company-info p {
        color: var(--muted);
        margin-bottom: 22px;
        line-height: 1.75;
        font-size: 14px;
    }
    .social-links { display: flex; gap: 10px; }
    .social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        background: transparent;
        border: 1px solid var(--line-strong);
        border-radius: 0;
        color: var(--ink);
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
        transition: background 0.2s, color 0.2s;
    }
    .social-links a:hover { background: var(--ink); color: var(--paper); }

    .footer-links h5 {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: var(--muted);
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--line);
    }
    .footer-links ul { list-style: none; }
    .footer-links li {
        margin-bottom: 12px;
        font-size: 14px;
        color: var(--ink);
    }
    .footer-links a {
        color: var(--ink);
        text-decoration: none;
        transition: color 0.2s;
    }
    .footer-links a:hover { color: var(--accent); }

    .copyright {
        grid-column: 1 / -1;
        text-align: center;
        padding: 28px 0;
        margin-top: 8px;
        border-top: 1px solid var(--line);
        color: var(--muted);
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
        .company-footer { grid-template-columns: 1fr; padding: 32px 0 0; }
        .logo-img { width: 180px; height: 72px; }
    }

    @media (max-width: 640px) {
        .site-header h1 { font-size: 26px; }
        .featured-content h2 { font-size: 22px; }
        .csirt-badge, .csirt-badge > .container { flex-direction: column; align-items: flex-start; }
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
        <div class="container">
            <div class="csirt-chip">Metra TV Telkom Group</div>
            <div>
                <h3>Indonesia Computer Security Incident Response Team Community</h3>
                <p>Komunitas tanggap insiden siber Indonesia</p>
            </div>
        </div>
    </div>

    <div class="container">
        @php
            $sidebarNews = $news->take(3);
            $gridNews = $news->slice(3);
        @endphp

        <div class="site-header">
            <div class="site-header-kicker">Hari Ini</div>
            <h1>Berita Terbaru</h1>
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
                        <a href="{{ route('news.show', $headline->slug) }}" class="read-more-btn">Baca Selengkapnya</a>
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
                                    <span class="read-more">Baca Selengkapnya</span>
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
                    <a href="#" title="Facebook">FB</a>
                    <a href="#" title="Twitter">X</a>
                    <a href="#" title="YouTube">YT</a>
                    <a href="#" title="Instagram">IG</a>
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
                    <li>Telepon: +62 21 1234 5678</li>
                    <li>Email: info@metratv.co.id</li>
                    <li>Alamat: Jakarta, Indonesia</li>
                </ul>
            </div>
            <div class="copyright">
                © {{ date('Y') }} Metra TV Telkom Group. Seluruh hak cipta dilindungi.
            </div>
        </div>
    </div>
@endsection