<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\User;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::orderBy('created_at','asc')->get();
        return view('home',compact('pertanyaan'));
    }

    public function user()
    {
        $users = User::all();
        return view('users',compact('users'));
    }

    public function showUser()
    {

    }

    public function tag()
    {
        $tags = Tag::all();
        return view('tag',compact('tags'));
    }
}
