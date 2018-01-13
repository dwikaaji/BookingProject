<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\User;
use App\Booking;
use App\Payment;
use App\Http\Requests;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewBooking()
    {
    	return view('booking');
    }

    public function insertBooking(Request $req)
    {
    	$validator = Validator::make($req->all(), [
            'booking_date' => 'required|date|after:today',
            'place' => 'required|not_in:0',
        ]);

        if ($validator->fails()) 
        {
        	return redirect()->back()->withErrors($validator)->withInput();
        }

        $status = 'Pending';
        $user_id = Auth::user()->id;

        $new_booking = new Booking();
        $new_booking['booking_date'] = $req['booking_date'];
        $new_booking['payment_method'] = $req['payment_method'];
        $new_booking['place'] = $req['place'];
        $new_booking['price'] = $req['price'];
        $new_booking['status'] = $status;
        $new_booking['user_id'] = $user_id;
        $new_booking->save();

        return redirect('/history-booking');
    }

    public function historyBooking()
    {
        $user_id = Auth::user()->id;
        $bookings = Booking::where('user_id', $user_id)->paginate(5);
    	return view('history', compact('bookings'));
    }

    public function deleteBooking($id)
    {
        $booking = Booking::where('booking_id', $id)->first();
        $user_id = Auth::user()->id;
        $role = Auth::user()->role;
        if ($user_id == $booking['user_id'] || $role == 'admin')
        {
            Booking::where('booking_id', $id)->delete();
        }
        
        return redirect()->back();
    }

    public function viewManageBooking()
    {
        $bookings = Booking::paginate(5);
        return view('manage.bookings', compact('bookings'));
    }
}
