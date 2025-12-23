<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $posts = \App\Models\NewsPost::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(9);
            
        return view('news.index', compact('posts'));
    }

    public function show(NewsPost $newsPost)
    {
        // Only show published posts
        abort_if(is_null($newsPost->published_at), 404);

        return view('news.show', ['post' => $newsPost]);
    }
}
