@extends('base.base')

@section('content')
	<form action=" {{ route('book.store') }} " method="POST">

		@include('book/form')

	</form>
@endsection