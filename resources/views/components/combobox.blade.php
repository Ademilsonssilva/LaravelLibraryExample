<select name="{{$name}}" id="{{$name}}" class="form-control">
	@foreach($data as $key => $value)
		<option value="{{ $key }}"> {{ $value }} </option>
	@endforeach
</select>