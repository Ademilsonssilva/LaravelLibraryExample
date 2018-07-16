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
		
		<div class="content">
			
			
			@if(count($errors) > 0) 
				@component('components.error_message') 
					<li>
					@foreach($errors->all() as $error)
						<item> {{$error}} </item>	
						
					@endforeach
					</li>
				@endcomponent
			@endif
		

		</div>
		

		<div class="container">
			@yield('content')
		</div>

		<!-- SCRIPTS -->
		<script src="{{ asset('/js/app.js') }}"></script>
		<script src="{{ asset('/js/functions.js') }}"></script>
		<script src="{{ asset('/js/base.base.js') }}"></script>
		@include('sweetalert::alert')

		<script>
			@foreach ($errors->messages() as $key => $error) 
				$("#{{ $key }}").css('border', '2px solid red');
			@endforeach
			@yield('scripts')
		</script>
		<!-- ENDSCRIPTS -->
	</body>
</html>