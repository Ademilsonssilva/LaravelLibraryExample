@extends('base.base')

@section('content')
    <table class="table table-striped">
    	<thead>
    		<th>User</th>
    		<th>Book</th>
    		<th>Author</th>
    		<th>Lend date</th>
    		<th>Status</th>
    		<th>Actions</th>
    	</thead>

		<tbody>
	    	@foreach ($lends as $lend)
		
				<td> {{ $lend->user->name }} </td>
				<td> {{ $lend->book->name }} </td>
				<td> {{ $lend->book->author }} </td>
				<td> {{ $lend->lend_date->format('d/m/Y') }} </td>
				<td> {{ $lend->getStatus() }} </td>
				<td> 
					<a href=" {{ route('lend.devolution', ['lend' => $lend]) }} " class="btn btn-primary " title="devolution">
						<span class="glyphicon glyphicon-book"></span>
					</a>
				</td>

	    	@endforeach
    	</tbody>
    </table>
    <a href="{{route('lend.create')}}" class="btn btn-success">
    	<span class="glyphicon glyphicon-plus"></span>
    </a>
@endsection
