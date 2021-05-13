<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\UserRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('admin.users.create', compact('user'));
    }

    public function show(User $user)
    {
        $posts = Post::where('user_id', '=', $user->id)->get();
        $comments = Comment::where('user_id', '=', $user->id)->get();

        $activities = $posts;
        foreach ($comments as $comment) {
            $activities->push($comment);
        }

        $activities = $activities->sortByDesc('date');
        return view('admin.users.show', compact('user', 'activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data = User::bcryptPassword($data);
        if ($request->hasfile('image')) {
            $extesion = $request->image->getClientOriginalExtension();
            $slug = str_slug($request->name);
            $nameFile = "{$slug}.{$extesion}";
            $request->image->storeAs('public/img/user', $nameFile);
            $data['image'] = $nameFile;
        } else {
            unset($data['image']);
        }
        $data['verified'] = 0;
        User::create($data);
        return redirect()->route('admin.users.index')->with('success', true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
        $data = User::bcryptPassword($data);
        if ($request->hasfile('image')) {
            $extesion = $request->image->getClientOriginalExtension();
            $slug = str_slug($request->name);
            $nameFile = "{$slug}.{$extesion}";
            $request->image->storeAs('public/img/user', $nameFile);
            $data['image'] = $nameFile;
        } else {
            unset($data['image']);
        }
        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', true);
    }

    public function pendency(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', true);
    }
}
