<?php 
	require_once "../../clases/Categorias.php";

	$categoriaObj = new Categorias();

	echo json_encode($categoriaObj->obtenerCategoria($_POST['idCategoria']));
 ?>