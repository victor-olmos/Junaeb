<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sistema de Actividades - Junaeb</title>

	<meta name="description" content="Sistema de actividades">
	<meta name="author" content="Victor Olmos">

    <!-- para lo switchs -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/switch-buttons/switch-buttons.css" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/bootstrap.css" />

    <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>

    <!-- Base Styling  -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/app/app.v1.css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        function sendForm(){
            //alert($url);
            document.getElementById("form1").submit();
        }

    </script>
</head>
<body>
    <div class="container">
        </br>
        <center><img src="<?php echo base_url()?>images/junaeb_logo.png" height="150" width="150"></center>
        <div class="page-header"><center><h1>Sistema de actividades - JUNAEB</h1></center>
        <center><median>Ingrese sus credenciales para continuar</median></center>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="login/ingresar" id="form1" method="post" role="form">
                            <div class="form-group">
                                <label for="txtRut">Usuario</label>
                                <input type="text" class="form-control" id="txtUser" name="txtUser" placeholder="Ingrese su usuario">
                            </div>
                            <div class="form-group">
                                <label for="txtPass">Contraseña</label>
                                <input type="password" class="form-control" id="txtPass" name="txtPass" placeholder="Ingrese su contraseña">
                            </div>
                            <!-- <button type="submit" class="btn btn-purple">Ingresar</button>  -->
                        </form>
                        <center><button type="button" class="btn btn-primary" onclick="sendForm();">Ingresar</button></center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery v1.9.1 -->
	<script src="<?php echo base_url()?>js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>js/plugins/underscore/underscore-min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>js/bootstrap/bootstrap.min.js"></script>

    <!-- Globalize -->
    <script src="<?php echo base_url()?>js/globalize/globalize.min.js"></script>

    <!-- NanoScroll -->
    <script src="<?php echo base_url()?>js/plugins/nicescroll/jquery.nicescroll.min.js"></script>




    <!-- Custom JQuery -->
	<script src="<?php echo base_url()?>js/app/custom.js" type="text/javascript"></script>



	<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-56821827-1', 'auto');
    ga('send', 'pageview');

    </script>
</body>
</html>
