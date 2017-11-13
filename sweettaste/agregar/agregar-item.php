<?php
	require "../funcs/funciones.php";

	$nombre = $_POST["nombre"];
	$marca = $_POST["marca"];
	$presentacion = $_POST["presentacion"];
	$costo = $_POST["costo"];

	$insertar = "INSERT INTO items VALUES (NULL, '$nombre', '$marca', '$presentacion', '$costo')";


	conectar();

	$resultado = mysqli_query($conexion, $insertar);
	desconectar();
	header('Location: ../inventario.php');


	if(!$resultado){
		echo "no se registro";
		header('Location: ../nuevo-item.php');
	}

	


?>
