<?php

 class Listado extends CI_Controller {
       function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('Listado_model');
            $this->load->library('session');
            if($this->session->userdata('logged_in') === FALSE){
                    echo "<script>javascript:alert('Debe loguearse antes de acceder a esta seccion'); window.location = '".base_url().'login'."'</script>";
            }
	}

        //------------------------------------------------

	function index(){
    $query = "select actividad_id as ID, actividad_nombre as NOMBRE, actividad_responsable as RESPONSABLE, actividad_fechatermino as PLAZO, estado_nombre as ESTADO, actividad.estado_id as estado_id
    from actividad
    inner join estado on actividad.estado_id = estado.estado_id
    where actividad_eliminada = 0";
    $data['tareas'] = $this->Listado_model->rawSelect($query);
    $this->load->view('listado', $data);
	}

        //--------------------------------------------------

        function updateTarea($id, $estado){
            $this->Listado_model->updateTarea($id, $estado);
            echo "<script>javascript:alert('Tarea actualizada exitosamente.');window.location = '".base_url().'listado'."'</script>";
        }

        function eliminarTarea($id){
          $this->Listado_model->eliminarTarea($id);
          echo "<script>javascript:alert('Tarea eliminada exitosamente.');window.location = '".base_url().'listado'."'</script>";
        }

}
