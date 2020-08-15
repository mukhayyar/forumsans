<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Pertanyaan;
use App\User;
use App\VoteJawaban;

class JawabanController extends Controller
{

    public function store(Request $request, Pertanyaan $pertanyaan)
    {
        $jawaban = new Jawaban;
        $jawaban->isi = $request->isi;
        $jawaban->user_id = auth()->user()->id;
        $jawaban->pertanyaan_id = $pertanyaan->id;
        $jawaban->save();

        return redirect("/detail/$pertanyaan->id");
    }

    public function upvote_jawaban(Jawaban $jawaban)
    {
        $vote = new VoteJawaban;
        $vote->user_id = auth()->user()->id;
        $vote->jawaban_id = $jawaban->id;
        $vote->up += 1;
        $vote->save();

        $user = User::find($jawaban->user_id);
        $user->reputation += 10;
        $user->save();

        return redirect()->route('detail', ['pertanyaan' => $jawaban->pertanyaan_id]);
    }

    public function downvote_jawaban(Request $request, Jawaban $jawaban)
    {
        $vote = new VotePertanyaan;
        $vote->user_id = auth()->user()->id;
        $vote->jawaban_id = $jawaban->id;
        $vote->down += 1;
        $vote->save();

        $user = User::find($request->id);
        $user->reputation -= 1;
        $user->save();

        return redirect()->route('detail', ['pertanyaan' => $jawaban->pertanyaan_id]);
    }
}
