<?php

 class Login extends CI_Controller {
    function __construct(){
		    parent::__construct();
		    $this->load->helper('form');
        $this->load->library('form_validation');
		    $this->load->model('Login_model');
        $this->load->library('session');
        
	}

	function index(){
		$this->load->view('login');
	}
        function ingresar()
        {
            if(isset($_POST['txtUser'])){
                $user = filter_input(INPUT_POST, 'txtUser');
                $pass = filter_input(INPUT_POST, 'txtPass');
                $consulta = "select count(usuario_user) as cont, usuario_nombre, tipouser_id as tipo, usuario_id, (select count(actividad_id) as cont from actividad where estado_id <> 2) as tareas from usuario where usuario_user = '".$user."' and usuario_pass = '".$pass."' LIMIT 1";

                //select count(actividad_id) as cont from actividad where estado_id <> 2

                $datos = $this->Login_model->getLogin($consulta);

                if($datos['a'] > 0){
                    $datosUser = array(
                        'usuario_nombre'  => $datos['b'],
                        'tipo'            => $datos['c'],
                        'id_user'         => $datos['d'],
                        'tareas'          => $datos['e'],
                        'logged_in'       => TRUE
                    );

                    $this->session->set_userdata($datosUser);

                    if($datos['c'] == '1'){
                         echo "<script>javascript:window.location = '".base_url().'principal'."'</script>";
                    }
                    else if($datos['c'] == '2'){
                         echo "<script>javascript:window.location = '".base_url().'principal'."'</script>";
                    }
                }
                else{
                    echo "<script>javascript:alert('Usuario o clave incorrecta, intentelo nuevamente.'); window.location = '".base_url().'login'."'</script>";
                }
            }
            else{
                echo "<script>javascript:alert('Porfavor ingrese sus credenciales'); window.location = '".base_url().'login'."'</script>";
            }
        }



}
