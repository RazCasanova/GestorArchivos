<?php 
	require_once "Conexion.php";

	class Usuario extends Conectar{
		
		function agregarUsuario($datos){
			$conexion = Conectar::conexion();
			if (self::usuarioRepetido($datos['usuario'])) {
				return 2;
			}else{

				$sql = "INSERT INTO t_usuarios(nombre,fecha_nacimiento,email,usuario,password)
						VALUES(?,?,?,?,?)";
				$query = $conexion->prepare($sql);
				$query->bind_param('sssss',   $datos['nombre'],
										 	  $datos['fechaNacimiento'],
										 	  $datos['correo'],
										 	  $datos['usuario'],
										 	  $datos['password']);
				$exito = $query->execute();
				$query->close();
				return $exito;
			}
		}

		public function usuarioRepetido($usuario){
			$conexion = Conectar::conexion();

			$sql = "SELECT usuario FROM t_usuarios WHERE usuario = '$usuario'";
			$resul = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($resul);

			return $datos;
		}

		public function login($usuario, $password){
			$conexion = Conectar::conexion();

			$sql = "SELECT count(*) AS existeUsuario FROM t_usuarios 
					WHERE usuario = '$usuario' AND password = '$password'";
			$resul = mysqli_query($conexion, $sql);

			$respuesta = mysqli_fetch_array($resul)['existeUsuario'];

			if ($respuesta > 0) {
				$_SESSION['usuario'] = $usuario;
				$sql = "SELECT id_usuario FROM t_usuarios 
						WHERE usuario = '$usuario' AND password = '$password'";
				$result = mysqli_query($conexion, $sql);
				$idUsuario = mysqli_fetch_row($result)[0];
				$_SESSION['idUsuario'] = $idUsuario;
				return 1;
			}else{
				return 0;
			}
		}
	}
 ?>