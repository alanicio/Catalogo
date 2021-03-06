<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 	<meta name="description" content="">
		<meta name="author" content="">
		<script src="/vendor/jquery/jquery.min.js"></script>
  		<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		@yield('keywords')

	  <title>Camáras de videovigilancia, CCTV, alarmas, control de acceso - Seguridad Nonex</title>

	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

	  <!-- Bootstrap core CSS -->
	  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	  <!-- Custom styles for this template -->
	  <link href="/css/shop-homepage.css" rel="stylesheet">
	  <link href="/font/gotham/gotham-font.css" rel="stylesheet">
	  <script type="text/javascript">
	  	$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
	  </script>

	</head>

	<body>
		@include('nav')
		<!-- Page Content -->
  		<div class="container">
    		<div class="row">
    			@include('Tienda.categorias')
				@yield('content')
			</div>
    		<!-- /.row -->
  		</div>
  		<!-- /.container -->
		@include('footer')
	</body>
</html>