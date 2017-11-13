 <?php
	require "../funcs/funciones.php";

	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	$sabor = $_POST["sabor"];
	$complementos = $_POST["complementos"];
	$tamano = $_POST["tamano"];
	$precio = $_POST["precio"];

	$modificar = "UPDATE productos SET nombre='$nombre', tipo='$tipo', sabor='$sabor', complementos='$complementos', tamano='$tamano', precio='$precio' WHERE id='$id'";


	conectar();

	$resultado = mysqli_query($conexion, $modificar);

	desconectar();

	header('Location: ../productos.php');
?>
