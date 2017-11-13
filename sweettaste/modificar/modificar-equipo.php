 <?php
	require "../funcs/funciones.php";

	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	$fecha = $_POST["fecha"];
	$costo = $_POST["costo"];

	$modificar = "UPDATE equipo SET nombre='$nombre', descripcion='$descripcion', fecha_adquisicion='$fecha', costo='$costo' WHERE id='$id'";


	conectar();

	$resultado = mysqli_query($conexion, $modificar);

	desconectar();

	header('Location: ../equipo.php');
?>
