<?php

 class Objetivo extends CI_Controller {
       function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('Objetivo_model');
            $this->load->library('session');
            if($this->session->userdata('logged_in') === FALSE){
                    echo "<script>javascript:alert('Debe loguearse antes de acceder a esta seccion'); window.location = '".base_url().'login'."'</script>";
            }
	}

        //------------------------------------------------

	function index(){
            $this->load->view('objetivo');
	}

        //--------------------------------------------------

        function crearObjetivo(){
              $datos = array();
              foreach ($_POST as $key => $value) {
                      if ($key != "enviar") {
                          $datos[$key] = $value;
                      }
              }
              $this->Objetivo_model->insertar("objetivo", $datos);
             echo "<script>javascript:alert('Objetivo ingresado exitosamente');window.location = '".base_url()."objetivo'</script>";
             index();


        }

}
