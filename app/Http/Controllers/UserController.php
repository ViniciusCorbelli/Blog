<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
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
        return view('admin.users.show', compact('user', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->all();
        $data = User::bcryptPassword($data);
        if($request->hasfile('image')){
            $extesion = $request->image->getClientOriginalExtension();
            $slug = str_slug($request->name);
            $nameFile = "{$slug}.{$extesion}";
            $request->image->storeAs('public/img',$nameFile);
            $data['image'] = 'img/'.$nameFile;

            dd($data);
        }else{
            $data['image'] = "user.png";
        }
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
    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->all();
        $data = User::bcryptPassword($data);
        if($request->hasfile('image')){
            $extesion = $request->image->getClientOriginalExtension();
            $slug = str_slug($request->name);
            $nameFile = "{$slug}.{$extesion}";
            $request->image->storeAs('public/img',$nameFile);
            $data['image'] = 'img/'.$nameFile;
        }else{
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

    public function pendency(Request $request, User $user){
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success',true);
    }
}
