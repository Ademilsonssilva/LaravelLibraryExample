@extends('base.base')

@section('content')
	<form action=" {{ route('lend.store') }} " method="POST">

		@include('lend/form')

	</form>
@endsection