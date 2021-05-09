<?php

namespace App\Http\Controllers;

use App\Message;
use App\Post;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }
}
