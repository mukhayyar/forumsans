<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Tag;
use App\User;
use App\VotePertanyaan;

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
        return view('detail', compact('pertanyaan'));
    }

    public function yes(Request $request, Pertanyaan $pertanyaan)
    {
        $pertanyaan->jawaban_tepat_id = $request->jawaban_tepat;
        $pertanyaan->update();

        $user = User::find($pertanyaan->user_id);
        $user->reputation += 15;
        $user->save();

        return redirect("/detail/$pertanyaan->id");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        $pertanyaan->destroy(0);
        return redirect('/home')->with('sukses', 'Pertanyaan berhasil dihapus');
    }

    public function upvote_pertanyaan(Pertanyaan $pertanyaan)
    {
        $is_upvote = VotePertanyaan::where('user_id', auth()->user()->id)->where('pertanyaan_id', $pertanyaan->id)->first();
        if ($is_upvote && $is_upvote->up == 1) {
            return redirect()->route('detail', ['pertanyaan' => $pertanyaan->id]);
        } else if ($is_upvote && $is_upvote->up == 0) {
            VotePertanyaan::where('user_id', auth()->user()->id)->where('pertanyaan_id', $pertanyaan->id)->update([
                'down' => $is_upvote->down -= 1,
                'up' => $is_upvote->up += 1
            ]);

            $user = User::find(auth()->user()->id);
            $user->reputation += 1;
            $user->save();
        } else {
            $vote = new VotePertanyaan;
            $vote->user_id = auth()->user()->id;
            $vote->pertanyaan_id = $pertanyaan->id;
            $vote->up += 1;
            $vote->save();
        }

        $user = User::find($pertanyaan->user_id);
        $user->reputation += 10;
        $user->save();

        return redirect()->route('detail', ['pertanyaan' => $pertanyaan->id]);
    }

    public function downvote_pertanyaan(Request $request, Pertanyaan $pertanyaan)
    {
        $is_downvote = VotePertanyaan::where('user_id', auth()->user()->id)->where('pertanyaan_id', $pertanyaan->id)->first();
        if ($is_downvote && $is_downvote->down == 1) {
            return redirect()->route('detail', ['pertanyaan' => $pertanyaan->id]);
        } else if ($is_downvote && $is_downvote->down == 0) {
            VotePertanyaan::where('user_id', auth()->user()->id)->where('pertanyaan_id', $pertanyaan->id)->update([
                'down' => $is_downvote->down += 1,
                'up' => $is_downvote->up -= 1
            ]);

            $user = User::find($pertanyaan->user_id);
            $user->reputation -= 10;
            $user->save();
        } else {
            $vote = new VotePertanyaan;
            $vote->user_id = auth()->user()->id;
            $vote->pertanyaan_id = $pertanyaan->id;
            $vote->down += 1;
            $vote->save();
        }

        $user = User::find($request->id);
        $user->reputation -= 1;
        $user->save();

        return redirect()->route('detail', ['pertanyaan' => $pertanyaan->id]);
    }
}
