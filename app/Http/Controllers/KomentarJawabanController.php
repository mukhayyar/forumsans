<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Jawaban;
use App\KomentarJawaban;

class KomentarJawabanController extends Controller
{

    public function create(Pertanyaan $pertanyaan, Jawaban $jawaban)
    {
        return view('new_komenjawaban',compact('pertanyaan','jawaban'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pertanyaan $pertanyaan, Jawaban $jawaban)
    {
        $komentar = new KomentarJawaban;
        $komentar->isi = $request->isi;
        $komentar->user_id = auth()->user()->id;
        $komentar->jawaban_id = $jawaban->id;
        $komentar->save();

        return redirect("/detail/$pertanyaan->id");
    }
}
