<?php

namespace App;

use App\Listing;
use App\Card;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

<<<<<<< HEAD
    public function listings()
    {
        return $this->hasMany('App\Listing');
    }

    // public function cards()
    // {
    //     return $this->hasMany('App\Card');
    // }
=======
    public function favorites()
    {
        return $this->belongsToMany('App\Listing')->withTimestamps();
    }
>>>>>>> like
}
