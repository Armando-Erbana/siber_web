@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')

@section('content')
<div class="card">
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="category" value="{{ old('category', $news->category) }}">
            @error('category') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}">
            @error('title') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Excerpt</label>
            <textarea name="excerpt">{{ old('excerpt', $news->excerpt) }}</textarea>
            @error('excerpt') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Konten</label>
            <textarea name="content">{{ old('content', $news->content) }}</textarea>
            @error('content') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Tanggal Publish</label>
            <input type="datetime-local" name="published_at"
                value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}">
            @error('published_at') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Image URL (opsional)</label>
            <input type="text" name="image" value="{{ old('image', $news->image) }}">
            @error('image') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        @if($news->image)
            <div style="margin:14px 0;">
                <img src="{{ $news->image }}" style="width:250px; border-radius:12px; border:1px solid #e2e8f0;">
            </div>
        @endif

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-gray">Batal</a>
    </form>
</div>
@endsection
