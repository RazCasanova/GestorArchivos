<?php 
	session_start();
	if (isset($_SESSION['usuario'])) {
		include "header.php";		
 ?>

 <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Categorías</h1>
    	<div class="row">
    		<div class="col-sm-4">
    			<span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregaCategoria">
    				<span class="fas fa-plus-circle"></span> Agregar nueva categoría
    			</span>
    		</div>
    	</div>
    	<hr>
    	<div class="row">
    		<div class="sol-sm-12">
    			<div id="tablaCategorias">
    				
    			</div>
    		</div>
    	</div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAgregaCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoria</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmCategorias">
					<label>Nombre de la categoría</label>
					<input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btnGuardarCategoria">Aceptar</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalActualizarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Actualziar categoria</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmActualizaCategoria">
					<input type="text" name="idCategoria" id="idCategoria" hidden="">
					<label for="">Categoría</label>
					<input type="text" name="categoriaU" id="categoriaU" class="form-control">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btnActualizarCategoria">Actualizar</button>
			</div>
		</div>
	</div>
</div>


 <?php 
 	include "footer.php"; 
 ?>
 <script src="../js/categorias.js"></script>

 	<script type="text/javascript">
 	$(document).ready(function(){
 		$('#tablaCategorias').load("categorias/tablaCategoria.php");
 		$('#btnGuardarCategoria').click(function(){
 			agregarCategoria();
 		});

 		$('#btnActualizarCategoria').click(function(){
 			actualizaCategoria();
 		});
 	});
 
 </script>

 <?php 
 	}else{
 		header("Location:../index.php");
 	}
  ?>