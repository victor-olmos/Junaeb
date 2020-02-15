<?php

 class Tarea extends CI_Controller {
       function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('Tarea_model');
            $this->load->library('session');
            if($this->session->userdata('logged_in') === FALSE){
                    echo "<script>javascript:alert('Debe loguearse antes de acceder a esta seccion'); window.location = '".base_url().'login'."'</script>";
            }
	}

        //------------------------------------------------

	function index(){
            $this->load->view('tarea');
	}

        //--------------------------------------------------

        function crearTarea(){
              $datos = array();
              foreach ($_POST as $key => $value) {
                      if ($key != "enviar") {
                          $datos[$key] = $value;
                      }
              }
              $this->Tarea_model->insertar("actividad", $datos);
             echo "<script>javascript:alert('Tarea creada exitosamente');window.location = '".base_url()."tarea'</script>";
             index();


        }

}
