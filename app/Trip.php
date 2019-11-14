<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trips';
    protected $fillable = ['departure', 'arrival', 'date', 'price', 'remaining_seats', 'driver_id', 'car_id'];

}
