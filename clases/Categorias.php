<?php 
	require_once "Conexion.php";
	class Categorias extends Conectar{
		
		function agregarCategoria($datos){
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO t_categorias(id_usuario,nombre)
					VALUES(?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("is", $datos['idUsuario'],$datos['categoria']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}

		function eliminarCategoria($idCategoria){
			$conexion = Conectar::conexion();
			$sql = "DELETE FROM t_categorias WHERE id_categoria = ?";

			$query = $conexion->prepare($sql);
			$query->bind_param("i", $idCategoria);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		function obtenerCategoria($idCategoria){
			$conexion = Conectar::conexion();
			$sql = "SELECT * FROM t_categorias WHERE id_categoria = '$idCategoria'";

			$resul = mysqli_query($conexion, $sql);
			$categoria = mysqli_fetch_array($resul);
			$datos = array("idCategoria"=>$categoria['id_categoria'],"nombreCategoria" =>$categoria['nombre']);
			return $datos;
		}

		function actualizarCategoria($datos){
			$conexion = Conectar::conexion();
			$sql = "UPDATE t_categorias
					SET nombre = '$datos[categoria]'
					WHERE id_categoria = '$datos[idCategoria]'";
			$respuesta = mysqli_query($conexion, $sql);
			return $respuesta;

		}
	}
 ?>