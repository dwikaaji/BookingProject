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
								<th>Booking Date</th>
								<th>Payment Method</th>
								<th>Price</th>
								<th>Status</th>
								<th class="text-center">Action</th>
						  	</tr>
						</thead>
						<tbody>
							@foreach($bookings as $booking)
							<tr>
								<td>{{ $booking['booking_id'] }}</td>
								<td>{{ $booking['booking_date'] }}</td>
								<td>{{ $booking['payment_method'] }}</td>
								<td>{{ $booking['price'] }}</td>
								<td>{{ $booking['status'] }}</td>
								<td>
									<form method="POST" action="{{ url('/delete-booking/'.$booking['booking_id']) }}" class="text-center">
										{{ csrf_field() }}
										{{ method_field('delete') }}
										<button type="submit" class="btn btn-danger">Delete</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
						</table>
						{{ $bookings->links() }}
	            	</div>
	            	</center>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
