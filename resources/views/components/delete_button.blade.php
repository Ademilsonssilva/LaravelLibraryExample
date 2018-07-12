<form action="{{ $route }}" style="display: inline-block;" method="POST" id="form">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE">
	<a class="btn btn-danger" onclick="return swal_confirm('form');">
		@if($type == 'icon')
			<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		@elseif($type == 'text')
			<span>Delete</span>
		@endif
	</a>
</form>