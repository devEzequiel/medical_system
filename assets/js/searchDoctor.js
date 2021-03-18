$(document).ready(function(){
	$('#search-doc').on('submit', function(e){
		e.preventDefault();
		console.log('ok')
		var value = $('#search-doctor').val();
		$.ajax({
			type: 'get',
			datatype: 'html',
			data: {val: value},
			url: '././scripts/search.doctor.php',
		}).done(function(result){
			$('#medics').html(result);
			$('#pagina').html('');
		})
	})
})