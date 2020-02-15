<?php
 
 class Editar extends CI_Controller {
       function __construct(){
		parent::__construct();
		$this->load->helper('form');
                $this->load->library('form_validation');
		$this->load->model('Editar_model');
                $this->load->library('session');
	}
	        
	function index(){
                $data['textoFinal'] = '';
		$this->load->view('principal/principal', $data);
	}

        //---------------------------------------------------
        
        function updateUser(){
            $nombre = filter_input(INPUT_POST, 'txtNombre');
            $rut = filter_input(INPUT_POST, 'txtRut');
            $mail = filter_input(INPUT_POST, 'txtMail');
            
            $query = "update usuario set usuario_nombre = '".$nombre."' , usuario_mail = '".$mail."' ";
            
            $clave = "";
            $imagen = "";

            if(isset($_POST['chkPass'])){
                $clave = filter_input(INPUT_POST, 'txtPass');
                $query = $query." , usuario_clave = '".md5($clave)."' ";
            }
            if(isset($_POST['chkImg'])){
                $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
                $query = $query." , usuario_imagen = '".$imagen."' ";
            }
            $user_id = $this->session->userdata('usuario_id');
            //Hasta aqui se recuperaron los datos que vienen por POST

            $query = $query." where usuario_id = ".$user_id;
            
            $this->Editar_model->rawUpdate($query);
            echo "<script>javascript:alert('Usuario actualizado exitosamente'); window.location = '".base_url()."'</script>";              

            
            
        }
        
        //--------------------------------------------------
        
        function updateInst(){
            $rut = filter_input(INPUT_POST, 'txtRut');
            $nombre = filter_input(INPUT_POST, 'txtNombreInst');
            $razon = filter_input(INPUT_POST, 'txtRazon');
            $direccion = filter_input(INPUT_POST, 'txtDireccion');
            
            $query = "update institucion set institucion_rut = '".$rut."' , institucion_nombre = '".$nombre."' , institucion_razonsocial = '".$razon."' , institucion_direccion = '".$direccion."' ";
            
            $imagen = "";

            if(isset($_POST['chkImg'])){
                $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
                $query = $query." , institucion_logo = '".$imagen."' ";
            }

            $inst_id = $this->session->userdata('i_id');
            //Hasta aqui se recuperaron los datos que vienen por POST

            $query = $query." where institucion_id = ".$inst_id;
            
            $this->Editar_model->rawUpdate($query);
            echo "<script>javascript:alert('Institucion actualizada exitosamente'); window.location = '".base_url()."'</script>";              

            
            
        }
        
}
