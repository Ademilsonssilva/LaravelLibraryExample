@if($print)
	<html>
		<head>
			<style type="text/css" media="print">
				.no-print{
					visibility: hidden;
				}
			</style>
		</head>
@endif

<div class="panel panel-default">

	<div class="panel-heading">
		<h1> Lends By User Report </h1>
	</div>

	<div class="panel-body">

		<h2>Selected User: {{ $user->name }}</h2>
		
		<ol>
		@foreach ($data as $lend) 
			
			<li> 
				<strong> Book: </strong> {{ $lend->book->name }} 
				<ul>
					<li> <strong>Lend date: </strong>{{ $lend->lend_date->format('d/m/Y') }} </li>
					<li> <strong>Forecast date: </strong>{{ $lend->getForecastDate()->format('d/m/Y') }} </li>
					<li> <strong>Devolution date: </strong>{{ $lend->devolution_date != '' ? $lend->devolution_date->format('d/m/Y') : 'PENDING' }} </li>
					<li> <strong>Status: </strong>{{ $lend->getStatus() }} </li>
				</ul>
			</li>

		@endforeach
		</ol>

		<p><small><strong>Lends of this user: </strong> {{$user->lends->count()}} </small></p>

	</div>
</div>

@if ($print)
<div class="no-print">
	<a href="{{url()->previous()}}"><button>Back</button></a>
	<button onclick="window.print()"> Print </button>
	<script>window.print()</script>
</div>
@endif