<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pertanyaan;

class VotePertanyaan extends Model
{
    protected $table = 'vote_pertanyaan';

    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function vote_pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
