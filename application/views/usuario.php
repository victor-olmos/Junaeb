<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Perfil - JUNAEB</title>

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
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

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
							<li>
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
							</li>
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
                    <a class="navbar-brand" href="#">Perfil</a>
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
                                <h4 class="title">Editar Perfil</h4>
                            </div>
                            <div class="content">
                                <form method="POST" name="formUser" id="formUser" action="usuario/crearUsuario" accept-charset="utf-8">
                                    <div class="row">
                                        <div class="col-md-4">
																					<div class="form-group">
																					  <label for="tipouser_id">Selecciona el tipo de usuario:</label>
																							<select name="tipouser_id" class="form-control" id="tipouser_id">
																								<?php foreach ($tipo_usuario as $tipo){ ?>
																									<option value="<?php echo $tipo->TIPOUSER_ID ?>"><?php echo $tipo->TIPOUSER_NOMBRE ?></option>
																								<?php } ?>
																							</select>
																					</div>
                                        </div>
                                    </div>

																		<div class="row">
                                        <div class="col-md-4">
																					<div class="form-group">
																					  <label for="cargo_id">Selecciona el cargo:</label>
																							<select name="cargo_id" class="form-control" id="cargo_id">
																								<?php foreach ($cargos as $cargo){ ?>
																									<option value="<?php echo $cargo->CARGO_ID ?>"><?php echo $cargo->CARGO_NOMBRE ?></option>
																								<?php } ?>
																							</select>
																					</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" name="usuario_nombre" id="usuario_nombre"  value="">
                                            </div>
                                        </div>

                                    </div>

																		<div class="row">
																				<div class="col-md-4">
																						<div class="form-group">
																								<label>Usuario</label>
																								<input type="text" class="form-control" name="usuario_user" id="usuario_user"  value="">
																						</div>
																				</div>

																		</div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input type="password" class="form-control" placeholder="" name="usuario_pass" id="usuario_pass" value="">
                                            </div>
											 <div class="form-group">
                                                <label>Repetir Contraseña</label>
                                                <input type="password" name="clave" id="clave" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-info btn-fill pull-right" name="enviar" id="enviar" onclick="sendData();">CREAR</button>
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


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">

                </nav>

            </div>
        </footer>

    </div>
</div>


</body>
<script type="text/javascript">
 function salir(){
		 alert("Saliendo de la sesión actual.");
		 window.location = "login";
 }

</script>
<script type="text/javascript">

function sendData(){
	if($('#usuario_pass').val() == $('#clave').val()){
		document.getElementById("formUser").submit();
	}
	else{
		alert("Las contraseñas son distintas, intentelo nuevamente");
	}
}

</script>
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

</html>
