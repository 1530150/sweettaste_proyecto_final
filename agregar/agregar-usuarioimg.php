<?php

	$nombre = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	$tamano = $_FILES['imagen']['size'];
	$ruta = $_FILES['imagen']['tmp_name'];
	$destino = "usuarios/".$email;

	copy($ruta,$destino);

?>