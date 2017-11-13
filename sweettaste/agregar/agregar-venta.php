<?php
	require "../funcs/funciones.php";

	if(!isset($_GET['pedido'])){
    	header('Location: pedidos.php');
	}

	conectar();

	$id = $_GET['pedido'];


	$modificar = "UPDATE pedidos SET estado=1 WHERE id='$id'";


	conectar();

	$resultado = mysqli_query($conexion, $modificar);

	desconectar();

	header('Location: ../pedidos.php');

	


?>
