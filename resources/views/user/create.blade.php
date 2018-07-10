@extends('base.base')

@section('content')
	<!--<form action=" {{ !isset($user) ? route('user.store') : route('user.update', $user) }} " method="{{ isset($user) ? 'PUT' : 'POST' }}"> -->
	<form action=" {{ route('user.store') }} " method="POST">
		{{ csrf_field() }}

		@if(isset($user))
			<input type="hidden" name="id" value="{{ $user->id }}">
		@endif
		
		<div class="form-group">
			<label for="name">Name: </label> 
			<input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $user->name ?? null }}">
		</div>
		
		<div class="form-group">
			<label for="name">Email: </label> 
			<input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ $user->email ?? null }}">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Send</button>
		</div>		

	</form>
@endsection