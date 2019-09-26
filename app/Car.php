<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cars';

    /**
     * Get the users that owns the car.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'users_cars', 'car_id', 'driver_id');
    }
}
