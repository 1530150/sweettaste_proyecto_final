<?php
require 'funcs/funciones.php';

if(!sesionIniciada()){
    header('Location: login.php');
}

conectar();
$usuario = getUsuario();
$productos = getProductos();
$clientes = getClientes();

desconectar();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Nuevo Pedido</title>
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

        <!-- Plugins css-->
        <link href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/plugins/switchery/switchery.min.css">
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- Summernote css -->
        <link href="assets/plugins/summernote/summernote.css" rel="stylesheet" />

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
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="m-t-0 header-title">Agregar pedido</h4>
                                <a href="pedidos.php" class="btn btn-custom" style="float: right; display: inline;">Atrás</a>

                               <div class="col-lg-6">
                                <div class="p-20 m-b-20">
                                    <div class="p-20 m-b-20">
                                        <form action="agregar/agregar-pedido.php" method="POST" class="form-validation">

                                            <div class="form-group">
                                                <label for="producto">Producto<span class="text-danger">*</span></label>
                                                <br>
                                                <select name="producto" id="producto">
                                                    <option> Elegir producto... </option>
                                                    <?php foreach($productos as $producto): ?>
                                                    <option value="<?php echo $producto[0] ?>"><?php echo $producto[1] ?></option>
                                                    <?php endforeach ?>
                                                <select/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cliente">Cliente<span class="text-danger">*</span></label>
                                                <br>
                                                <select name="cliente" id="cliente">
                                                    <option> Elegir cliente... </option>
                                                    <?php foreach($clientes as $cliente): ?>
                                                    <option value="<?php echo $cliente[8] ?>"><?php echo $cliente[0]," ",$cliente[1]," ",$cliente[2]?></option>
                                                    <?php endforeach ?>
                                                <select/>
                                            </div>
                                            <?php desconectar() ?>
                                            
                                            <br>
                                            <br>
                                            <h4>Lugar de entrega</h4>

                                            <div class="form-group m-b-20">
                                                <label for="calle">Calle<span class="text-danger">*</span></label>
                                                <input type="text" name="calle" parsley-trigger="change" required
                                                       placeholder="Calle" class="form-control" id="calle">
                                            </div>
                                            
                                            <div class="form-group m-b-20">
                                                <label for="numero">Número<span class="text-danger">*</span></label>
                                                <input type="text" name="numero" parsley-trigger="change" required
                                                       placeholder="Número" class="form-control" id="numero">
                                            </div>
                                            
                                            <div class="form-group m-b-20">
                                                <label for="colonia">Colonia<span class="text-danger">*</span></label>
                                                <input type="text" name="colonia" parsley-trigger="change" required
                                                       placeholder="Colonia" class="form-control" id="colonia">
                                            </div>

                                            <br>
                                            <br>
                                            <div class="form-group m-b-20">
                                                <label>Fecha de entrega<span class="text-danger">*</span></label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="fechae">
                                                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <label>Hora de entrega<span class="text-danger">*</span></label>
                                                <div class="input-group clockpicker m-b-20" data-placement="top" data-align="top" data-autoclose="true">
                                                    <input type="text" class="form-control" value="13:14" name="horae">
                                                    <span class="input-group-addon"> <span class="mdi mdi-clock"></span> </span>
                                                </div>
                                            </div>

                                            

                                            <div class="form-group text-right m-b-0">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                    Guardar
                                                </button>
                                                <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                    Cancelar
                                                </button>
                                            </div>

                                        </form>
                                    </div>

                                </div>
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

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>

        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/plugins/summernote/summernote.min.js"></script>

        <!-- form advanced init js -->
        <script src="assets/pages/jquery.form-advanced.init.js"></script>



    </body>
</html>