<?php
	require "../funcs/funciones.php";

	$producto = $_POST["producto"];
	$ingredientes = $_POST["ingredientes"];
	$instrucciones = $_POST["instrucciones"];

	$insertar = "INSERT INTO recetas VALUES ('$producto', '$ingredientes', '$instrucciones')";

	echo "producto vale: ",$producto,"<br>";
	echo "ingredientes vale: ",$ingredientes,"<br>";
	echo "instrucciones vale: ",$instrucciones,"<br>";


	conectar();

	$resultado = mysqli_query($conexion, $insertar);
	desconectar();
	header('Location: ../recetas.php');


	if(!$resultado){
		echo "no se registro";
		header('Location: ../nueva-receta.php');
	}

	


?>
