@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>{{ $post->title }}</h3>
        </div>
        <div class="card-body">
            <p class="card-text">
                {{ $post->content }}
            </p>
            <p class="text-muted">
                <strong>Author:</strong> {{ $post->user->name }}
            </p>
            <p class="text-muted">
                <strong>Published on:</strong> {{ $post->created_at->format('F j, Y, g:i a') }}
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>

            @can('update', $post)
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
            @endcan

            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?');">
                        Delete
                    </button>
                </form>
            @endcan
        </div>
    </div>
</div>
@endsection
