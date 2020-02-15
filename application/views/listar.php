<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Lista de Objetivos - JUNAEB</title>

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
								<li>
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
							<li  class="active">
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
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                      <th>ID</th>
                                    	<th>Nombre</th>
                                    	<th>Indicador</th>
                                    	<th>Meta</th>
                                    	<th>Avance</th>
																			<th>Estado</th>
                                    </thead>
                                    <tbody>
																				<?php foreach ($objetivos as $objetivo){ ?>
																					<tr>
	                                        	<td><?php echo $objetivo->ID ?></td>
	                                        	<td><a href="#" onclick="modalTarea(<?php echo $objetivo->ID.','.$objetivo->INDICADOR.','.$objetivo->META ?>)"><?php echo $objetivo->NOMBRE ?></a></td>
	                                        	<td><?php echo $objetivo->INDICADOR ?></td>
	                                        	<td><?php echo $objetivo->META.'%' ?></td>
	                                        	<td><?php echo $objetivo->AVANCE ?></td>
																						<td><?php echo $objetivo->ESTADO ?></td>
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
        <h4 class="modal-title" id="nombre">NOMBRE DEL OBJETIVO</h4>
      </div>
      <div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<p>Responsable: </p>
					</div>
					<div class="col-md-9">
						<input type="text" id="responsable" value="qwerty" disabled/>
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
					<div class="col-md-2">
						<p>Actual: </p>
					</div>
					<div class="col-md-4">
						<input type="text" id="actual" value="asdfg" disabled/>
					</div>
					<div class="col-md-2">
						<p>Actualizar: </p>
					</div>
					<div class="col-md-4">
						<input type="text" id="actualizar" value=""/>
					</div>
				</div>
      </div>
      <div class="modal-footer">
				<button type="button" id="eliminarButton" class="btn btn-default" data-dismiss="modal"
				onclick="actualizarObjetivo('Holi');">Eliminar Objetivo</button>
				<button type="button" id="modalButton" class="btn btn-default" data-dismiss="modal"
				onclick="actualizarObjetivo('Holi');">Actualizar Objetivo</button>
				<!-- <button type="button" id="historialButton" class="btn btn-default" data-dismiss="modal"
				onclick="actualizarObjetivo('Holi');">Ver Historial</button>-->
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
	function actualizarObjetivo(id, indicador, meta){
		window.location = "listar/updateObjetivo/"+id+"/"+$('#actualizar').val()+"/"+indicador+"/"+meta;
	}

	function eliminarObjetivo(id){
		window.location = "listar/eliminarObjetivo/"+id;
	}

 function modalTarea(id, indicador, meta){
	 $("#modalButton").attr("onclick","actualizarObjetivo("+id+","+indicador+","+meta+");");
 	 $("#eliminarButton").attr("onclick","eliminarObjetivo("+id+");");


	 var ajax_data = {
	 		idObjetivo     : id
	 };
	 //nombre, responsable, inicio, termino, descripcion, estado
	 $.ajax({
	 type: 'POST',
	 url: 'js/json/apiModalObjetivo.php',
	 data: ajax_data,
	 dataType: 'json',
	 success: function(objetivos)
	 {
	 		 console.log("tareas = "+objetivos);
	 		$.each(objetivos, function(i,objetivo){
				//console.log("tarea: "+tarea.nombre);
	 			$('#nombre').text("Objetivo: "+objetivo.nombre);
	 			$('#descripcion').text(objetivo.descripcion);
	 			$('#responsable').val(objetivo.responsable);
	 			$('#actual').val(objetivo.actual);
	 			$('#avance').val(objetivo.avance);
	 		});
	 }
    });
	 $('#myModal').modal('show');
	 }
</script>

</html>
