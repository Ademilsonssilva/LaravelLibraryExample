@extends('base.base')

@section('content')
	<form action=" {{ route('book.update', $book->id) }} " method="POST">
		<input type="hidden" name="_method" value="PUT">

		@include('book/form')

	</form>
@endsection