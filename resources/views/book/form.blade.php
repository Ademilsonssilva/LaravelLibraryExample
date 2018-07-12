{{ csrf_field() }}
<div class="form-group">
	<label for="name">Name: </label> 
	<input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $book->name ?? null }}">
</div>

<div class="form-group">
	<label for="author">Author: </label> 
	<input type="text" name="author" id="author" placeholder="Author" class="form-control" value="{{ $book->author ?? null }}">
</div>

<div class="form-group">
	<label for="synopsis">Synopsis: </label> 
	<textarea name="synopsis" id="synopsis" class="form-control"> {{ $book->synopsis ?? null }} </textarea>
</div>

<div class="form-group">
	<label for="quantity">Quantity: </label> 
	<input type="number" name="quantity" id="quantity" class="form-control" value="{{ $book->quantity ?? null }}"> 
</div>

<div class="form-group">
	<label for="limited">Limited?</label>
	<input type="checkbox" id="limited" name="limited" value="1" {{isset($book) ? $book->limited == true ? 'checked' : '' : ''}}>
</div>

<div class="form-group">
	<button type="submit" class="btn btn-primary">Send</button>
</div>	