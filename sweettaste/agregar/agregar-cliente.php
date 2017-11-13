<?php
	require "../funcs/funciones.php";
    
    //Se obtienen los datos mediante el metodo post
	$nombre = $_POST["nombre"];
	$apellidoP = $_POST["apellidoP"];
	$apellidoM = $_POST["apellidoM"];
	$fecha = $_POST["fecha"];
	$calle = $_POST["calle"];
	$numero = $_POST["numero"];
	$colonia = $_POST["colonia"];
	$codigoP = $_POST["codigoP"];
	$email = $_POST["email"];
	$telefono = $_POST["telefono"];

    //Consulta para insertar los datos en la tabla
	$insertar = "INSERT INTO persona(nombre, apellido_paterno, apellido_materno, fecha_nacimiento, calle, num_ext, colonia, codigo_postal, email, telefono) VALUES ('$nombre', '$apellidoP', '$apellidoM', '$fecha', '$calle', '$numero', '$colonia', '$codigoP', '$email', '$telefono')";



	/*
    //Bloque de código para agregar una imagen del cliente
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



    //Se guarda la imagen
	$nombre = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	$tamano = $_FILES['imagen']['size'];
	$ruta = $_FILES['imagen']['tmp_name'];
	$destino = "../assets/images/usuarios/".$email;

	copy($ruta,$destino);
	*/


	conectar();

    //Se verifica que no exista ya este cliente
	$verificar = mysqli_query($conexion,"SELECT * FROM persona WHERE email = '$email'");

	if(mysqli_num_rows($verificar) == 0){
        //Se guardan las dos consultas en una variable y se ejecutan
		$resultado = mysqli_query($conexion, $insertar);
		$resultado2 = mysqli_query($conexion, $insertar2);
		desconectar();
		header('Location: ../clientes.php');

        //Si no se registro se muestra de nuevo el formulario de agregación
		if(!$resultado){
			echo "no se registro";
			header('Location: ../nuevo-cliente.php');
		}
	}
?>