<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Crear Tareas - JUNAEB</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

		<link rel="stylesheet" href="css/jquery.mobile.datepicker.css" />
		<link rel="stylesheet" href="css/jquery.mobile.datepicker.theme.css" />

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
    <div class="sidebar" data-color="blue" data-image="images/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


		<div class="sidebar-wrapper">
					<div class="logo">
							<a  class="simple-text">
									MENU
							</a>
					</div>

					<ul class="nav">
						<li>
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
								<li class="active">
									<a href="tarea">
											<i class="pe-7s-news-paper"></i>
											<p>CREAR TAREA</p>
									</a>
								</li>
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
                    <a class="navbar-brand" href="#">CREAR TAREAS</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Crear Tareas</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="tarea/crearTarea" accept-charset="utf-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control"  value="" name="actividad_nombre">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
																					<div class="form-group">
																							<label>Inicio </label>
																							<!--<input type="datetime" class="form-control"  value="" name="actividad_fechainicio">-->
																							<input type="text" class="form-control" name="actividad_fechainicio" placeholder="Formato: 2016-12-01">

																					</div>
                                        </div>

                                    </div>

                                	<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fin </label>
                                                <!--<input type="datetime" class="form-control"  value="" name="actividad_fechatermino">-->
																						<input type="text" class="form-control" name="actividad_fechaTermino" placeholder="Formato: 2016-12-01">
                                            </div>
                                        </div>

                                    </div>

									<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Responsable</label>
                                                <input type="text" class="form-control"  value="" name="actividad_responsable">
                                            </div>
                                        </div>

                                    </div>

									<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Descripcion</label>
                                                <input type="textarea" class="form-control"  value="" name="actividad_descripcion">
                                            </div>
                                        </div>

                                    </div>
																		<input type="hidden" name="estado_id" value="3">
																		<input type="hidden" name="usuario_id" value="<?php echo $this->session->userdata('id_user') ?>">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">CREAR</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>

                </div>
            </div>
        </div>




    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<!--  CALENDARIO ---->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/datepicker.js"></script>
<script src="http://code.jquery.com/mobile/git/jquery.mobile-git.js"></script>
<script src="js/jquery.mobile.datepicker.js"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="js/bootstrap-notify.js"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="js/light-bootstrap-dashboard.js"></script>



<script src="js/bootstrap.js"></script>


<script type="text/javascript" src="js/moment.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="js/demo.js"></script>



<script type="text/javascript">
 function salir(){
		 alert("Saliendo de la sesión actual.");
		 window.location = "login";
 }

</script>
</html>
