@extends('base.base')

@section('content')	
	<table class="table table-striped table-hover table-responsive table-condensed">
		<thead>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
						<a class="btn btn-success" href=" {{ route('user.edit', $user->id) }} "> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
						<form action="{{ route('user.destroy', $user->id) }}" style="display: inline-block;" method="POST">
							{{csrf_field()}}
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit" class="btn btn-danger">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<td>
				<a class="btn btn-success" href=" {{ route('user.create') }} ">New +</a>	
			</td>
			<td colspan="2">
				<center>
					{{ $users->links() }}
				</center>
			</td>
		</tfoot>
	</table>

@endsection