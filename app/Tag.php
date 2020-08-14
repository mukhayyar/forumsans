<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pertanyaan;

class Tag extends Model
{
    protected $table = 'tag';

    protected $cast = [
        'title' => 'array'
    ];

    public function pertanyaan()
    {
        return $this->belongsToMany(Pertanyaan::class,'pertanyaan_tag');
    }
}
