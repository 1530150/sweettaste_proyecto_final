 <?php
	require "../funcs/funciones.php";

	$producto = $_POST["id"];
	$ingredientes = $_POST["ingredientes"];
	$instrucciones = $_POST["instrucciones"];

	$modificar = "UPDATE recetas SET ingredientes='$ingredientes', instrucciones='$instrucciones' WHERE id_producto='$producto'";

	echo $producto;
	echo $ingredientes;
	echo $instrucciones;


	conectar();

	$resultado = mysqli_query($conexion, $modificar);

	desconectar();

	header('Location: ../recetas.php');
?>
