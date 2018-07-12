@extends('base.base')

@section('content')	
	<table class="table table-striped table-hover table-responsive table-condensed">
		<thead>
			<th>#</th>
			<th>Author</th>
			<th>Name</th>
			<th>Avaliable</th>
			<th>Limited</th>
			<th>Actions</th>
		</thead>
		<tbody>
			@foreach($books as $book)
				<tr>
					<td><a href="{{route('book.show', $book->id)}}">{{ $book->id }}</a></td>
					<td>{{ $book->author }}</td>
					<td>{{ $book->name }}</td>
					<td>{{ $book->quantity }}</td>
					<td>{{ $book->limited ? 'YES' : 'NO'  }}</td>
					<td>
						<a class="btn btn-success" href=" {{route('book.edit', $book->id) }}"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
						@component('components.delete_button', ['route' => route('book.destroy', $book->id), 'type' => 'icon']) @endcomponent
					</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<td>
				<a class="btn btn-success" href=" {{ route('book.create') }} ">New +</a>	
			</td>
			<td colspan="2">
				<center>
					{{ $books->links() }}
				</center>
			</td>
		</tfoot>
	</table>

@endsection