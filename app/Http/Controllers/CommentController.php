<?php

namespace App\Http\Controllers;

use App\Http\Requests\postRequest;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['date'] = date('d/m/Y H:i');
        Comment::create($data);
        return redirect()->route('posts.view', $data['post_id'])->with('success', true);
    }

    public function edit(Comment $comment)
    {
        return view('comment.edit', compact('post'));
    }

    public function update(PostRequest $request, Comment $comment)
    {
        $comment->update($request->all());
        return redirect()->route('posts.view', $request->post_id)->with('success', true);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('index')->with('success', true);
    }
}
