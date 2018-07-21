@extends('base.base')

@section('content')
	
	<div class="panel">
		<div class="panel-body">
			<form action=" {{ route('report.lends_by_period_generate') }} " method="POST">

				{{ csrf_field() }}
				
				<div class="form-group">
					
					Lends from <input type="date" name="initial_date" id="initial_date"> to <input type="date" name="final_date" id="final_date">
				</div>

				@include('report.print_checkbox')

				<div class="form-group">
					<button class="btn btn-success" type="submit">Send</button>
				</div>



			</form>
		</div>
	</div>

@endsection