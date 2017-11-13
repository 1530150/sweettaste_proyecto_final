 <?php
	require "../funcs/funciones.php";

	$email = $_GET['usuario'];


	$modificar = "UPDATE usuario SET nivel=1 WHERE email='$email'";


	conectar();

	$resultado = mysqli_query($conexion, $modificar);

	desconectar();

	header('Location: ../solicitudes.php');
?>
