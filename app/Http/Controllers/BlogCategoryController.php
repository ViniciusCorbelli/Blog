<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

class BlogCategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('blog.categories', compact('categories'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', '=', $category->id)->get()->sortByDesc("id");
        return view('blog.category', compact('posts', 'category'));
    }
}
