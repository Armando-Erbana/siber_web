@extends('layouts.admin')

@section('title', 'Kelola Berita')
@section('page_title', 'Kelola Berita')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
:root{
    --bg: #fafafa;
    --surface: #ffffff;
    --border: #e7e7e9;
    --border-strong: #d4d4d8;
    --text: #18181b;
    --muted: #8b8b93;
    --danger: #b91c1c;
    --danger-soft: #fdf1f1;
}

.news-page{
    font-family: 'Inter', sans-serif;
    padding: 48px;
    background: var(--bg);
    min-height: 100vh;
    color: var(--text);
    -webkit-font-smoothing: antialiased;
}

/* Header */
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:flex-end;
    flex-wrap:wrap;
    gap:20px;
    margin-bottom:40px;
}

.page-header h1{
    font-size:26px;
    font-weight:600;
    letter-spacing:-0.01em;
    margin:0 0 6px;
}

.page-header .subtitle{
    font-size:14px;
    color:var(--muted);
}

/* Buttons */
.btn{
    padding:10px 18px;
    font-size:14px;
    font-weight:500;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:6px;
    border:1px solid transparent;
    cursor:pointer;
    border-radius:8px;
    font-family:'Inter', sans-serif;
    line-height:1;
    transition:background .15s ease, border-color .15s ease, color .15s ease;
}

.btn-primary{
    background:var(--text);
    color:var(--surface);
}
.btn-primary:hover{
    background:#000;
}

.btn-text{
    background:transparent;
    color:var(--muted);
    padding:6px 4px;
    border-radius:4px;
}
.btn-text:hover{
    color:var(--text);
}

.btn-text-danger{
    background:transparent;
    color:var(--danger);
    padding:6px 4px;
    border-radius:4px;
}
.btn-text-danger:hover{
    color:#7f1414;
}

/* Content block */
.news-card{
    background:var(--surface);
    border:1px solid var(--border);
    border-radius:12px;
    overflow:hidden;
}

.card-toolbar{
    padding:18px 28px;
    border-bottom:1px solid var(--border);
    font-size:13.5px;
    color:var(--muted);
}

.card-toolbar strong{
    color:var(--text);
    font-weight:600;
}

.news-table{
    width:100%;
    border-collapse:collapse;
}

.news-table th{
    padding:14px 28px;
    font-size:12px;
    color:var(--muted);
    text-align:left;
    border-bottom:1px solid var(--border);
    font-weight:500;
}

.news-table td{
    padding:20px 28px;
    border-bottom:1px solid var(--border);
    font-size:14px;
    vertical-align:top;
}

.news-table tbody tr:last-child td{
    border-bottom:none;
}

.news-table tbody tr:hover{
    background:#fbfbfb;
}

.row-num{
    color:var(--muted);
    font-size:13px;
    font-variant-numeric: tabular-nums;
}

.news-title{
    font-weight:500;
    max-width:420px;
}

.news-title small{
    display:block;
    margin-top:4px;
    font-size:12.5px;
    font-weight:400;
    color:var(--muted);
}

.category-badge{
    display:inline-block;
    color:var(--text);
    font-size:12px;
    font-weight:500;
    padding:4px 10px;
    border:1px solid var(--border-strong);
    border-radius:20px;
    white-space:nowrap;
}

.news-date{
    color:var(--muted);
    white-space:nowrap;
    font-size:13.5px;
}

.action-group{
    display:flex;
    gap:14px;
    align-items:center;
    flex-wrap:wrap;
}

/* Pagination */
.pagination-wrapper{
    padding:18px 28px;
    border-top:1px solid var(--border);
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:12px;
    font-size:13px;
    color:var(--muted);
}

.pagination-wrapper nav .pagination{
    display:flex;
    gap:2px;
    margin:0;
}

.pagination-wrapper nav .page-link{
    min-width:30px;
    height:30px;
    padding:0 6px;
    display:flex;
    align-items:center;
    justify-content:center;
    border:1px solid transparent;
    border-radius:6px;
    font-weight:500;
    font-size:13px;
    color:var(--muted);
    text-decoration:none;
}

.pagination-wrapper nav .page-link:hover{
    background:var(--bg);
    color:var(--text);
}

.pagination-wrapper nav .page-item.active .page-link{
    background:var(--text);
    color:var(--surface);
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

.empty-state{
    text-align:center;
    padding:70px 20px;
    color:var(--muted);
    font-size:14.5px;
}
</style>
@endpush

@section('content')
<div class="news-page">

<div class="page-header">
    <div>
        <h1>Kelola Berita</h1>
        <div class="subtitle">Semua artikel yang telah dipublikasikan</div>
    </div>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
        + Tambah Berita
    </a>
</div>

<div class="news-card">

<div class="card-toolbar">
    Menampilkan {{ $news->firstItem() }}–{{ $news->lastItem() }} dari <strong>{{ $news->total() }}</strong> entri
</div>

<table class="news-table">
<thead>
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Kategori</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

@forelse($news as $index => $item)
<tr>
<td><span class="row-num">{{ $news->firstItem() + $index }}</span></td>

<td>
    <div class="news-title">
        {{ $item->title }}
        <small>{{ Str::limit($item->slug ?? '', 40) }}</small>
    </div>
</td>

<td><span class="category-badge">{{ $item->category }}</span></td>

<td class="news-date">{{ $item->published_at?->format('d M Y') }}</td>

<td>
    <div class="action-group">
        <a href="{{ route('news.show', $item->slug) }}" target="_blank" class="btn-text">Lihat</a>
        <a href="{{ route('admin.news.edit', $item->id) }}" class="btn-text">Edit</a>

        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-text-danger" onclick="return confirm('Yakin hapus berita ini?')">
                Hapus
            </button>
        </form>
    </div>
</td>
</tr>
@empty
<tr>
<td colspan="5">
    <div class="empty-state">Belum ada berita.</div>
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