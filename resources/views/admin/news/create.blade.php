@extends('layouts.admin')

@section('title', 'Tambah Berita')
@section('page_title', 'Tambah Berita')

@section('content')
<div class="card">
    <form action="{{ route('admin.news.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="category" value="{{ old('category') }}" placeholder="Contoh: Berita / Tren / Kegiatan">
            @error('category') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Judul berita">
            @error('title') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Excerpt</label>
            <textarea name="excerpt" placeholder="Ringkasan berita">{{ old('excerpt') }}</textarea>
            @error('excerpt') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Konten</label>
            <textarea name="content" placeholder="Isi berita lengkap">{{ old('content') }}</textarea>
            @error('content') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Tanggal Publish</label>
            <input type="datetime-local" name="published_at" value="{{ old('published_at') }}">
            @error('published_at') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Image URL (opsional)</label>
            <input type="text" name="image" value="{{ old('image') }}" placeholder="https://....jpg">
            @error('image') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-gray">Batal</a>
    </form>
</div>
@endsection
