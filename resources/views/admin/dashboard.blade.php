@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')

@section('content')

<style>
    :root{
        --bg: #fafafa;
        --surface: #ffffff;
        --border: #e7e7e9;
        --border-strong: #d4d4d8;
        --text: #18181b;
        --muted: #8b8b93;
    }

    .dash-page{
        font-family: 'Inter', sans-serif;
        color: var(--text);
        -webkit-font-smoothing: antialiased;
    }

    .dash-welcome{
        display:flex;
        justify-content:space-between;
        align-items:flex-end;
        flex-wrap:wrap;
        gap:16px;
        margin-bottom: 28px;
    }

    .dash-welcome h3{
        font-size: 24px;
        font-weight: 600;
        letter-spacing: -0.01em;
        margin: 0 0 6px;
    }

    .dash-welcome p{
        color: var(--muted);
        font-size: 14px;
        margin: 0;
    }

    .dash-welcome-date{
        font-size:13px;
        color: var(--muted);
        text-align:right;
    }

    .dash-welcome-date strong{
        display:block;
        color: var(--text);
        font-weight:600;
        font-size:14px;
    }

    /* Quick actions */
    .quick-actions{
        display:flex;
        gap:12px;
        flex-wrap:wrap;
        margin-bottom: 28px;
    }

    .quick-action{
        display:inline-flex;
        align-items:center;
        gap:8px;
        padding:10px 16px;
        font-size:13.5px;
        font-weight:500;
        text-decoration:none;
        border-radius:8px;
        border:1px solid var(--border-strong);
        color: var(--text);
        background: var(--surface);
        transition: background .15s ease, color .15s ease, border-color .15s ease;
    }

    .quick-action:hover{
        background: var(--bg);
    }

    .quick-action.primary{
        background: var(--text);
        color: var(--surface);
        border-color: var(--text);
    }

    .quick-action.primary:hover{
        background:#000;
    }

    .dash-grid {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .stat-card {
        flex: 1;
        min-width: 200px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 24px 26px;
    }

    .stat-card .stat-label {
        font-size: 13px;
        font-weight: 500;
        color: var(--muted);
        margin-bottom: 14px;
    }

    .stat-card .stat-value {
        font-size: 40px;
        font-weight: 600;
        color: var(--text);
        line-height: 1;
        letter-spacing: -0.01em;
    }

    .stat-card .stat-caption{
        font-size:12.5px;
        color: var(--muted);
        margin-top:10px;
    }

    .content-grid{
        display:flex;
        gap:20px;
        flex-wrap:wrap;
    }

    .news-card {
        flex: 2;
        min-width: 280px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 24px 26px;
    }

    .news-card h4 {
        font-size: 13px;
        font-weight: 600;
        color: var(--text);
        margin: 0 0 4px;
        padding-bottom: 14px;
        border-bottom: 1px solid var(--border);
        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    .news-card h4 a{
        font-size:12.5px;
        font-weight:500;
        color: var(--muted);
        text-decoration:none;
    }
    .news-card h4 a:hover{ color: var(--text); }

    .news-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .news-card ul li {
        padding: 13px 0;
        color: var(--text);
        font-size: 14.5px;
        font-weight: 400;
        border-bottom: 1px solid var(--border);
        line-height: 1.4;
    }

    .news-card ul li:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .news-item-title{
        display:block;
        margin-bottom: 5px;
    }

    .news-item-meta{
        display:flex;
        align-items:center;
        gap:8px;
        font-size:12px;
        color: var(--muted);
    }

    .news-item-meta .tag{
        border:1px solid var(--border-strong);
        border-radius:20px;
        padding:2px 8px;
    }

    .news-card .empty-note{
        font-size: 13.5px;
        color: var(--muted);
        padding: 6px 0 0;
    }

    /* Side widget: quick links / info */
    .side-card{
        flex: 1;
        min-width: 220px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 24px 26px;
    }

    .side-card h4 {
        font-size: 13px;
        font-weight: 600;
        color: var(--text);
        margin: 0 0 14px;
        padding-bottom: 14px;
        border-bottom: 1px solid var(--border);
    }

    .side-card ul{
        list-style:none;
        margin:0;
        padding:0;
    }

    .side-card ul li{
        padding: 11px 0;
        border-bottom: 1px solid var(--border);
    }

    .side-card ul li:last-child{
        border-bottom:none;
        padding-bottom:0;
    }

    .side-card ul li a{
        display:flex;
        justify-content:space-between;
        align-items:center;
        color: var(--text);
        text-decoration:none;
        font-size:13.5px;
        font-weight:500;
    }

    .side-card ul li a span.arrow{
        color: var(--muted);
        font-weight:400;
    }
</style>

<div class="dash-page">
    <div class="dash-welcome">
        @php($currentAdmin = auth()->user())
        <div>
            <h3>
                Halo, {{ $currentAdmin->name ?? 'Admin' }}
                @if($currentAdmin && isset($currentAdmin->role))
                    <span style="font-size:13px; font-weight:500; color:var(--muted); vertical-align:middle;">
                        &middot; {{ ucfirst($currentAdmin->role) }}
                    </span>
                @endif
            </h3>
            <p>Selamat datang di panel admin Metra TV/Mediacast.</p>
        </div>
        <div class="dash-welcome-date">
            Edisi
            <strong>{{ now()->translatedFormat('d F Y') }}</strong>
        </div>
    </div>

    <div class="quick-actions">
        <a href="{{ route('admin.news.create') }}" class="quick-action primary">+ Tambah Berita</a>
        <a href="{{ route('admin.news.index') }}" class="quick-action">Kelola Semua Berita</a>
        <a href="{{ route('home') }}" target="_blank" class="quick-action">Lihat Situs</a>
    </div>

    <div class="dash-grid">
        <div class="stat-card">
            <div class="stat-label">Total Berita</div>
            <div class="stat-value">{{ $totalNews }}</div>
            <div class="stat-caption">Artikel yang sudah dipublikasikan</div>
        </div>

        {{-- Kartu opsional berikut hanya tampil kalau variabelnya dikirim dari controller.
             Tambahkan di controller kalau mau menampilkan angka sungguhan, contoh:
             'totalCategories' => \App\Models\News::distinct('category')->count('category'),
             'newsThisMonth'   => \App\Models\News::whereMonth('published_at', now()->month)->count(), --}}
        @isset($totalCategories)
        <div class="stat-card">
            <div class="stat-label">Total Kategori</div>
            <div class="stat-value">{{ $totalCategories }}</div>
            <div class="stat-caption">Kategori berita aktif</div>
        </div>
        @endisset

        @isset($newsThisMonth)
        <div class="stat-card">
            <div class="stat-label">Berita Bulan Ini</div>
            <div class="stat-value">{{ $newsThisMonth }}</div>
            <div class="stat-caption">Dipublikasikan bulan {{ now()->translatedFormat('F Y') }}</div>
        </div>
        @endisset
    </div>

    <div class="content-grid">
        <div class="news-card">
            <h4>
                Berita Terbaru
                <a href="{{ route('admin.news.index') }}">Lihat semua</a>
            </h4>
            <ul>
                @forelse($latestNews as $item)
                    <li>
                        <span class="news-item-title">{{ $item->title }}</span>
                        <div class="news-item-meta">
                            @if($item->category)
                                <span class="tag">{{ $item->category }}</span>
                            @endif
                            @if($item->published_at)
                                <span>{{ $item->published_at->format('d M Y') }}</span>
                            @endif
                        </div>
                    </li>
                @empty
                    <li class="empty-note">Belum ada berita terbaru.</li>
                @endforelse
            </ul>
        </div>

        <div class="side-card">
            <h4>Tautan Cepat</h4>
            <ul>
                <li><a href="{{ route('admin.news.create') }}">Tambah Berita <span class="arrow">→</span></a></li>
                <li><a href="{{ route('admin.news.index') }}">Kelola Berita <span class="arrow">→</span></a></li>
                <li><a href="{{ route('home') }}" target="_blank">Lihat Beranda <span class="arrow">→</span></a></li>
            </ul>
        </div>
    </div>
</div>

@endsection