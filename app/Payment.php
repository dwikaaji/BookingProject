<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    public $timestamps = true;

    public function userPay() {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function booking() {
    	return $this->hasOne('App\Booking', 'booking_id', 'booking_id');
    }
}
