function agregarCategoria () {
	var categoria = $('#nombreCategoria').val();
 			if (categoria == "") {
 				swal("Advertencia","Se debe agregar una categoría","warning");
 				return false;
 			}else{
 				$.ajax({
 					type:"POST",
 					data:"categoria=" + categoria, 
 					url:"../procesos/categorias/agregarCategoria.php",
 					success:function(respuesta){
 						respuesta = respuesta.trim();
 						if (respuesta == 1) {
 							$('#tablaCategorias').load("categorias/tablaCategoria.php");
 							$('#nombreCategoria').val("");
 							swal("Bien","Agregado con exito","success");
 						}else{
 							swal("Mal","No se puedo agregar correctamente","error");
 						}
 					}
 				});
 			}
}

function eliminarCategoria(idCategoria){
	idCategoria = parseInt(idCategoria);
	if (idCategoria < 1) {
		swal("Mal","No se tiene el id de categoria","error");
		return false;
	}else{
		
		swal({
			title: "Desea eliminar esta categoría?",
			text: "Una vez eliminada la categoría, no podrá ser recuperada",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "POST",
					data: "idCategoria=" + idCategoria,
					url: "../procesos/categorias/eliminarCategoria.php",
					success:function(respuesta){
						respuesta = respuesta.trim();
						if (respuesta == 1) {
							$('#tablaCategorias').load("categorias/tablaCategoria.php");
							swal("Eliminado con exito", {
									icon: "success",
						});
						}else{
							swal("Mal","Fallo al eliminar","error");
						}
					}
				});
			}
		});
	}
}

function obtenerDatosCategoria(idCategoria){
	$.ajax({
		type: "POST",
		data: "idCategoria=" + idCategoria,
		url: "../procesos/categorias/obtenerCategoria.php",
		success:function(respuesta){
			respuesta = jQuery.parseJSON(respuesta);
			$('#idCategoria').val(respuesta['idCategoria']);
			$('#categoriaU').val(respuesta['nombreCategoria']);
		}
	});
}

function actualizaCategoria(){
	if ($('#categoriaU').val()=="") {
		swal("Advertencia","No hay ninguna categoria","warning");
		return false;
	}else{
		$.ajax({
			type:"POST",
			data:$('#frmActualizaCategoria').serialize(),
			url:"../procesos/categorias/actualizarCategoria.php",
			success:function(respuesta){
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#tablaCategorias').load("categorias/tablaCategoria.php");
					swal("Bien","Actualizado con exito","success");
				}else{
					swal("Mal","Fallo al actualizar","error");
				}
			}
		});
	}
}