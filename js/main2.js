$(obtener_registros());

function obtener_registros(actuacion){
	$.ajax({
		url : 'class/tabla2.php',
		type : 'POST',
		dataType : 'html',
		data : { actuacion: actuacion },
		})
	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function(){
	var valorBusqueda = $(this).val();
	if (valorBusqueda != ""){
		obtener_registros(valorBusqueda);
	}
	else{
		obtener_registros();
	}
});
