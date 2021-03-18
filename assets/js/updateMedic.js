$(document).ready(function(){
	$('#input-medic').on('submit', function(e){
		e.preventDefault();
		console.log('ok')
		let namer = $('#nomem').val();
		let especr = $('#espm').val();
		let crmr = $('#crm_mm').val();
		let cpfr = $('#cpf_mm').val();
		let phoner = $('#cel_mm').val();
		let emailr = $('#mail_mm').val();
		let turnr = $('#turno_mm').val();

		$.ajax({
			
			type: 'get',
			url: '././scripts/update.doctor.php',
			datatype: 'html',
			data: {
				name: namer,
				esp: especr,
				crm: crmr,
				cpf: cpfr,
				phone: phoner,
				email: emailr,
				turn: turnr,
				}
			
		}).done(function(result){
			screen();
		})
	})
})

function screen(){
	$.ajax({
		datatype: 'json',
		url: '././scripts/screen.doctor.php'
	}).done(function(a){
		$('#medics').html(a[1]);
		$('#pagina').html(a[2]);
	})
}