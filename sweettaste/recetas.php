<?php
require 'funcs/funciones.php';

if(!sesionIniciada()){
    header('Location: login.php');
}

conectar();
$usuario = getUsuario();

$recetas = getRecetas();

desconectar();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Recetas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Sweet Alert -->
        <link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="assets/css/metisMenu.min.css" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="assets/css/icons.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

    </head>

    <?php conectar() ?>
    <body>

        <div id="page-wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="">
                        <a href="index.php" class="logo">
                            <img src="assets/images/st-logo.png" alt="logo" class="logo-lg" style="height: 60px !important" />
                            <img src="assets/images/logo_sm.png" alt="logo" class="logo-sm hidden" />
                        </a>
                    </div>
                </div>

                <!-- Top navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">

                            <!-- Mobile menu button -->
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile visible-xs visible-sm">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <!-- Top nav left menu -->
                            <ul class="nav navbar-nav hidden-sm hidden-xs top-navbar-items">
                                <li><a href="timeline.php">Línea de actividades</a></li>
                                <li><a href="nosotros.php">Equipo Sweet Taste</a></li>
                            </ul>

                            <!-- Top nav Right menu -->
                            <ul class="nav navbar-nav navbar-right top-navbar-items-right pull-right">
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle menu-right-item profile" data-toggle="dropdown" aria-expanded="true" style="font-weight: bold"><img src="assets/images/admin.jpg" alt="user-img" class="img-circle"> <?php echo $usuario[0], " ", $usuario[1], " ", $usuario[2] ?> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="perfil.php"><i class="ti-user m-r-10"></i> Perfil</a></li>
                                        <li><a href="funcs/cerrar-sesion.php"><i class="ti-power-off m-r-10"></i> Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end container -->
                </div> <!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- Page content start -->
            <div class="page-contentbar">

                 <!--left navigation start-->
                <aside class="sidebar-navigation">
                    <div class="scrollbar-wrapper">
                        <div>
                            <button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                                <i class="mdi mdi-close"></i>
                            </button>
                            <!-- User Detail box -->
                            <div class="user-details">
                                <div class="pull-left">
                                    <img src="assets/images/admin.jpg" alt="" class="thumb-md img-circle">
                                </div>
                                <div class="user-info">
                                   <a href=""> <?php echo $usuario[0], " ", $usuario[1], " ", $usuario[2] ?> </a>
                                    <p class="text-muted m-0"> <?php echo getNivel() ?> </p>
                                </div>
                            </div>
                            <!--- End User Detail box -->

                            <!-- Left Menu Start -->
                            <ul class="metisMenu nav" id="side-menu">
                                <li><a href="index.php"><i class="fa fa-dashboard"></i> PRINCIPAL </a></li>

                                <li>
                                    <a href="equipo.php"><i class="mdi mdi-stove"></i> EQUIPAMIENTO </a>
                                </li>

                                <li>
                                    <a href="inventario.php"><i class="mdi mdi-package"></i> INVENTARIO </a>
                                </li>

                                <li><a href="javascript: void(0);"><i class="mdi mdi-cake"></i> PRODUCTOS </a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="productos.php">Ver Productos</a></li>
                                        <li><a href="recetas.php">Recetas</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);"><i class="mdi mdi-shopping"></i> PEDIDOS </a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="pedidos.php">Ver Pedidos</a></li>
                                        <li><a href="pedidos-mes.php">Pedidos para este mes</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="ventas.php"><i class="fa fa-dollar"></i> VENTAS </a>
                                </li>

                                <li><a href="clientes.php"><i class="mdi mdi-account-multiple"></i> CLIENTES </a></li>

                                <li>
                                    <a href="distribuidores.php"><i class="mdi mdi-truck-delivery"></i> DISTRIBUIDORES </a>
                                </li>

                                <li>
                                    <a href="javascript: void(0);"><?php echo numSolicitudes() ?><i class="mdi mdi-account-multiple"></i> USUARIOS </a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="usuarios.php">Ver Usuarios</a></li>
                                    </ul>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="solicitudes.php"><?php echo numSolicitudes() ?> Solicitudes de registro </a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="ubicaciones.php"><i class="ti-home"></i> UBICACIONES DE ENTREGA</a>
                                </li>

                            </ul>
                        </div>
                    </div><!--Scrollbar wrapper-->
                </aside>
                <!--left navigation end-->

                <!-- START PAGE CONTENT -->
                <div id="page-right-content">

                    <div class="container">
                        <h4 class="m-t-0 header-title">Recetas</h4>
                        
                        <a class="btn btn-rounded btn-success" style="margin-bottom: 25px;" href="nueva-receta.php">Agregar nueva</a>

                        <button type="button" class="btn btn-info" data-container="body" title="" data-toggle="popover" data-placement="top" data-content="Aquí puedes agregar recetas de tus productos, éstas se mostrarán en esta página. Ojo, solo podrás agregar recetas de productos que tengas registrados." data-original-title="" style="float: right; display: inline;">
                            Info
                        </button>

                        <?php foreach($recetas as $receta): ?>
                        <div class="col-lg-12">
                            <div class="panel panel-color panel-custom" style="margin-bottom: 100px;">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $receta[1] ?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                            <div class="card-box">
                                                </ul>
                                                <ul class="nav nav-tabs navtab-bg nav-justified">
                                                    <li class="active">
                                                        <a href="#ingredientes" data-toggle="tab" aria-expanded="false">
                                                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                                                            <span class="hidden-xs">Ingredientes</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#instrucciones" data-toggle="tab" aria-expanded="true">
                                                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                                                            <span class="hidden-xs">Instrucciones</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="ingredientes">
                                                        <?php echo $receta[2] ?>
                                                    </div>
                                                    <div class="tab-pane" id="instrucciones">
                                                        <?php echo $receta[3] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php ?>


                                        <button class="btn btn-rounded btn-danger waves-effect waves-light btn-sm" id="sa-warning" style="float: right;">Eliminar</button>
                                        <a class="btn btn-rounded btn-custom" href="editar-receta.php?receta=<?=$receta[0] ?>" style="float: right;">Editar</a>
                                </div>
                            </div>
                        </div>

                        <?php endforeach ?>
                    </div>
                    <!-- end container -->

                    <div class="footer">
                        <div>
                            <strong>Sweet Taste</strong> - Copyright &copy; 2017
                        </div>
                    </div> <!-- end footer -->

                </div>
                <!-- End #page-right-content -->

            </div>
            <!-- end .page-contentbar -->
        </div>
        <!-- End #page-wrapper -->



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!--Morris Chart-->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
		<script src="assets/pages/jquery.dashboard.js"></script>

        <!-- Sweet-Alert  -->
        <script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="assets/pages/jquery.sweet-alert.init.js"></script>

        <!-- App Js -->
        <script src="assets/js/jquery.app.js"></script>

    </body>
    <?php desconectar() ?>
</html>