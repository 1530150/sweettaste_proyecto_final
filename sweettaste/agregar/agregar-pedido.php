<?php
	require "../funcs/funciones.php";

	$producto = $_POST["producto"];
	$cliente = $_POST["cliente"];
	$calle = $_POST["calle"];
	$numero = $_POST["numero"];
	$colonia = $_POST["colonia"];
	$fechae = $_POST["fechae"];
	$horae = $_POST["horae"];

    $prod = getProducto($producto);

	$insertar = "INSERT INTO pedidos VALUES (NULL, 0, '$producto', '$cliente', '$calle', '$numero', '$colonia', '$fechae','$horae','$prod[6]')";


	conectar();

	$resultado = mysqli_query($conexion, $insertar);
	desconectar();
	header('Location: ../pedidos.php');


	if(!$resultado){
		echo "no se registro";
		//header('Location: ../nuevo-pedido.php');
	}

	


?>
