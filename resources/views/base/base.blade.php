<!doctype html>
<html>
	<head>
		<!-- META TAGS -->
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<!-- ENDMETATAGS -->

    	<!-- CSS -->
		<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
		<style>
			.jumbotron {
				margin-bottom: 0px;
			}
			.navbar {
				margin-top: 0px;
			}
		</style>
		<!-- ENDCSS -->

	</head>
	<body>
		@include('base/header')

		@include('base/navbar')

		<div class="container">
			@yield('content')
		</div>

		<!-- SCRIPTS -->
		<script src="{{ asset('/js/app.js') }}"></script>
		@include('sweetalert::alert')
		<!-- ENDSCRIPTS -->
	</body>
</html>