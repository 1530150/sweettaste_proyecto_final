<?php
require 'funcs/funciones.php';

if(!sesionIniciada()){
    header('Location: login.php');
}

conectar();
$usuario = getUsuario();

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

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

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
                                <li><a href="index.php"><i class="ti-home"></i> PRINCIPAL </a></li>

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
                                    <a href="javascript: void(0);"><i class="mdi mdi-truck-delivery"></i> USUARIOS </a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="usuarios.php">Ver Usuarios</a></li>
                                    </ul>
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
                        <a class="btn btn-rounded btn-success" style="margin-bottom: 10px; margin-bottom: 25px;" href="nueva-receta.php">Agregar nueva</a>
                        
                        <div class="col-lg-12">
                            <div class="panel panel-color panel-custom">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Flan Cake</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                            <div class="card-box">
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
                                                        1 tz azúcar <br>
                                                        1 lata leche condensada <br>
                                                        1 lata leche evaporada <br>
                                                        1 caja harina para pastel sabor chocolate <br>
                                                        3 huevos grandes <br>
                                                        aceite en aerosol  <br>
                                                    </div>
                                                    <div class="tab-pane" id="instrucciones">
                                                        Precalienta horno a 350° F. Mueve la rejilla del horno a la posición más baja. Rocía un molde con tubo central (molde bundt) de 10 pulgadas con el antiadherente. Llena una bandeja grande para hornear con agua hasta la mitad y colócala en el horno.
                                                        <br>
                                                        Pon el azúcar en una cacerola pequeña muy resistente a fuego medio bajo, mezclando frecuentemente, de 3 a 4 minutos o hasta que se disuelva y quede de color caramelo.
                                                        <br>
                                                        Pon el azúcar rápidamente en el molde bundt, esparciendo hasta cubrir toda la base.
                                                        <br>
                                                        Mixte las yemas del huevo, la leche condensada azucarada y la leche evaporada en un tazón grande hasta que estén bien mezclados.
                                                        <br>
                                                        Prepare la mezcla de pastel de acuerdo a las instrucciones del paquete.
                                                        <br>
                                                        Vierte la mezcla de los huevos y la leche sobre el caramelo.
                                                        <br>
                                                        Lentamente añade la mezcla del pastel sobre el flan.
                                                        <br>
                                                        Coloca el molde en la bandeja grande en el horno.  
                                                        <br>
                                                        Hornea durante 50 a 60 minutos o hasta que al insertar un palito de madera en el centro salga limpio. Saque el molde del agua.
                                                        <br>
                                                        Poner a enfriar antes de voltear el pastel en un plato para servir.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-rounded btn-danger" href="" style="float: right;">Eliminar</a>
                                        <a class="btn btn-rounded btn-custom" href="" style="float: right;">Editar</a>
                                </div>
                            </div>
                        </div>
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

        <!-- App Js -->
        <script src="assets/js/jquery.app.js"></script>

    </body>
    <?php desconectar() ?>
</html>