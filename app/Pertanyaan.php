<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jawaban;
use App\KomentarPertanyaan;
use App\User;
use App\Tag;

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

    public function jumlahJawaban()
    {
        $hitung = 0;
        foreach($this->jawaban as $jawaban){
            $hitung++;
        }
        return $hitung;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'pertanyaan_tag');
    }
}
