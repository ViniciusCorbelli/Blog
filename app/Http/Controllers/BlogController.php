<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $comments = Comment::where('post_id', '=', $post->id)->paginate(10);
        return view('blog.post', compact('post', 'comments'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('blog.categories', compact('categories'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', '=', $category->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('blog.category', compact('posts', 'category'));
    }
}
