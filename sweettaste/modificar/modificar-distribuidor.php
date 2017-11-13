 <?php
	require "../funcs/funciones.php";

	$nombre = $_POST["nombre"];
	$calle = $_POST["calle"];
	$numero = $_POST["numero"];
	$colonia = $_POST["colonia"];
	$email = $_POST["emaili"];
	$telefono = $_POST["telefono"];


	$modificar = "UPDATE distribuidores SET nombre='$nombre', calle='$calle', num_ext='$numero', colonia='$colonia', telefono='$telefono' WHERE email='$email'";


	conectar();

	$resultado = mysqli_query($conexion, $modificar);

	desconectar();

	header('Location: ../distribuidores.php');
?>
