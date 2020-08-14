<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pertanyaan;
use App\KomentarJawaban;
use App\User;

class Jawaban extends Model
{
    protected $table = 'jawaban';

    function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function komentar()
    {
        return $this->hasMany(KomentarJawaban::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
