<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\User;
use App\Booking;
use App\Payment;
use App\Http\Requests;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewConfirmPayment()
    {
    	$user_id = Auth::user()->id;
    	$bookings = Booking::where('user_id', $user_id)->where('status', 'Pending')->get();
    	return view('confirm', compact('bookings'));
    }

    public function confirmPayment(Request $req)
    {
    	$validator = Validator::make($req->all(), [
            'total_payment' => 'required|integer|min:1',
            'bank_name' => 'required',
            'no_rek' => 'required',
            'name' => 'required',
            'booking_id' => 'not_in:0',
        ]);

        if ($validator->fails()) 
        {
        	return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = Auth::user()->id;

        $newPayment = new Payment();
        $newPayment['payment_method'] = $req['payment_method'];
        $newPayment['total_payment'] = $req['total_payment'];
        $newPayment['bank_name'] = $req['bank_name'];
        $newPayment['no_rek'] = $req['no_rek'];
        $newPayment['name'] = $req['name'];
        $newPayment['booking_id'] = $req['booking_id'];
        $newPayment['user_id'] = $user_id;
        $newPayment->save();

        Booking::where('booking_id', $req['booking_id'])->update(array('status' => 'Waiting Approval'));

        return redirect('/history-booking');
    }

    public function viewManagePayment()
    {
        $payments = Payment::paginate(5);

        return view('manage.payments', compact('payments'));
    }

    public function approvePayment($id)
    {
        $payment = Payment::where('payment_id', $id)->first();
        Booking::where('booking_id', $payment['booking_id'])->update(array('status' => 'Approved'));
        Payment::where('payment_id', $id)->delete();

        return redirect()->back();
    }

    public function rejectPayment($id)
    {
        $payment = Payment::where('payment_id', $id)->first();
        Booking::where('booking_id', $payment['booking_id'])->update(array('status' => 'Rejected'));
        Payment::where('payment_id', $id)->delete();
        
        return redirect()->back();
    }
}
