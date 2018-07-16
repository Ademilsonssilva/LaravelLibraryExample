@extends('base.base')



@section('content')
	
	<form action=" {{ route('lend.devolution_post', ['lend' => $lend]) }} " method="POST">
		{{ csrf_field() }}

		<div class="form-group " >
			<label for="devolution_date">Devolution</label>
			<input type="date" name="devolution_date" id="devolution_date" class="{{$errors->has('devolution_date') ? 'border-danger' : ''}}">
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-success" value="Send" >
		</div>

	</form>
@endsection