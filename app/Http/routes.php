<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'HomeController@index');

Route::get('/booking', 'BookingController@viewBooking');
Route::post('/insert-booking', 'BookingController@insertBooking');
Route::delete('/delete-booking/{id}', 'BookingController@deleteBooking');
Route::get('/history-booking', 'BookingController@historyBooking');

Route::get('/confirm-payment', 'PaymentController@viewConfirmPayment');
Route::post('/insert-confirm-payment', 'PaymentController@confirmPayment');

Route::group(['middleware' => 'admin'], function() {
	Route::get('/manage-booking', 'BookingController@viewManageBooking');

	Route::get('/manage-payment', 'PaymentController@viewManagePayment');
	Route::post('/approve-payment/{id}', 'PaymentController@approvePayment');
	Route::post('/reject-payment/{id}', 'PaymentController@rejectPayment');
});
