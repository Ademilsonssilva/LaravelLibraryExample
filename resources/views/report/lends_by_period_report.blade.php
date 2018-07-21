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
		<h1> Lends By Period Report </h1>
	</div>

	<div class="panel-body">

		<h3>Period: {{$period[0]->format('d/m/Y')}} to {{$period[1]->format('d/m/Y')}}</h3>

		<ol>
		@foreach($dates_array as $date => $lends)
			<li><h2> {{ $date }} </h2></li>
			
			<ul>
			@foreach($lends as $lend)
				<li><div class="alert alert-sm alert-{{$lend->getStatusBootstrapClass()}}" role="alert"> {{$lend->user->name}} - {{$lend->book->name}} - {{$lend->getStatus()}}</div>	</li>

			@endforeach
			</ul>
		
		@endforeach
		</ol>

	</div>
</div>

@if ($print)
<div class="no-print">
	<a href="{{url()->previous()}}"><button>Back</button></a>
	<button onclick="window.print()"> Print </button>
	<script>window.print()</script>
</div>
@endif