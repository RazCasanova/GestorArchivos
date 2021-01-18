<?php 
	session_start();

	require_once "../../clases/Categorias.php";

	$categoriasObj = new Categorias();

	$datos = array("idUsuario" =>$_SESSION['idUsuario'],
					"categoria" => $_POST['categoria']
					);

	echo $categoriasObj->agregarCategoria($datos);
 ?>