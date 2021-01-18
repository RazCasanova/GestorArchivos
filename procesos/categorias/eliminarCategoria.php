<?php 
	session_start();
	require_once "../../clases/Categorias.php";

	$categoriasObj = new Categorias();

	echo $categoriasObj->eliminarCategoria($_POST['idCategoria']);
 ?>