<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Ramsey\Uuid\Type\Integer;

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
        return view('blog.category.index', compact('categories'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', '=', $category->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('blog.category.view', compact('posts', 'category'));
    }

    public function dates()
    {
        return view('blog.date.index');
    }

    public function date(Post $post)
    {
        $posts = Post::whereMonth('created_at', date('m', strtotime($post->created_at)))->orderBy('created_at', 'desc')->paginate(10);
        $months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        $month = $months[(date('m', strtotime($post->created_at))) - 1 + 1];
        return view('blog.date.view', compact('month', 'posts'));
    }
}
