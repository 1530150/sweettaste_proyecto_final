<?php
	require "../funcs/funciones.php";

	$nombre = $_POST["nombre"];
	$apellidoP = $_POST["apellidoP"];
	$apellidoM = $_POST["apellidoM"];
	$fechan = $_POST["fechan"];
	$calle = $_POST["calle"];
	$numero = $_POST["numero"];
	$colonia = $_POST["colonia"];
	$codigoP = $_POST["codigoP"];
	$email = $_POST["email"];
	$contrasena = $_POST["contrasena"];
	$telefono = $_POST["telefono"];

	$insertar = "INSERT INTO persona(nombre, apellido_paterno, apellido_materno, fecha_nacimiento, calle, num_ext, colonia, codigo_postal, email, telefono) VALUES ('$nombre', '$apellidoP', '$apellidoM', '$fechan', '$calle', '$numero', '$colonia', '$codigoP', '$email', '$telefono')";

	$insertar2 = "INSERT INTO usuario VALUES ('$email','$contrasena',0)";



	/*
	if($_FILES["imagen"]["error"] > 0){
		echo "Error";
	}
	else{
		$permitidos = array("image/*");
		$limite_kb = 2048;

		$ruta = '../assets/images/usuarios/';
		$archivo = $ruta.$email;

		if(!file_exists($ruta)){
			mkdir($ruta);
			
		}

		$resultadoimg = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo);
	}




	$nombre = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	$tamano = $_FILES['imagen']['size'];
	$ruta = $_FILES['imagen']['tmp_name'];
	$destino = "../assets/images/usuarios/".$email;

	copy($ruta,$destino);
	*/


	conectar();

	$verificar = mysqli_query($conexion,"SELECT * FROM persona WHERE email = '$email'");

	if(mysqli_num_rows($verificar) == 0){
		$resultado = mysqli_query($conexion, $insertar);
		$resultado2 = mysqli_query($conexion, $insertar2);
		desconectar();
		header('Location: ../login.php');

		if(!$resultado){
			echo "no se registro";
			header('Location: ../registro.php');
		}
	}
?>