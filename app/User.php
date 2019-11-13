<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    protected $with = [
        'profile',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile', 'user_id');
    }

    public function cars()
    {
        return $this->hasMany('App\Car', 'driver_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'driver_id');
    }

    public function tripsDriver()
    {
        return $this->hasMany('App\Trip', 'driver_id');
    }

    public function tripsPassenger()
    {
        return $this->hasMany('App\TripPassenger', 'passenger_id');
    }
}
