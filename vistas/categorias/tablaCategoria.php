<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	$idUsuario = $_SESSION['idUsuario'];
	$conexion = new Conectar();
	$conexion = $conexion->conexion();
 ?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaCategoriaDataTabble">
		<thead style="text-align: center;">
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</thead>
		<tbody style="text-align: center;">
			<?php
				$sql = "SELECT * FROM t_categorias WHERE id_usuario = '$idUsuario'";
				$resul = mysqli_query($conexion, $sql);
				while ($mostrar = mysqli_fetch_array($resul)){
					$idCategoria = $mostrar['id_categoria'];
				
			 ?>
			<tr>
				<td> <?php echo $mostrar['nombre']; ?> </td>
				<td> <?php echo $mostrar['fechaInsert']; ?> </td>
				<td>
					<span class="btn btn-warning btn-sm" onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" data-bs-toggle="modal" data-bs-target="#modalActualizarCategoria">
						<span class="fas fa-edit" style="color: white;"></span>
					</span>
				</td>
				<td>
					<span class="btn btn-danger btn-sm" onclick="eliminarCategoria('<?php echo $idCategoria ?>')">
						<span class="fas fa-trash"></span>
					</span>
				</td>
			</tr>
		<?php 
			} 
		?>
		</tbody>
	</table>
	
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaCategoriaDataTabble').DataTable();
	});
</script>