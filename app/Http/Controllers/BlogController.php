<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'image',
            'title' => 'required',
            'content' => 'required',
        ]);
        $post = new Post;
        if($request->hasFile('thumbnail'))
        {
            $image = $request->file('thumbnail');
            $filename = time().$image->getClientOriginalName();
            Storage::disk('local')->putFileAs('public/blog', $image, $filename);
            $post->thumbnail = $filename;
        }
        $slug = strtolower($request->title);
        $slug = str_replace(' ','-',$request->title);
        $slug = time().'-'.$slug.'-'.auth()->user()->username;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = $slug;
        $post->user_id = auth()->user()->id;
        $post->save();

        // add reputation to user who make blog
        $user = User::find(auth()->user()->id);
        $user->reputation += 3;
        $user->save();
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        if($blog->user->id == auth()->user()->id){
            $blog->delete();
            return redirect()->route('blog.index')->with('sukses','Blog berhasil dihapus');
        } else {
            return redirect()->route('blog.index')->with('sukses','Kamu bukan pemilik pertanyaan ini');
        }
    }
}
