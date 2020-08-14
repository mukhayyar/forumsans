<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Pertanyaan;

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

}
