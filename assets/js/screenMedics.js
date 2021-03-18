$(document).ready(function (){
	$.ajax({
		datatype: 'json',
		url: '././scripts/screen.doctor.php'
	}).done(function(a){
		$('#medics').html(a[1]);
		$('#pagina').html(a[2]);
	})
})


function pageDoc(pg){
	$.ajax({
		data: {p: pg},
		type: 'get',
		datatype: 'json',
		url: '././scripts/page.doc.php'
	}).done(function(a){
		$('#medics').html(a);
	})
}
