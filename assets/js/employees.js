//fazendo o cadastro de funcionários no sistema 
$(document).ready(function (){

	$('#save-emp').on('submit', function(e){
		e.preventDefault();

		let namer = $('#nome_f').val();
		let roler = $('#esp_f').val();
		let birthr = $('#data_f').val();
		let cpfr = $('#cpf_f').val();
		let phoner = $('#cel_f').val();
		let emailr = $('#mail_f').val();
		let turnr = $('#dturno_f').val();
		$.ajax({
			type: 'get',
			datatype: 'json',
			url: '././scripts/insert.emp.php',
			data: {
				name: namer,
				role: roler,
				birth: birthr,
				cpf: cpfr,
				phone: phoner,
				email: emailr,
				turn: turnr
			}
		}).done(function(result){
			if (result==1){
				window.alert('CPF ou Email já cadastrado');
				$('#funcio-feedback').text('');
			} else {
				$('#nome').val('');
				$('#esp_').val('');
				$('#data_f').val('');
				$('#cpf_f').val('');
				$('#cel_f').val('');
				$('#mail_f').val('');
				$('#turno_f').val('');
				screenEmp();
				$('#funcio-feedback').text('Funcionario adicionado com sucesso');
				$('.clean').val('');
			}
		})
	})
});

//carregar a paginaçao

function pageEmp(pg){
	$.ajax({
		data: {p: pg},
		type: 'get',
		datatype: 'json',
		url: '././scripts/page.emp.php'
	}).done(function(a){
		$('#func-tab').html(a);
	})
}


//mostrar a tabela de funcionários

$(document).ready(function(){
	screenEmp();
});

function screenEmp(){
	$.ajax({
		datatype: 'json',
		url: '././scripts/screen.emp.php'
	}).done(function (a){
		$('#func-tab').html(a[1]);
		$('#pagina2').html(a[2]);

	})
};

//adicionando os dados à modal de edição de funcionários
function inputAddEmp(val){
	$.ajax({
		data: {id: val},
		datatype: 'html',
		url: '././scripts/set.input.emp.php',
		type: 'post'
	}).done(function(result){
		$('#edit-emp').html(result);
	})
};

//editando os dados dos funcionários
$(document).ready(function(){

	$('#edit-emp').on('submit', function(e){
		e.preventDefault();

		let namer = $('#namee').val();
		let roler = $('#rolee').val();
		let birthr = $('#birthe').val();
		let cpfr = $('#cpfe').val();
		let phoner = $('#cele').val();
		let emailr = $('#maile').val();
		let turnr = $('#turne').val();

		$.ajax({
			type: 'get',
			url: '././scripts/update.emp.php',
			datatype: 'html',
			data: {
				name: namer,
				role: roler,
				birth: birthr,
				cpf: cpfr,
				phone: phoner,
				email: emailr,
				turn: turnr
				}
		}).done(function(result){
			screenEmp();
		})
	})
})

//deletando registros de funcionários
function deleteEmp(value){
	if (window.confirm("Você deseja apagar o Registro?")) {
		$.ajax({
			type: 'get',
			datatype: 'html',
			url: '././scripts/delete.emp.php',
			data: {id: value}
		}).done(function(result){
			screenEmp();
		})
	}
}

//pesquisando registros de funcionários
$(document).ready(function(){
	$('#search-empl').on('submit', function(e){
		e.preventDefault();

		var value = $('#search-emp').val();
		$.ajax({
			type: 'get',
			datatype: 'html',
			data: {val: value},
			url: '././scripts/search.emp.php',
		}).done(function(result){
			$('#func-tab').html(result);
			$('#pagina2').html('');
		})
	})
})
//aadicionando o email a modal
function setEmaile(val){
	console.log('email')
	$.ajax({
		type: 'get',
		data: {
				id: val,
				role: 'emp'
			  },
		datatype: 'json',
		url: '././scripts/email.modal.php'
	}).done(function(email){
		$('#readonly_mail-employee').val(email);
	})
}