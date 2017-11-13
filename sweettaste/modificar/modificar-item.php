 <?php
	require "../funcs/funciones.php";

	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$marca = $_POST["marca"];
	$presentacion = $_POST["presentacion"];
	$costo = $_POST["costo"];

	$modificar = "UPDATE items SET nombre='$nombre', marca='$marca', presentacion='$presentacion', costo='$costo' WHERE id='$id'";


	conectar();

	$resultado = mysqli_query($conexion, $modificar);

	desconectar();

	header('Location: ../inventario.php');
?>
