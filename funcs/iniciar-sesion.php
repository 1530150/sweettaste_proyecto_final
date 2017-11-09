<?php
	require "funciones.php";
	$usuario = $_POST["email"];
	$contrasena = $_POST["contrasena"];

	conectar();

	if(validarLogin($usuario, $contrasena)){
		header("Location: ../index.php");
	}
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