<?php

 class Listar extends CI_Controller {
       function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('Listar_model');
            $this->load->library('session');
            if($this->session->userdata('logged_in') === FALSE){
                    echo "<script>javascript:alert('Debe loguearse antes de acceder a esta seccion'); window.location = '".base_url().'login'."'</script>";
            }
	}

        //------------------------------------------------

	function index(){
    $query = "select objetivo_id as ID, objetivo_nombre as NOMBRE, objetivo_indicador as INDICADOR, objetivo_descripcion as DESCRIPCION, objetivo_meta as META, objetivo_actual as ACTUAL, usuario_nombre as NOMBREUSER, concat(cast(((objetivo_actual*100)/objetivo_indicador) as unsigned),'%') as AVANCE, estado_nombre as ESTADO
    from objetivo inner join usuario on objetivo.usuario_id = usuario.usuario_id
    inner join estado on objetivo.estado_id = estado.estado_id where objetivo_eliminado = 0";
    $data['objetivos'] = $this->Listar_model->rawSelect($query);
    $this->load->view('listar', $data);
	}

        //--------------------------------------------------

        function updateObjetivo($id, $cantidad, $indicador, $meta){
          if((($cantidad*100)/$indicador) >= $meta){
            $this->Listar_model->updateEstadoObjetivo($id, 2);
          }
          else if((($cantidad*100)/$indicador) < $meta){
            $this->Listar_model->updateEstadoObjetivo($id, 1);
          }
          $this->Listar_model->updateObjetivo($id, $cantidad);
          echo "<script>javascript:alert('Objetivo actualizado exitosamente.');window.location = '".base_url().'listar'."'</script>";
        }

        function eliminarObjetivo($id){
          $this->Listar_model->eliminarObjetivo($id);
          echo "<script>javascript:alert('Objetivo eliminado exitosamente.');window.location = '".base_url().'listar'."'</script>";
        }

}
