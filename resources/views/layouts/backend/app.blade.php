<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') - {{ config('app.name', 'News Blog') }}</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('assets/backend/plugins/font-awesome/css/font-awesome.min.css') }}">
	<!-- IonIcons -->
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('assets/backend/css/adminlte.min.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	@stack('css')

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
	<!-- Navbar -->
	@include('layouts.backend.partial.navbar')
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	@include('layouts.backend.partial.sidebar')

	<!-- Content Wrapper. Contains page content -->
	@yield('content')
	<!-- /.content-wrapper -->

	<!-- Main Footer -->
	@include('layouts.backend.partial.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('assets/backend/js/adminlte.js') }}"></script>

@stack('js')

</body>



</html>
