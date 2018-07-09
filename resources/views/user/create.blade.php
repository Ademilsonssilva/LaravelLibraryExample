@extends('base.base')

@section('content')
	<form action=" {{ route('user.store') }} " method="POST">
		{{ csrf_field() }}
		
		<div class="form-group">
			<label for="name">Name: </label> 
			<input type="text" name="name" id="name" placeholder="Name" class="form-control">
		</div>
		
		<div class="form-group">
			<label for="name">Email: </label> 
			<input type="text" name="email" id="email" placeholder="Email" class="form-control">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Send</button>
		</div>		

	</form>
@endsection