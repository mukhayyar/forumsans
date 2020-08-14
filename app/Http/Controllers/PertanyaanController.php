<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Tag;
use App\PertanyaanTag;
use App\Jawaban;

class PertanyaanController extends Controller
{
    public function store(Request $request)
    {
        $pertanyaan = new Pertanyaan;
        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi = $request->isi;
        $pertanyaan->user_id = auth()->user()->id;
        $pertanyaan->save();

        $tag_arr = explode('#', $request->tag);
        unset($tag_arr[0]);
        $tag_arr = array_values($tag_arr);

        $tag_id = array();

        foreach ($tag_arr as $tag_name) {
            $compare_tag = Tag::where('title', $tag_name)->first();
            if ($compare_tag) {
                array_push($tag_id, $compare_tag->id);
            } else {
                $tag = new Tag;
                $tag->title = $tag_name;
                $tag->save();
                array_push($tag_id, $tag->id);
            }
        }
        $user_id = auth()->user()->id;
        $pertanyaan->tags()->sync($user_id);
        $pertanyaan->tags()->sync($tag_id);

        return redirect('/home')->with('sukses', 'Pertanyaan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
        // dd($pertanyaan);
        return view('detail', compact('pertanyaan'));
    }

    public function yes(Request $request, Pertanyaan $pertanyaan)
    {
        $pertanyaan->jawaban_tepat_id = $request->jawaban_tepat;
        $pertanyaan->update();
        return redirect("/detail/$pertanyaan->id");
    }

}
