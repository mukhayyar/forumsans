<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jawaban;

class KomentarJawaban extends Model
{
    protected $table = 'komentar_jawaban';

    function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
