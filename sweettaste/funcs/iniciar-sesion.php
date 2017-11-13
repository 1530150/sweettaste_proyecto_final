<?php
	require "funciones.php";
	$usuario = $_POST["email"];
	$contrasena = $_POST["contrasena"];

	conectar();
    //Se valida que haya iniciado sesión
	if(validarLogin($usuario, $contrasena)){
		header("Location: ../index.php");
	}
    //Sino se muestra un mensaje de error al intentar iniciar sesión
	else{
		echo"
		<script>
			alert('Datos incorrectos');
			location.href = '../login.php';
		</script>
		";
    desconectar();
	}
?>