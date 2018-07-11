@extends('base.base')

@section('content')
	<form action=" {{ route('user.update', $user->id) }} " method="POST">
		<input type="hidden" name="_method" value="PUT">

		@include('user/form')
		
	</form>
@endsection