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
        $is_upvote = VoteJawaban::where('user_id', auth()->user()->id)->where('jawaban_id', $jawaban->id)->first();
        if ($is_upvote && $is_upvote->up == 1) {
            return redirect()->route('detail', ['pertanyaan' => $jawaban->pertanyaan_id]);
        } else if ($is_upvote && $is_upvote->up == 0) {
            VoteJawaban::where('user_id', auth()->user()->id)->where('jawaban_id', $jawaban->id)->update([
                'down' => $is_upvote->down -= 1,
                'up' => $is_upvote->up += 1
            ]);

            $user = User::find(auth()->user()->id);
            $user->reputation += 1;
            $user->save();
        } else {
            $vote = new VoteJawaban;
            $vote->user_id = auth()->user()->id;
            $vote->jawaban_id = $jawaban->id;
            $vote->up += 1;
            $vote->save();
        }

        $user = User::find($jawaban->user_id);
        $user->reputation += 10;
        $user->save();

        return redirect()->route('detail', ['pertanyaan' => $jawaban->pertanyaan_id]);
    }

    public function downvote_jawaban(Request $request, Jawaban $jawaban)
    {
        $is_downvote = VoteJawaban::where('user_id', auth()->user()->id)->where('jawaban_id', $jawaban->id)->first();
        if ($is_downvote && $is_downvote->down == 1) {
            return redirect()->route('detail', ['pertanyaan' => $jawaban->pertanyaan_id]);
        } else if ($is_downvote && $is_downvote->down == 0) {
            VoteJawaban::where('user_id', auth()->user()->id)->where('jawaban_id', $jawaban->id)->update([
                'down' => $is_downvote->down += 1,
                'up' => $is_downvote->up -= 1
            ]);

            $user = User::find($jawaban->user_id);
            $user->reputation -= 10;
            $user->save();
        } else {
            $vote = new VoteJawaban;
            $vote->user_id = auth()->user()->id;
            $vote->jawaban_id = $jawaban->id;
            $vote->down += 1;
            $vote->save();
        }

        $user = User::find($request->id);
        $user->reputation -= 1;
        $user->save();

        return redirect()->route('detail', ['pertanyaan' => $jawaban->pertanyaan_id]);
    }
}
