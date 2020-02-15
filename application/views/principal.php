<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="images/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Indicadores - JUNAEB</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="images/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
                    MENU
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="principal">
                        <i class="pe-7s-graph"></i>
                        <p>GRAFICO</p>
                    </a>
                </li>
								<?php
								 	if($this->session->userdata('tipo') == "1"){
										echo "<li>
		                    <a href='usuario'>
		                        <i class='pe-7s-user'></i>
		                        <p>CREAR USUARIO</p>
		                    </a>
		                </li>";
									}
								?>
                <li>
                    <a href="listado">
                        <i class="pe-7s-note2"></i>
                        <p>LISTA DE TAREAS</p>
                    </a>
                </li>
                <li>
                    <a href="tarea">
                        <i class="pe-7s-news-paper"></i>
                        <p>CREAR TAREA</p>
                    </a>
                </li>
								<li>
										<a href="listar">
												<i class="pe-7s-note2"></i>
												<p>LISTA DE OBJETIVOS</p>
										</a>
								</li>
								<li>
										<a href="objetivo">
												<i class="pe-7s-news-paper"></i>
												<p>CREAR OBJETIVOS</p>
										</a>
								</li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">INDICADORES</a>
                </div>
                <div class="collapse navbar-collapse">


                    <ul class="nav navbar-nav navbar-right">


                        <li>
                            <a href="#" onclick="salir()">
                                SALIR
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tareas Generales</h4>
                                <p class="category">Estado de tareas</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> No iniciadas
                                        <i class="fa fa-circle text-danger"></i> En curso
                                        <i class="fa fa-circle text-warning"></i> Terminadas
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Todas las tareas
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
										<div class="col-md-6">
												<div class="card">
														<div class="header">
																<h4 class="title">Objetivos</h4>
																<p class="category">Estado de los objetivos</p>
														</div>
														<div class="content">
																<div id="chartPreferences2" class="ct-chart ct-perfect-fourth"></div>

																<div class="footer">
																		<div class="legend">
																				<i class="fa fa-circle text-info"></i> Iniciadas
																				<i class="fa fa-circle text-danger"></i> Terminadas
																		</div>
																		<hr>
																		<div class="stats">
																				<i class="fa fa-clock-o"></i> Todos los objetivos
																		</div>
																</div>
														</div>
												</div>
										</div>
                </div>

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 kjakjakjjshdfgjdh
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="js/demo.js"></script>
	<script type="text/javascript">
	 function salir(){
			 alert("Saliendo de la sesión actual.");
			 window.location = "login";
	 }

	</script>
	<script type="text/javascript">

    	$(document).ready(function(){
        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-user',
            	message: "Bienvenido, <?php echo $this->session->userdata('usuario_nombre') ?>"

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
