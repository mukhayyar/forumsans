<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\Pertanyaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $pertanyaan = Pertanyaan::orderBy('created_at','asc')->get();
        return view('home',compact('pertanyaan'));
    }

    public function test(Request $request)
    {
        $html = Str::markdown('# Laravel');
        return $html;
    }

    public function user()
    {
        $users = User::all();
        return view('users',compact('users'));
    }

    public function showUser(Request $request, User $user)
    {
        $pertanyaan = Pertanyaan::where('user_id',$user->id);
        return view('user_detail',compact('user','pertanyaan'));
    }

    public function tag()
    {
        $tags = Tag::all();
        return view('tag',compact('tags'));
    }
}
