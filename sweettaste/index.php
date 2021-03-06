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
        <title>Principal</title>
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
								<div class="card-box widget-inline">
									<div class="row">
										<div class="col-lg-3 col-sm-6">
											<div class="widget-inline-box text-center" data-toggle="tooltip" data-placement="top" title="" data-original-title="Número total de pedidos pendientes">
												<h3 class="m-t-10"><i class="text-primary mdi mdi-shopping"></i> <b data-plugin="counterup"><?php echo getNumPedidos() ?></b></h3>
												<p class="text-muted">PEDIDOS</p>
											</div>
										</div>

										<div class="col-lg-3 col-sm-6">
											<div class="widget-inline-box text-center" data-toggle="tooltip" data-placement="top" title="" data-original-title="Número total de ventas concretadas">
												<h3 class="m-t-10"><i class="text-custom fa fa-dollar"></i> <b data-plugin="counterup"><?php echo getNumVentas() ?></b></h3>
												<p class="text-muted">VENTAS</p>
											</div>
										</div>

										<div class="col-lg-3 col-sm-6">
											<div class="widget-inline-box text-center" data-toggle="tooltip" data-placement="top" title="" data-original-title="Número total de clientes registrados">
												<h3 class="m-t-10"><i class="text-info mdi mdi-account-multiple"></i> <b data-plugin="counterup"><?php echo getNumClientes() ?></b></h3>
												<p class="text-muted">CLIENTES</p>
											</div>
										</div>

										<div class="col-lg-3 col-sm-6">
											<div class="widget-inline-box text-center b-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Número total de distribuidores">
												<h3 class="m-t-10"><i class="text-danger mdi mdi-truck-delivery"></i> <b data-plugin="counterup"><?php echo getNumDistribuidores() ?></b></h3>
												<p class="text-muted">DISTRIBUIDORES</p>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
                        <!--end row -->


                        <div class="row">
                     
                           <div class="col-lg-6">
                                <div class="p-20 m-b-20">
                                    <h4 class="m-t-0">Actividad de los usuarios</h4>
                                    <div id="website-stats" style="height: 320px;" class="flot-chart"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="m-t-0">Ganancias</h4>
                                    <div class="text-center">

                                    </div>
                                    <div id="dashboard-line-chart" style="height: 300px;"></div>
                                </div>
                            </div> <!-- end col -->

                        </div> <!-- end row -->



                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="m-t-0">Inversión en inventario</h4>
                                    <div class="text-center">

                                    </div>
                                        <div id="dashboard-bar-stacked" style="height: 300px;"></div>
                                    </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="p-20 m-b-20">
                                    <h4 class="m-t-0">Ventas en el último mes</h4>

                                    <div id="website-stats1" style="height: 320px;" class="flot-chart"></div>
                                </div>
                            </div>

                        </div> <!-- end row -->

                        <div class="row m-t-30">
                            <div class="col-sm-12 m-t-30">
                                <h4 class="header-title m-t-0">Lo más vendido del mes</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-6 text-center">
                                <div class="p-20 m-b-20">
                                    <input data-plugin="knob" data-width="150" data-height="150" data-min="0"
                                           data-fgColor="#d331a2" data-displayPrevious=true value="50" />
                                    <h6 class="text-muted m-t-10">Pasteles</h6>
                                </div>
                            </div><!-- end col-->
                            <div class="col-md-3 col-sm-6 text-center">
                                <div class="p-20 m-b-20">
                                    <input data-plugin="knob" data-width="150" data-height="150" data-min="0"
                                           data-fgColor="#24c46a" data-displayPrevious=true value="36"/>
                                    <h6 class="text-muted m-t-10">Pays</h6>
                                </div>
                            </div><!-- end col-->
                            <div class="col-md-3 col-sm-6 text-center">
                                <div class="p-20 m-b-20">
                                    <input data-plugin="knob" data-width="150" data-height="150" data-min="0"
                                           data-fgColor="#24c4bd" data-displayPrevious=true value="29"/>
                                    <h6 class="text-muted m-t-10">Flancakes</h6>
                                </div>
                            </div><!-- end col-->
                            <div class="col-md-3 col-sm-6 text-center">
                                <div class="p-20 m-b-20">
                                    <input data-plugin="knob" data-width="150" data-height="150" data-min="0"
                                           data-fgColor="#c4244b" data-displayPrevious=true value="24"/>
                                    <h6 class="text-muted m-t-10">Cupcakes</h6>
                                </div>
                            </div><!-- end col-->
                        </div><!-- end row -->



















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

        <!--Morris Chart-->
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/pages/jquery.morris.init.js"></script>

        <!-- Flot chart -->
        <script src="assets/plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.orderBars.min.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="assets/pages/jquery.flot.init.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

        <!-- App Js -->
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $('[data-plugin="knob"]').each(function(idx, obj) {
                $(this).knob();
             });
        </script>

    </body>
    <?php desconectar() ?>
</html>