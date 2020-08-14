<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\KomentarPertanyaan;

class KomentarPertanyaanController extends Controller
{
    public function create(Pertanyaan $pertanyaan)
    {
        return view('new_komenpertanyaan',compact('pertanyaan'));
    }

    public function store(Request $request, Pertanyaan $pertanyaan)
    {
        $komentar = new KomentarPertanyaan;
        $komentar->isi = $request->isi;
        $komentar->user_id = auth()->user()->id;
        $komentar->pertanyaan_id = $pertanyaan->id;
        $komentar->save();

        return redirect("/detail/$pertanyaan->id");
    }

}
