<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Pertanyaan;
use App\User;

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
        $detail_jawaban = Jawaban::find($jawaban->id);

        $detail_jawaban->up += 1;
        $detail_jawaban->save();

        $user = User::find($detail_jawaban->user_id);
        $user->reputation += 10;
        $user->save();

        return redirect()->route('detail', ['pertanyaan' => $jawaban->pertanyaan_id]);
    }

    public function downvote_jawaban(Request $request, Jawaban $jawaban)
    {
        $detail_jawaban = Jawaban::find($jawaban->id);

        $detail_jawaban->down += 1;
        $detail_jawaban->save();

        $user = User::find($request->id);
        $user->reputation -= 1;
        $user->save();

        return redirect()->route('detail', ['pertanyaan' => $jawaban->pertanyaan_id]);
    }
}
