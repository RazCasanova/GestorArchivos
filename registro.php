<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center">Registro de usuario</h1>
		<div class="row">
			<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<form action="" id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()">
						<label>Nombre</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required="">
						<label>Fecha de nacimiento</label>
						<input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="">
						<label>Email o correo electronico</label>
						<input type="email" name="correo" id="correo" class="form-control" required="">
						<label>Usuario</label>
						<input type="text" name="usuario" id="usuario" class="form-control" required="">
						<label>Contraseña</label>
						<input type="password" name="password" id="password" class="form-control" required="">
						<br>
						<div class="row">
							<div class="col-sm-6 text-left">
								<button class="btn btn-primary">Registrar</button>	
							</div>
							<div class="col-sm-6 text-right">
								<a href="index.php" class="btn btn-success">Iniciar sesion</a>
							</div>
						</div>

					</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
<script src="librerias/jquery-3.5.1.min.js"></script>
<script src="librerias/sweetalert.min.js"></script>
<script type="text/javascript">
	function agregarUsuarioNuevo() {
		$.ajax({
			method : "POST",
			data: $("#frmRegistro").serialize(),
			url: "procesos/usuario/registro/agregarUsuario.php",
			success:function(respuesta){
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#frmRegistro')[0].reset();
					swal("Bien","Agregado con exito","success");
				}else if(respuesta == 2){
					swal("Advertencia","Este usuario ya existe, por favor registra uno nuevo","warning");
				}else{
					swal("Mal","Fallo al agregar","error");
				}
			}
		});
		return false;
	}
</script>
</html>