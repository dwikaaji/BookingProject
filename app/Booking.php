<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';
    public $timestamps = true;

    public function userBook() {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function booking() {
    	return $this->hasOne('App\Booking', 'booking_id', 'booking_id');
    }
}
