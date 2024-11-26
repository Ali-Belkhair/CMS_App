@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title Field -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Field -->
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            <small class="text-muted">Leave empty if you don't want to update the image.</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if($post->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-thumbnail" width="150">
                </div>
            @endif
        </div>

        <!-- Content Field -->
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Buttons -->
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
