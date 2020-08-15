<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pertanyaan;
use App\KomentarJawaban;
use App\User;
use App\VoteJawaban;

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

    public function vote()
    {
        return $this->hasMany(VoteJawaban::class);
    }
}
