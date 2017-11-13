 <?php
	require "../funcs/funciones.php";

	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$calle = $_POST["calle"];
	$numero = $_POST["numero"];
	$colonia = $_POST["colonia"];
	$codigop = $_POST["codigop"];

	echo $id," ",$nombre," ",$calle," ",$numero," ",$colonia," ",$codigop;

	$modificar = "UPDATE ubicaciones SET nombre='$nombre', calle='$calle', num='$numero', colonia='$colonia', codigo_postal='$codigop' WHERE id='$id'";


	conectar();

	$resultado = mysqli_query($conexion, $modificar);

	desconectar();

	header('Location: ../ubicaciones.php');
?>
