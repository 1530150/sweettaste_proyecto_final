 <?php
	require "../funcs/funciones.php";

	$nombre = $_POST["nombre"];
	$apellidoP = $_POST["apellidoP"];
	$apellidoM = $_POST["apellidoM"];
	$fecha = $_POST["fecha"];
	$calle = $_POST["calle"];
	$numero = $_POST["numero"];
	$colonia = $_POST["colonia"];
	$codigoP = $_POST["codigoP"];
	$email = $_POST["emaili"];
	$telefono = $_POST["telefono"];


	$modificar = "UPDATE persona SET nombre='$nombre', apellido_paterno='$apellidoP', apellido_materno='$apellidoM', fecha_nacimiento='$fecha', calle='$calle', num_ext='$numero', colonia='$colonia', codigo_postal='$codigoP', telefono='$telefono' WHERE email='$email'";


	conectar();

	$resultado = mysqli_query($conexion, $modificar);

	desconectar();

	header('Location: ../clientes.php');
?>
