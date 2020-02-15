<?php

 class Usuario extends CI_Controller {
       function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('Usuario_model');
            $this->load->library('session');
            if($this->session->userdata('logged_in') === FALSE){
                    echo "<script>javascript:alert('Debe loguearse antes de acceder a esta seccion'); window.location = '".base_url().'login'."'</script>";
            }
	}

        //------------------------------------------------

    	function index(){
        $query = "Select TIPOUSER_ID, TIPOUSER_NOMBRE from tipo_usuario";
        $data['tipo_usuario'] = $this->Usuario_model->rawSelect($query);
        $query = "Select CARGO_ID, CARGO_NOMBRE from cargo";
        $data['cargos'] = $this->Usuario_model->rawSelect($query);
        $this->load->view('usuario', $data);
    	}

        //--------------------------------------------------

      function crearUsuario(){
        /*$nombre = $_POST["nombre"];
        $contraseña = $_POST["clave"];
        $tipo = $_POST["tipo"];
        $tipo = $_POST["cargo"];*/
        $consulta = "SELECT count(usuario_id) as cont FROM usuario WHERE usuario_user = '".$_POST['usuario_user']."'";
        $conteo = $this->Usuario_model->cuentaUsuarios($consulta);

        if($conteo['a'] > 0){
            echo "<script>javascript:alert('El usuario ya existe, intentelo nuevamente');
            window.location = '".base_url()."usuario'</script>";

        }
        else{
            $datos = array();
            foreach ($_POST as $key => $value) {
                if ($key != "clave") {
                    //$datos[$key] = $value;
                    if ($key != "enviar") {
                        $datos[$key] = $value;
                    }
                }
            }
            $this->Usuario_model->insertar("usuario", $datos);
           echo "<script>javascript:alert('Usuario ingresado correctamente');window.location = '".base_url()."usuario'</script>";
           index();
        }

      }

}
