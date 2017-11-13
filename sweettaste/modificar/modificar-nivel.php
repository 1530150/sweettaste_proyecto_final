 <?php
	require "../funcs/funciones.php";

	$email = $_POST["emaili"];
	$nivel = $_POST["nivel"];


	$modificar = "UPDATE usuario SET nivel='$nivel' WHERE email='$email'";


	conectar();

	$resultado = mysqli_query($conexion, $modificar);

	desconectar();

	header('Location: ../usuarios.php');
?>
