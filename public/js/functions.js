function swal_confirm(form, message = '', title = '', type = '', successFunction = '')
{
	if (message == '') {
		message = "Confirm operation";
	}

	if (title == '') {
		title = "Confirmation!";
	}

	if (type == '') {
		type = 'warning'
	}

	if (successFunction == '') {
		successFunction = function () {
			return true;
		}
	}

	swal({
		text: message,
		title: title,
		type: type,
		showCancelButton: true,
		confirmButtonColor: 'green',
		cancelButtonColor: 'red',
		preConfirm: () => {
			$('#'+form).submit();
		}
	});
	
}