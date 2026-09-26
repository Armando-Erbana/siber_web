@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')

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
}

.form-page{
    font-family: 'Inter', sans-serif;
    padding: 48px;
    background: var(--bg);
    min-height: 100vh;
    color: var(--text);
    -webkit-font-smoothing: antialiased;
}

.page-header{
    margin-bottom: 32px;
}

.page-header h1{
    font-size:24px;
    font-weight:600;
    letter-spacing:-0.01em;
    margin:0 0 6px;
}

.page-header .subtitle{
    font-size:14px;
    color:var(--muted);
}

.card{
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 36px 40px;
    max-width: 720px;
}

.form-group{
    margin-bottom: 22px;
}

.form-group label{
    display:block;
    font-size:13px;
    font-weight:500;
    color: var(--text);
    margin-bottom: 8px;
}

input[type="text"],
input[type="datetime-local"],
textarea{
    width:100%;
    padding: 11px 14px;
    border: 1px solid var(--border-strong);
    border-radius: 8px;
    font-size:14px;
    font-family:'Inter', sans-serif;
    color: var(--text);
    background: var(--surface);
    outline: none;
    transition: border-color .15s ease;
}

input[type="text"]:focus,
input[type="datetime-local"]:focus,
textarea:focus{
    border-color: var(--text);
}

textarea{
    min-height: 120px;
    resize: vertical;
    line-height: 1.6;
}

textarea[name="content"]{
    min-height: 220px;
}

.form-group small{
    display:block;
    margin-top:6px;
    font-size:12.5px;
    color: var(--danger) !important;
}

.image-preview{
    margin: 4px 0 22px;
}

.image-preview img{
    width: 220px;
    height: 140px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid var(--border);
    display:block;
}

.image-preview .caption{
    font-size:12px;
    color: var(--muted);
    margin-top:8px;
}

.form-actions{
    display:flex;
    gap:12px;
    margin-top: 8px;
    padding-top: 24px;
    border-top: 1px solid var(--border);
}

.btn{
    padding:11px 22px;
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
    transition: background .15s ease, border-color .15s ease, color .15s ease;
}

.btn-primary{
    background: var(--text);
    color: var(--surface);
    border: none;
}
.btn-primary:hover{
    background:#000;
}

.btn-gray{
    background: transparent;
    color: var(--text);
    border: 1px solid var(--border-strong);
}
.btn-gray:hover{
    background: var(--bg);
}
</style>
@endpush

@section('content')
<div class="form-page">

<div class="page-header">
    <h1>Edit Berita</h1>
    <div class="subtitle">{{ $news->title }}</div>
</div>

<div class="card">
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="category" value="{{ old('category', $news->category) }}">
            @error('category') <small>{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}">
            @error('title') <small>{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Excerpt</label>
            <textarea name="excerpt">{{ old('excerpt', $news->excerpt) }}</textarea>
            @error('excerpt') <small>{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Konten</label>
            <textarea name="content">{{ old('content', $news->content) }}</textarea>
            @error('content') <small>{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Tanggal Publish</label>
            <input type="datetime-local" name="published_at"
                value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}">
            @error('published_at') <small>{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Image URL (opsional)</label>
            <input type="text" name="image" value="{{ old('image', $news->image) }}">
            @error('image') <small>{{ $message }}</small> @enderror
        </div>

        @if($news->image)
            <div class="image-preview">
                <img src="{{ $news->image }}" alt="{{ $news->title }}">
                <div class="caption">Gambar saat ini</div>
            </div>
        @endif

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-gray">Batal</a>
        </div>
    </form>
</div>

</div>
@endsection