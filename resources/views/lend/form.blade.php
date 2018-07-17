{{ csrf_field() }}
<div class="form-group">
	<label for="user">User: </label>
	@include('components.combobox', ['name'=> 'user', 'data' => $users ]) 
</div>

<div class="form-group">
	<label for="user">Book: </label>
	@include('components.combobox', ['name'=> 'book', 'data' => $books ]) 
</div>

<div class="form-group">
	<label for="days">Number of days: </label>
	<input type="number" name="days" id="days" class="form-control">
</div>

<div class="form-group">
	<button type="submit" class="btn btn-primary">Send</button>
</div>	