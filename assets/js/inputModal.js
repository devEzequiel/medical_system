function inputAdd(value){
	$.ajax({
		type: 'get',
		data: {id:value},
		datatype: 'html',
		url: '././scripts/set.input.php'
	}).done(function(result){
		$('#input-medic').html(result);
	})
}
