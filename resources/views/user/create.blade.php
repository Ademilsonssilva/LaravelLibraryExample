@extends('base.base')

@section('content')
	<form action=" {{ route('user.store') }} " method="POST">

		@include('user/form')

	</form>
@endsection