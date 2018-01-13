<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function userBook() {
        return $this->hasMany('App\Booking', 'user_id', 'id');
    }

    public function userPay() {
        return $this->hasMany('App\Payment', 'user_id', 'id');
    }

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
