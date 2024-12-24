@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card my-4">
        <div class="card-header">
            <h1>{{ $post->title }}</h1>
        </div>
        <div class="card-body">
            @if ($post->image)
                <div class="mb-4 text-center">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->title }}">
                </div>
            @endif

            <div class="post-content">
                {!! $post->content !!}
            </div>
        </div>
        <div class="card-footer text-muted">
            <small>Posted on {{ $post->created_at->format('M d, Y') }} by {{ $post->user->name ?? 'Admin' }}</small>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
        
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?');">Delete Post</button>
        </form>
    </div>
</div>
@endsection

