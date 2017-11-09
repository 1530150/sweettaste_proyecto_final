<?php

$conexion = null;

function conectar(){
	global $conexion;

	$servidor = "localhost";
	$usuario = "root";
	$contrasena = "";
	$baseDeDatos = "sweettaste";

	$conexion = mysqli_connect($servidor, $usuario, $contrasena, $baseDeDatos);

	mysqli_set_charset($conexion, 'utf8');
}





function desconectar(){
	global $conexion;

	mysqli_close($conexion);
}





function validarLogin($usuario,$clave){
	global $conexion;

	conectar();
	
    $consulta = "SELECT * FROM usuario WHERE email='".$usuario."' AND contrasena='".$clave."'";
    $respuesta = mysqli_query($conexion,$consulta);

    
    if($fila = mysqli_fetch_row($respuesta)){
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nivel'] = $fila[4];
        return true;
    }
    return false;
	desconectar();
}





function getUsuarios(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM persona");
    return $respuesta->fetch_all();
}





function getUsuario(){
    global $conexion;

    $respuesta = mysqli_query($conexion,"SELECT * FROM persona INNER JOIN usuario ON persona.email = usuario.email WHERE usuario.email='".$_SESSION['usuario']."'");
    
    
    return mysqli_fetch_array($respuesta);
}





function sesionIniciada(){
    session_start();
    return isset($_SESSION['usuario']);
}





function getNivel(){
    global $conexion;

    $respuesta = mysqli_query($conexion,"SELECT * FROM usuario WHERE email='".$_SESSION['usuario']."'");
    
    
    $usuario = mysqli_fetch_array($respuesta);

    if($usuario[2] == 3){
        return "Administrador";
    }
    else{
        return "Usuario";
    }

}





function getProductos(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM productos");
    return $respuesta->fetch_all();
}





function getProducto($id){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM productos WHERE id='".$id."'");
    return mysqli_fetch_array($respuesta);
}





function getClientes(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM persona");
    return $respuesta->fetch_all();
}



function getPedidos(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT pedidos.id, pedidos.estado, productos.nombre as producto, CONCAT(persona.nombre,' ',persona.apellido_paterno,' ',persona.apellido_materno) as cliente, CONCAT(pedidos.calle_entrega,', ',pedidos.num_ext_entrega,', ',pedidos.colonia_entrega) as direccion, pedidos.fecha_entrega, pedidos.hora_entrega, productos.precio FROM pedidos INNER JOIN persona ON persona.email=pedidos.cliente INNER JOIN productos ON productos.id=pedidos.producto WHERE pedidos.estado=0");
    return $respuesta->fetch_all();

}

function getVentas(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT pedidos.id, pedidos.estado, productos.nombre as producto, CONCAT(persona.nombre,' ',persona.apellido_paterno,' ',persona.apellido_materno) as cliente, CONCAT(pedidos.calle_entrega,', ',pedidos.num_ext_entrega,', ',pedidos.colonia_entrega) as direccion, pedidos.fecha_entrega, pedidos.hora_entrega, productos.precio FROM pedidos INNER JOIN persona ON persona.email=pedidos.cliente INNER JOIN productos ON productos.id=pedidos.producto WHERE pedidos.estado=1");
    return $respuesta->fetch_all();

}


function getNumPedidos(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT COUNT(*) FROM pedidos WHERE estado=0");
    $num=mysqli_fetch_array($respuesta);
    return $num[0];
}

function getNumVentas(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT COUNT(*) FROM pedidos WHERE estado=1");
    $num=mysqli_fetch_array($respuesta);
    return $num[0];
}

function getNumClientes(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT COUNT(*) FROM persona");
    $num=mysqli_fetch_array($respuesta);
    return $num[0];
}

function getNumDistribuidores(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT COUNT(*) FROM distribuidores");
    $num=mysqli_fetch_array($respuesta);
    return $num[0];
}

?>