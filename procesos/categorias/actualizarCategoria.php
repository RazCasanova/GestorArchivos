<?php 
	require_once "../../clases/Categorias.php";
	$categoriaObj = new Categorias();

	$datos = array("idCategoria"=>$_POST['idCategoria'],
					"categoria"=>$_POST['categoriaU']);

	echo $categoriaObj->actualizarCategoria($datos);
 ?>