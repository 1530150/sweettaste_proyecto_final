<?php

$conexion = null;

//Función para conectarse a la base de datos
function conectar(){
	global $conexion;

	$servidor = "localhost";
	$usuario = "root";
	$contrasena = "";
	$baseDeDatos = "sweettaste";

	$conexion = mysqli_connect($servidor, $usuario, $contrasena, $baseDeDatos);

	mysqli_set_charset($conexion, 'utf8');
}




//Función para desconectarse de la base de datos
function desconectar(){
	global $conexion;

	mysqli_close($conexion);
}




//Función para validar que se haya iniciado sesión
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




//Función para obtener los registros de los usuarios
function getUsuarios(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM persona INNER JOIN usuario ON persona.email = usuario.email WHERE usuario.nivel != 0");
    return $respuesta->fetch_all();
}

//Función para obtener los registros de las solicitudes de usuarios
function getSolicitudes(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM persona INNER JOIN usuario ON persona.email = usuario.email WHERE usuario.nivel = 0");
    return $respuesta->fetch_all();
}

//Función para obtener el número de solicitudes
function numSolicitudes(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT COUNT(*) FROM usuario WHERE usuario.nivel = 0");
    $num=mysqli_fetch_array($respuesta);
    if($num[0] > 0){
        return "<span class='badge badge-custom pull-right'>$num[0]</span>";
    }
    else{
        return "";
    }

    
}



//Función para obtener la información del usuario en sesión
function getUsuario(){
    global $conexion;

    $respuesta = mysqli_query($conexion,"SELECT * FROM persona INNER JOIN usuario ON persona.email = usuario.email WHERE usuario.email='".$_SESSION['usuario']."'");
    
    
    return mysqli_fetch_array($respuesta);
}




//Función para comprobar que se haya iniciado sesión
function sesionIniciada(){
    session_start();
    return isset($_SESSION['usuario']);
}




//Función para obtener el nivel del usuario
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




//Función para devolver el nivel del usuario, esta recibe como parametro la llave de la tabla usuario
function getNivelP($email){
    global $conexion;

    $respuesta = mysqli_query($conexion,"SELECT * FROM usuario WHERE email='".$email."'");
    
    
    $usuario = mysqli_fetch_array($respuesta);

    if($usuario[2] == 3){
        return "Administrador";
    }
    else{
        return "Usuario";
    }

}




//Función para obtener los productos
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
    $respuesta = mysqli_query($conexion,"SELECT * FROM persona LEFT JOIN usuario ON persona.email=usuario.email WHERE usuario.email IS NULL");
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
    $respuesta = mysqli_query($conexion,"SELECT COUNT(*) FROM persona LEFT JOIN usuario ON persona.email=usuario.email WHERE usuario.email IS NULL");
    $num=mysqli_fetch_array($respuesta);
    return $num[0];
}

function getNumDistribuidores(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT COUNT(*) FROM distribuidores");
    $num=mysqli_fetch_array($respuesta);
    return $num[0];
}

function getUbicaciones(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM ubicaciones");
    return $respuesta->fetch_all();
}

function getEquipo(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM equipo");
    return $respuesta->fetch_all();
}

function getItems(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM items");
    return $respuesta->fetch_all();
}

function getDistribuidores(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM distribuidores");
    return $respuesta->fetch_all();
}

function getRecetas(){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT recetas.id_producto, productos.nombre, recetas.ingredientes, recetas.instrucciones FROM recetas INNER JOIN productos ON recetas.id_producto = productos.id");
    return $respuesta->fetch_all();
}

function getReceta($id){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM recetas WHERE id_producto='".$id."'");
    return mysqli_fetch_array($respuesta);
}

function getEquipo1($id){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM equipo WHERE id='".$id."'");
    return mysqli_fetch_array($respuesta);
}

function getItem($id){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM items WHERE id='".$id."'");
    return mysqli_fetch_array($respuesta);
}

function getCliente($email){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM persona WHERE email='".$email."'");
    return mysqli_fetch_array($respuesta);
}

function getDistribuidor($email){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM distribuidores WHERE email='".$email."'");
    return mysqli_fetch_array($respuesta);
}

function getUbicacion($id){
    global $conexion;
    $respuesta = mysqli_query($conexion,"SELECT * FROM ubicaciones WHERE id='".$id."'");
    return mysqli_fetch_array($respuesta);
}


?>