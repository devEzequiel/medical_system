$(document).ready(function(){

	$('#register').on('submit', function(e){
		e.preventDefault();
		
		let namer = $('#names').val();
		let emailr = $('#emails').val();
		let passr = $('#pwds').val();

		$.ajax({
			type: 'post',
			datatype: 'html',
				data: {
				name: namer,
				email: emailr,
				pass: passr
			},
			url: '././scripts/insert.user.php'
		}).done(function(result){

			// quando um novo usuario for criado
			if (result[0] === 1){
				$('#text_register_confirm').text('Usuario cadastrado com sucesso');
				$('.name_register').val('');
				$('.mail_register').val('');
				$('.password_register').val('');

			} //quando der erro na criação do usuário
			else if(result[0] === 0){
				$('#text_register_error').text('Usuario/Email já existente');
			}
		})
	})
})

$(document).ready(function(){
	$('#login').on('submit', function(e){
		e.preventDefault();

		let emailr = $('#email').val();
		let passr = $('#pass').val();

		$.ajax({
			data: {email: emailr, pass: passr},
			datatype: 'json',
			type: 'post',
			url: '././scripts/login.php'
		}).done(function(result){
			//quando o login for bem sucedido
			if (result[0] === 1){
				window.location.href = "././home.php";
			} else if(result[0] === 0){
				$('#text_error').text('Usuario/Senha Invalida');
			}
			
		})
		
	})
})
