<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortByDesc("id");
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $comments = Comment::where('post_id', '=', $post->id)->paginate(10);
        return view('blog.post', compact('post', 'comments'));
    }
}
