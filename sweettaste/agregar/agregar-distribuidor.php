<?php
	require "../funcs/funciones.php";

	$nombre = $_POST["nombre"];
	$calle = $_POST["calle"];
	$numero = $_POST["numero"];
	$colonia = $_POST["colonia"];
	$telefono = $_POST["telefono"];
	$email = $_POST["email"];

	$insertar = "INSERT INTO distribuidores VALUES ('$nombre', '$calle', '$numero', '$colonia', '$email', '$telefono')";


	conectar();

	$resultado = mysqli_query($conexion, $insertar);
	desconectar();
	header('Location: ../distribuidores.php');


	if(!$resultado){
		echo "no se registro";
		header('Location: ../nuevo-distribuidor.php');
	}

	


?>
