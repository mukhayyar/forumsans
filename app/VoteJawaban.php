<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VoteJawaban;

class VoteJawaban extends Model
{
    protected $table = 'vote_jawaban';
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function vote_jawaban()
    {
        return $this->belongsTo(VoteJawaban::class);
    }
}
