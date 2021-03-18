function deleteMedic(value){
	if (window.confirm("Você deseja apagar o Registro?")) {
		$.ajax({
			type: 'get',
			datatype: 'html',
			url: '././scripts/delete.doctor.php',
			data: {id: value}
		}).done(function(a){
			$('#medics').html(a[1]);
			$('#pagina').html(a[2]);
		})
	}
}