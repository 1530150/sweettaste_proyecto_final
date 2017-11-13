<?php
session_start(); //

session_unset();
session_destroy(); //Se cierra la sesión

header('Location: ../login.php'); //Se regresa a la pantalla de loin
?>