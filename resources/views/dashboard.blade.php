@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>

    @if($posts->count() > 0)
        @foreach($posts as $post)

            <div class="card shadow-sm mb-4 mx-auto" style="max-width: 700px;">

                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">{{ $post->user->name }}</h3>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h4>

                    @if ($post->image)

                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid mx-auto d-block" style="max-height: 70%; max-width: 100%; height: auto;">
                    
                    @endif
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>
                    
                    <small class="text-muted">Posted on {{ $post->created_at->format('M d, Y') }}</small>
                </div>

                @if(auth()->user()->role === 'admin')
                <div class="card-footer">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
                @endif

            </div>
            
        @endforeach
    @else
        <p class="text-center">No posts found.</p>
    @endif
</div>
@endsection
