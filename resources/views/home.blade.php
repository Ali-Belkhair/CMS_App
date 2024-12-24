<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamy CMS - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('storage/logo.png') }}" alt="Hamy CMS Logo" width="50" height="50" class="me-2 rounded-circle">
                HAMY CMS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <header class="py-5 text-center bg-primary text-white">
        <div class="container">
            <h1>Welcome to HAMY CMS</h1>
            <p class="lead">Your go-to content management system for creating and managing posts.</p>
        </div>
    </header>

    <main class="container my-5">
       
        <section class="mb-5">
            <h2 class="text-center mb-4">Latest Posts</h2>
            <div class="row">
                @forelse($posts as $post)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit($post->content, 100, '...') }}</p>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No posts available at the moment. Check back later!</p>
                @endforelse
            </div>
        </section>
        
    </main>

    <footer class="py-4 bg-light text-center">
        <p>&copy; {{ date('Y') }} Hamy CMS. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
