@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')

@section('content')

<style>
    .dash-welcome {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 100%);
        border-radius: 12px;
        padding: 28px 32px;
        margin-bottom: 24px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .dash-welcome::after {
        content: '📺';
        position: absolute;
        right: 32px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 64px;
        opacity: 0.12;
    }

    .dash-welcome h3 {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 6px;
        letter-spacing: -0.01em;
    }

    .dash-welcome p {
        color: rgba(255,255,255,0.65);
        font-size: 14px;
        margin: 0;
    }

    .dash-grid {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .stat-card {
        flex: 1;
        min-width: 200px;
        background: white;
        border-radius: 12px;
        padding: 24px 28px;
        border: 1px solid #e8edf4;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: #c8102e;
        border-radius: 4px 0 0 4px;
    }

    .stat-card .stat-label {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #94a3b8;
        margin-bottom: 10px;
    }

    .stat-card .stat-value {
        font-size: 48px;
        font-weight: 900;
        color: #0f172a;
        line-height: 1;
        letter-spacing: -0.02em;
    }

    .stat-card .stat-icon {
        position: absolute;
        right: 20px;
        top: 20px;
        font-size: 28px;
        opacity: 0.15;
    }

    .news-card {
        flex: 2;
        min-width: 280px;
        background: white;
        border-radius: 12px;
        padding: 24px 28px;
        border: 1px solid #e8edf4;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .news-card h4 {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #94a3b8;
        margin-bottom: 16px;
    }

    .news-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .news-card ul li {
        padding: 10px 0;
        color: #334155;
        font-size: 14px;
        font-weight: 500;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        line-height: 1.5;
    }

    .news-card ul li:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .news-card ul li::before {
        content: '';
        width: 6px;
        height: 6px;
        background: #c8102e;
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 6px;
    }
</style>

<div class="dash-welcome">
    <h3>Halo Admin </h3>
    <p>Selamat datang di panel admin Metra TV/Mediacast.</p>
</div>

<div class="dash-grid">
    <div class="stat-card">
        <span class="stat-icon">📰</span>
        <div class="stat-label">Total Berita</div>
        <div class="stat-value">{{ $totalNews }}</div>
    </div>

    <div class="news-card">
        <h4>Berita Terbaru</h4>
        <ul>
            @foreach($latestNews as $item)
                <li>{{ $item->title }}</li>
            @endforeach
        </ul>
    </div>
</div>

@endsection