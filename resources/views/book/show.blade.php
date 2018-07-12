@extends('base.base')

@section('content')	
	
	<div class="row">
		<div class="col-sm-12">
			<h1>Book: {{$book->name}}</h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<h2>Author: {{$book->author}}</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<p>
				<h3>Synopsis: </h3>
				{{$book->synopsis}}
			</p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<p>Quantity: {{$book->quantity}} - Limited: {{$book->limited == true ? 'YES' : 'NO'}}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a>
			@component('components.delete_button', ['route' => route('book.destroy', $book->id), 'type' => 'text']) @endcomponent
		</div>
	</div>


@endsection