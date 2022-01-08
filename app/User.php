<?php

namespace App;

use App\Post;
use App\Role;
use App\Jawaban;
use App\Pertanyaan;
use App\KomentarJawaban;
use App\KomentarPertanyaan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function komentar_pertanyaan()
    {
        return $this->hasMany(KomentarPertanyaan::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function komentar_jawaban()
    {
        return $this->hasMany(KomentarJawaban::class);
    }

    public function checkReputation()
    {
        if ($this->reputation === null or $this->reputation === 0){
            return 'Point: 0 | Neutral';
        } else if($this->reputation < 0) {
            return 'Point: '.$this->reputation. ' | Bad';
        }
        return 'Point: '.$this->reputation. ' | Good';
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_role')->withPivot('user_id','role_id');
    }
}
