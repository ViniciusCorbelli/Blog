<?php

namespace App\Http\Controllers;

use App\Http\Requests\postRequest;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['date'] = date('d/m/Y H:i');
        Comment::create($data);
        return redirect()->route('blog.view', $data['post_id'])->with('success', true);
    }

    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }

    public function update(PostRequest $request, Comment $comment)
    {
        $comment->update($request->all());
        return redirect()->route('blog.view', $comment->post_id)->with('success', true);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', true);
    }

    public function destroyBlog(Comment $comment)
    {
        $comment_id = $comment->post_id;
        $comment->delete();
        return redirect()->route('blog.view', $comment_id)->with('success', true);
    }
}
