@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (!$bookings->isEmpty())
            <div class="panel panel-default">
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/insert-confirm-payment') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('payment_method') ? ' has-error' : '' }}">
                            <label for="payment_method" class="col-md-4 control-label">Payment Method</label>

                            <div class="col-md-6">
                                <div class="radio form-control">
                                    <label>
                                        <input type="radio" name="payment_method" checked="checked" value="ATM Transfer">ATM Transfer
                                    </label>
                                    <br>
                                </div>
                                
                                @if ($errors->has('payment_method'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_method') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('total_payment') ? ' has-error' : '' }}">
                            <label for="total_payment" class="col-md-4 control-label">Total Payment</label>

                            <div class="col-md-6">
                                <input id="total_payment" type="name" class="form-control" name="total_payment">

                                @if ($errors->has('total_payment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('total_payment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                            <label for="bank_name" class="col-md-4 control-label">Nama Bank</label>

                            <div class="col-md-6">
                                <input id="bank_name" type="name" class="form-control" name="bank_name">

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_rek') ? ' has-error' : '' }}">
                            <label for="no_rek" class="col-md-4 control-label">No. Rekening</label>

                            <div class="col-md-6">
                                <input id="no_rek" type="name" class="form-control" name="no_rek">

                                @if ($errors->has('no_rek'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_rek') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama Pemilik Rekening</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('booking_id') ? ' has-error' : '' }}">
                            <label for="booking_id" class="col-md-4 control-label">Booking ID</label>

                            <div class="col-md-6">
                                <select name="booking_id" class="form-control">
                                    <option value="0">-- Choose Booking ID --</option>
                                    @foreach($bookings as $booking)
                                    <option value="{{ $booking['booking_id'] }}">{{ $booking['booking_id'] }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('booking_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booking_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Confirm Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
