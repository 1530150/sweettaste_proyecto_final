<?php
	require "../funcs/funciones.php";

	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	$sabor = $_POST["sabor"];
	$complementos = $_POST["complementos"];
	$tamano = $_POST["tamano"];
	$precio = $_POST["precio"];

	$insertar = "INSERT INTO productos(nombre, tipo, sabor, complementos, tamano, precio) VALUES ('$nombre', '$tipo', '$sabor', '$complementos', '$tamano', '$precio')";


	conectar();

	$verificar = mysqli_query($conexion,"SELECT * FROM productos WHERE nombre = '$nombre'");

	if(mysqli_num_rows($verificar) == 0){
		$resultado = mysqli_query($conexion, $insertar);
		desconectar();
		header('Location: ../nuevo-producto.php');


		if(!$resultado){
			echo "no se registro";
			header('Location: ../nuevo-producto.php');
		}
	}

	


?>
