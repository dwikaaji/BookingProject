@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">     
            <div class="panel panel-primary">
                <br>
                <div class="panel-body">
                    <center>
                    <div class="table-responsive">
                        <table class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Email</th>
                                <th>Payment Method</th>
                                <th>Total Payment</th>
                                <th>Bank Name</th>
                                <th>No. Rekening</th>
                                <th>Name</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment['booking_id'] }}</td>
                                <td>{{ $payment->userPay['email'] }}</td>
                                <td>{{ $payment['payment_method'] }}</td>
                                <td>{{ $payment['total_payment'] }}</td>
                                <td>{{ $payment['bank_name'] }}</td>
                                <td>{{ $payment['no_rek'] }}</td>
                                <td>{{ $payment['name'] }}</td>

                                <td>
                                    <form method="POST" action="{{ url('/approve-payment/'.$payment['payment_id']) }}" class="text-center">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-success" style="width: 100px">Approve</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ url('/reject-payment/'.$payment['payment_id']) }}" class="text-center">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" style="width: 100px">Reject</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        {{ $payments->links() }}
                    </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
