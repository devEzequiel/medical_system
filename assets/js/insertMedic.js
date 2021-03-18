//fazendo o cadastro de médicos no sistema 
$(document).ready(function(){

	$('#doctor-modal').on('submit', function(e){

		e.preventDefault();
		let namer = $('#nome').val();
		let especr = $('#esp').val();
		let crmr = $('#crm_m').val();
		let cpfr = $('#cpf_m').val();
		let phoner = $('#cel_m').val();
		let emailr = $('#mail_m').val();
		let turnr = $('#turno_m').val();
		$.ajax({
			type: 'get',
			datatype: 'json',
			url: '././scripts/insert.doctor.php',
			data: {
				name: namer,
				espec: especr,
				crm: crmr,
				cpf: cpfr,
				phone: phoner,
				email: emailr,
				turn: turnr
			}
		}).done(function(a){

			//se o cpf, crm ou email já existir
			if (a == 0){
				alert('CPF/EMAIL/CRM já existente!');
				$('#medic-feedback').text('');
			} else {
				$('#medics').html(a[1]);
				$('#pagina').html(a[2]);
				$('#medic-feedback').text('Medico adicionado com sucesso');
				$('.clean').val('');
			}
		})
		})
	});


$(function screenDoc(){
	$.ajax({
		datatype: 'json',
		url: '././scripts/screen.doctor.php'
	}).done(function(a){
		$('#medics').html(a[1]);
		$('#pagina').html(a[2]);
	})
})