@extends('layouts.admin')

@section('title', 'Kelola Berita')
@section('page_title', 'Kelola Berita')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
:root{
    --bg: #f4f7fb;
    --card: #ffffff;
    --border: #e6edf5;
    --text: #0f172a;
    --muted: #64748b;
    --primary: #4f46e5;
    --primary-soft: #eef2ff;
    --danger: #ef4444;
}

.news-page{
    font-family: 'Inter', sans-serif;
    padding: 40px;
    background: radial-gradient(circle at 20% 0%, #eef2ff, transparent 40%),
                radial-gradient(circle at 100% 0%, #e0f2fe, transparent 40%),
                var(--bg);
    min-height: 100vh;
}

.header-card{
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(12px);
    border: 1px solid var(--border);
    border-radius: 18px;
    padding: 28px 32px;
    margin-bottom: 32px;
    display:flex;
    justify-content:space-between;
    align-items:flex-end;
    flex-wrap:wrap;
    gap:20px;
    box-shadow:0 10px 40px rgba(0,0,0,.05);
}

.header-title small{
    text-transform:uppercase;
    font-size:11px;
    letter-spacing:.15em;
    color:var(--muted);
}

.header-title h1{
    font-family:'Instrument Serif', serif;
    font-size:42px;
    font-weight:400;
    margin:6px 0 0;
}

.header-title span{
    color:var(--primary);
    font-style:italic;
}

.btn{
    padding:10px 18px;
    border-radius:10px;
    font-size:14px;
    font-weight:600;
    text-decoration:none;
    transition:.2s ease;
    display:inline-flex;
    align-items:center;
    gap:6px;
    border:none;
    cursor:pointer;
}

.btn-primary{
    background:var(--primary);
    color:white;
    box-shadow:0 8px 20px rgba(79,70,229,.25);
}
.btn-primary:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 25px rgba(79,70,229,.35);
}

.btn-ghost{
    background:white;
    border:1px solid var(--border);
    color:var(--muted);
}
.btn-ghost:hover{
    background:#f8fafc;
    color:var(--text);
}

.btn-danger{
    background:#fff5f5;
    color:var(--danger);
    border:1px solid #fee2e2;
}
.btn-danger:hover{
    background:#fee2e2;
}

.news-card{
    background:var(--card);
    border-radius:18px;
    border:1px solid var(--border);
    box-shadow:0 10px 40px rgba(0,0,0,.05);
    overflow:hidden;
}

.card-toolbar{
    padding:20px 28px;
    border-bottom:1px solid var(--border);
    font-size:14px;
    color:var(--muted);
}

.news-table{
    width:100%;
    border-collapse:collapse;
}

.news-table th{
    padding:16px 28px;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:.08em;
    color:var(--muted);
    text-align:left;
    background:#f9fafc;
}

.news-table td{
    padding:20px 28px;
    border-top:1px solid var(--border);
    font-size:14px;
}

.news-table tbody tr{
    transition:.2s ease;
}

.news-table tbody tr:hover{
    background:#f9fbff;
    transform:scale(1.002);
}

.row-num{
    width:30px;
    height:30px;
    border-radius:50%;
    background:#f1f5f9;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:12px;
    font-weight:600;
}

.news-title{
    font-weight:600;
}

.news-title small{
    display:block;
    margin-top:4px;
    font-size:12px;
    color:var(--muted);
}

.category-badge{
    background:var(--primary-soft);
    color:var(--primary);
    padding:6px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}


.pagination-wrapper{
    padding:20px 28px;
    border-top:1px solid var(--border);
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:12px;
}

.pagination-wrapper nav .pagination{
    display:flex;
    gap:8px;
    margin:0;
}

.pagination-wrapper nav .page-link{
    width:36px;
    height:36px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:8px;
    border:1px solid var(--border);
    font-weight:600;
    font-size:14px;
    color:var(--muted);
    text-decoration:none;
    transition:.2s;
    background:white;
}

.pagination-wrapper nav .page-link:hover{
    background:#f1f5ff;
    color:var(--primary);
}

.pagination-wrapper nav .page-item.active .page-link{
    background:var(--primary);
    color:white;
    border-color:var(--primary);
}


.pagination svg{
    display:none !important;
    width:0 !important;
    height:0 !important;
}

.pagination a[rel="prev"],
.pagination a[rel="next"]{
    display:none !important;
}

.pagination .page-item:first-child,
.pagination .page-item:last-child{
    display:none !important;
}
</style>
@endpush

@section('content')
<div class="news-page">

<div class="header-card">
    <div class="header-title">
        <small>Manajemen Konten</small>
        <h1>Daftar <span>Berita</span></h1>
    </div>

    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
        + Tambah Berita
    </a>
</div>

<div class="news-card">

<div class="card-toolbar">
    Menampilkan {{ $news->firstItem() }}–{{ $news->lastItem() }} dari {{ $news->total() }} entri
</div>

<table class="news-table">
<thead>
<tr>
    <th>#</th>
    <th>Judul</th>
    <th>Kategori</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

@forelse($news as $index => $item)
<tr>
<td><div class="row-num">{{ $news->firstItem() + $index }}</div></td>

<td>
    <div class="news-title">
        {{ $item->title }}
        <small>{{ Str::limit($item->slug ?? '', 40) }}</small>
    </div>
</td>

<td><span class="category-badge">{{ $item->category }}</span></td>

<td>{{ $item->published_at?->format('d M Y') }}</td>

<td>
    <a href="{{ route('news.show', $item->slug) }}" target="_blank" class="btn btn-ghost">Lihat</a>
    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Yakin hapus berita ini?')">
            Hapus
        </button>
    </form>
</td>
</tr>
@empty
<tr>
<td colspan="5" style="text-align:center;padding:60px;">
Belum ada berita.
</td>
</tr>
@endforelse

</tbody>
</table>

@if($news->hasPages())
<div class="pagination-wrapper">
    <div>
        Halaman {{ $news->currentPage() }} dari {{ $news->lastPage() }}
    </div>
    {{ $news->links() }}
</div>
@endif

</div>
</div>
@endsection