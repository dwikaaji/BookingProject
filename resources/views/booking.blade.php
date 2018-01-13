@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/insert-booking') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('booking_date') ? ' has-error' : '' }}">
                            <label for="booking_date" class="col-md-4 control-label">Booking Date</label>

                            <div class="col-md-6">
                                <input id="booking_date" type="date" class="form-control" name="booking_date">

                                @if ($errors->has('booking_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booking_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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

                        <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                            <label for="place" class="col-md-4 control-label">Booking ID</label>

                            <div class="col-md-6">
                                <select name="place" class="form-control">
                                    <option value="0">-- Choose Place --</option>
                                    <option value="Mall Taman Anggrek">Mall Taman Anggrek</option>
                                    <option value="Bintaro Jaya Xchange Mall">Bintaro Jaya Xchange Mall</option>
                                    <option value="Blok M Square">Blok M Square</option>
                                </select>

                                @if ($errors->has('place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="name" readonly="true" class="form-control" name="price" value="200000">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Booking</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
