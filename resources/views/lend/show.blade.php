@extends('base.base')

@section('content')
	<div class="panel">
		<div class="panel-body">

			<div class="col">
				<h2>User: {{ $lend->user->name }}</h2>
			</div>

			<div class="col">
				<h2>Book: {{ $lend->book->name }} </h2>
				<hr>
			</div>

			<div class="col">
				<h4>Lend date: {{ $lend->lend_date->format('d/m/Y') }}</h4>
			</div>

			<div class="col">
				<h4>Forecast date: {{ $lend->getForecastDate()->format('d/m/Y') }}</h4>
			</div>

			<div class="col">
				<h4>Devolution date: {{ $lend->devolution_date != '' ? $lend->devolution_date->format('d/m/Y') : 'PENDING' }}</h4>
			</div>

			<div class="col">
				<h4> Status: @include('lend.status_label', ['status' => $lend->getStatus()]) </h4>
			</div>



		</div>

	</div>
@endsection