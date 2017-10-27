<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">	
		<link rel="shortcut icon" href="../../assets/ico/favicon.ico">

		<title>
			@section('title')
			{{ $title or 'Регистр AIDS' }}
			@show
		</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		
		<!-- Include Font-Awesome -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">	
		
		<!-- additional CSS -->
		<link rel="stylesheet" href="{{ asset('css/fullscreen.css') }}" />
		
		<!-- Include Some Style -->
		@stack('css')
		
	</head>

	<body>

        <div class="container-fluid">              
              <div class="row">       
				@yield('content')
	        </div>
	    </div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		@stack('scripts')		
		
	</body>
</html>