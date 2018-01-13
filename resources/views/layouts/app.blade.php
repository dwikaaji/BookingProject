<!DOCTYPE html>
<html>
<head>
	<title>Booking Ice Skating</title>

	<!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('favicon.ico') }}">

	<!-- Stylesheet's -->
	<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/portfolio-item.css') }}">

	<!-- Fonts -->
	<link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/font-style.css') }}">
	
	<!-- JavaScripts -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>

    <style>
        body {
            font-family: 'Lato';
			background: #ADA996;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="{{ url('/') }}">Booking Ice Skating</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/') }}">Home</a>
					</li>
					@if (Auth::guest())
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/login') }}">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/register') }}">Register</a>
						</li>
					@else
						@if (Auth::user()->role == 'admin')
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/manage-booking') }}">Manage Booking</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/manage-payment') }}">Manage Payment</a>
						</li>
						@elseif (Auth::user()->role == 'member')
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/history-booking') }}">History</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/confirm-payment') }}">Confirmation</a>
						</li>
						@endif
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/logout') }}">Logout</a>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

<section>
	@yield('content')
</section>

</body>
</html>