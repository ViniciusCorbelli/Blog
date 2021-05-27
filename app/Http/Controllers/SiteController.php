<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        Mail::send('contact', array(
            'email' => $request->email,
            'name' => $request->name,
            'msg' => $request->message,
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('vinicius.corbelli@codejr.com.br', 'Vinícius Corbelli');
        });

        return redirect()->route('contact')->with('success', true);
    }
}
