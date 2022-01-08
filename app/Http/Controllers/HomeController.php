<?php

namespace App\Http\Controllers;

use App\Job;
use App\Tag;
use App\Post;
use App\User;
use App\Pertanyaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->input('cari');
        $pertanyaan = Pertanyaan::when($cari, function($query) use ($cari) {
            return $query->where('judul','like','%'.$cari.'%');
        })->orderBy('created_at','asc')->get();
        return view('pertanyaan/pertanyaan',compact('pertanyaan'));
    }

    public function show_blog(Pertanyaan $pertanyaan)
    {
        return view('pertanyaan/detail', compact('pertanyaan'));
    }

    public function user(Request $request)
    {
        $cari = $request->input('cari');
        $users = User::when($cari, function($query) use ($cari) {
            return $query->where('username','like','%'.$cari.'%');
        })->paginate(10);
        return view('users',compact('users'));
    }

    public function showUser(Request $request, $user)
    {
        $user = User::where('username',$user)->get()[0];
        $pertanyaan = Pertanyaan::where('user_id',$user->id);
        return view('user_detail',compact('user','pertanyaan'));
    }

    public function tag(Request $request)
    {
        $tags = Tag::all();
        return view('tag',compact('tags'));
    }

    public function job(Request $request)
    {
        $cari = $request->input('cari');
        $jobs = Job::when($cari, function($query) use ($cari) {
            return $query->where('judul','like','%'.$cari.'%');
        })->orderBy('created_at','asc')->get();
        return view('job/job',compact('jobs'));
    }

    public function blog(Request $request)
    {
        $cari = $request->input('cari');
        $posts = Post::when($cari, function($query) use ($cari) {
            return $query->where('title','like','%'.$cari.'%');
        })->orderBy('created_at','asc')->paginate(10);
        return view('blog/blog',['posts'=>$posts]);
    }

    public function detail_blog(Post $blog)
    {
        return view('blog/detail_blog',['post'=>$blog]);
    }
}
