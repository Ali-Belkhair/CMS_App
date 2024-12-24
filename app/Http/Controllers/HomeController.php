<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the latest 4 posts
        $posts = Post::latest()->take(4)->get();

        // Pass the posts to the view
        return view('home', compact('posts'));
    }
}

