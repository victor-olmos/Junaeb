<?php

 class Principal extends CI_Controller {
       function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('Principal_model');
            $this->load->library('session');
            if($this->session->userdata('logged_in') === FALSE){
                    echo "<script>javascript:alert('Debe loguearse antes de acceder a esta seccion'); window.location = '".base_url().'login'."'</script>";
            }
	}

        //------------------------------------------------

	function index(){
            $data['usuario_nombre'] = $this->session->userdata('usuario_nombre');
            $this->load->view('principal', $data);
	}

        //--------------------------------------------------

}
