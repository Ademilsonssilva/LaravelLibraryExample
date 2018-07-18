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
						<a class="btn btn-default btn-sm" href=" {{ route('user.edit', $user->id) }} "> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
						@component('components.delete_button', ['route' => route('user.destroy', $user->id), 'type' => 'icon'])
						
						@endcomponent
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