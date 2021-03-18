function setEmail(val){
	$.ajax({
		type: 'get',
		data: {
				id: val,
				role: 'doctor'
			  },
		datatype: 'json',
		url: '././scripts/email.modal.php'
	}).done(function(email){
		$('#readonly_mail-doctor').val(email);
	})
}