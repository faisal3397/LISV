<?php

namespace App;

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
        'phonenumber', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function cards()
    {
        return $this->hasMany('App\Card');
    }

    public function registration()
    {
        return $this->hasOne('App\Registration');
    }

    public function insurance()
    {
        return $this->hasOne('App\Insurance');
    }

    public function car()
    {
        return $this->hasOne('App\Car');
    }
}
