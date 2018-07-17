<select name="{{$name}}" id="{{$name}}" class="form-control">
	@foreach($data as $obj)
		<option value="{{$obj['id']}}"> {{ $obj['value'] }} </option>
	@endforeach
</select>