<?php
	require "../funcs/funciones.php";

	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	$fecha = $_POST["fecha"];
	$costo = $_POST["costo"];

	$insertar = "INSERT INTO equipo VALUES (NULL, '$nombre', '$descripcion', '$fecha', '$costo')";


	conectar();

	$resultado = mysqli_query($conexion, $insertar);
	desconectar();
	header('Location: ../equipo.php');


	if(!$resultado){
		echo "no se registro";
		header('Location: ../nuevo-producto.php');
	}

	


?>
