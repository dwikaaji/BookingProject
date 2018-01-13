<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\User;
use App\Booking;
use App\Payment;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
