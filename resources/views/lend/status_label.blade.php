@if( $status == 'LATE' )
	<span class="label label-warning"> LATE </span>
@elseif( $status == 'OPEN')
	<span class="label label-primary"> OPEN </span>
@elseif( $status == 'RETURNED')
	<span class="label label-success"> RETURNED </span>
@else
	<span class="label label-danger"> RETURNED LATE </span>
@endif