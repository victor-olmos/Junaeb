<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Lista de Actividades - JUNAEB</title>

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
							<a class="simple-text">
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
								<li class="active">
									<a href="listado">
											<i class="pe-7s-note2"></i>
											<p>LISTA DE TAREAS</p>
									</a>
								</li>
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
                    <a class="navbar-brand" href="#">Lista de actividades</a>
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
                                <h4 class="title">Lista de tareas</h4>
                                <p class="category"></p>
                            </div>

															<div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-success"></i> En Tiempo Deseado
                                        <i class="fa fa-circle text-danger"></i> Atrasada
                                        <i class="fa fa-circle text-warning"></i> Fecha Limite Por Acabar
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Estados
                                    </div>
                                </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Nombre</th>
                                    	<th>Responsable</th>
                                    	<th>Plazo</th>
                                    	<th>Estado</th>
                                    </thead>
                                    <tbody>
																				<?php foreach ($tareas as $tarea){ ?>
																					<tr>
	                                        	<td><?php echo $tarea->ID ?></td>
	                                        	<td><a href="#" onclick="modalTarea(<?php echo $tarea->ID ?>)"><?php echo $tarea->NOMBRE ?></a></td>
	                                        	<td><?php echo $tarea->RESPONSABLE ?></td>
	                                        	<td><?php echo $tarea->PLAZO ?></td>
	                                        	<td>
																							<?php
																							    $segundos=strtotime($tarea->PLAZO) - strtotime('now');
																							    $diferencia_dias=intval($segundos/60/60/24);
																							    if(($diferencia_dias > 15) && ($tarea->ESTADO == "En curso")){
																							      echo "<font color='#87CB16'>";
																							    }
																							    else if(($diferencia_dias < 15 && $diferencia_dias >= 0) && ($tarea->ESTADO == "En curso")){
																							      echo "<font color='yellow'>";
																							    }
																							    else if(($diferencia_dias < 0 ) && ($tarea->ESTADO == "En curso")){
																							      echo "<font color='red'>";
																							    }
																							      echo $tarea->ESTADO;
																							      echo "</font>";
																							  ?>
																						</td>
	                                        </tr>
																				<?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
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

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="nombre">NOMBRE DE LA TAREA</h4>
      </div>
      <div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<p>Responsable: </p>
					</div>
					<div class="col-md-9">
						<p id="responsable">Responsable</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<p>Inicio: </p>
					</div>
					<div class="col-md-4">
						<input type="text" id="inicio" value="asdfg" disabled/>
					</div>
					<div class="col-md-2">
						<p>Termino: </p>
					</div>
					<div class="col-md-4">
						<input type="text" id="termino" value="qwerty" disabled/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<p>Descripción: </p>
					</div>
					<div class="col-md-9">
						<textarea rows="3" cols="50" disabled id="descripcion">ASDASDASDASFASD ASD ASDASD ASGDSGFDSF DS ASD ASD ASDASFDSF ASDASD ASFDSFASDASDAS D ASD ASD AS D</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<p>Estado de la tarea: </p>
					</div>
					<div class="col-md-8">
						<p id="estado">Estado</p>
					</div>
				</div>
      </div>
      <div class="modal-footer">
				<button type="button" id="eliminarButton" class="btn btn-default" data-dismiss="modal"
				onclick="alert('Holi');">Eliminar Tarea</button>
				<button type="button" id="modalButton2" class="btn btn-default" data-dismiss="modal"
				onclick="alert('Holi');">Iniciar Tarea</button>
				<button type="button" id="modalButton" class="btn btn-default" data-dismiss="modal"
				onclick="alert('Holi');">Terminar Tarea</button>
      </div>
    </div>

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
 function modalTarea(id){
	 $("#modalButton").attr("onclick","window.location='<?php echo site_url("listado/updateTarea");?>/"+id+"/2'");
	 $("#modalButton2").attr("onclick","window.location='<?php echo site_url("listado/updateTarea");?>/"+id+"/1'");
	 $("#eliminarButton").attr("onclick","window.location='<?php echo site_url("listado/eliminarTarea");?>/"+id+"'");

	 var ajax_data = {
	 		idTarea     : id
	 };
	 //nombre, responsable, inicio, termino, descripcion, estado
	 $.ajax({
	 type: 'POST',
	 url: 'js/json/apiModalTarea.php',
	 data: ajax_data,
	 dataType: 'json',
	 success: function(tareas)
	 {
	 		 //console.log("tareas = "+tareas);
	 		$.each(tareas, function(i,tarea){
				//console.log("tarea: "+tarea.nombre);
	 			$('#nombre').text("Actividad: "+tarea.nombre);
	 			$('#responsable').text(tarea.responsable);
	 			$('#inicio').val(tarea.inicio);
	 			$('#termino').val(tarea.termino);
	 			$('#descripcion').val(tarea.descripcion);
	 			$('#estado').text(tarea.estado);
	 		});
	 }
    });
	 $('#myModal').modal('show');
	 }
</script>

</html>
