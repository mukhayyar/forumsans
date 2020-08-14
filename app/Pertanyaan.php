<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jawaban;
use App\KomentarPertanyaan;
use App\User;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function komentar()
    {
        return $this->hasMany(KomentarPertanyaan::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
