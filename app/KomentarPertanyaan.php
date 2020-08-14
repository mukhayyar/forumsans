<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pertanyaan;

class KomentarPertanyaan extends Model
{
    protected $table = 'komentar_pertanyaan';

    function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
