<?php
	require "../funcs/funciones.php";

	$nombre = $_POST["nombre"];
	$calle = $_POST["calle"];
	$numero = $_POST["numero"];
	$colonia = $_POST["colonia"];
	$codigop = $_POST["codigop"];

	$insertar = "INSERT INTO ubicaciones VALUES (NULL, '$nombre', '$calle', '$numero', '$colonia', '$codigop')";

	conectar();

	$resultado = mysqli_query($conexion, $insertar);
	desconectar();
	header('Location: ../ubicaciones.php');


	if(!$resultado){
		echo "no se registro";
		header('Location: ../nueva-ubicacion.php');
	}

	


?>
