@extends('base.base')

@section('content')
	
	<div class="panel">
		<div class="panel-body">
			<form action=" {{ route('report.lends_by_book_generate') }} " method="POST">

				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="book">Book: </label>
					@include('components.combobox', ['name' => 'book', 'data' => $books ])	
				</div>

				<div class="form-group">
					<label for="print_report">Print? </label>
					<input type="checkbox" name="print_report" value="on">
				</div>

				<div class="form-group">
					<input type="submit" name="send" class="btn btn-primary" value="Generate">
				</div>

			</form>
		</div>
	</div>

@endsection