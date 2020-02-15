<?php
 
 class Agregar extends CI_Controller {
       function __construct(){
		parent::__construct();
		$this->load->helper('form');
                $this->load->library('form_validation');
		$this->load->model('Agregar_model');
                $this->load->library('session');
	}
	        
	function index(){
                $data['textoFinal'] = '';
		$this->load->view('principal/principal', $data);
	}
        //-----------------------------------
                
        function addDocente(){
            //Se reciben los valores que vienen por POST
            $nombre = filter_input(INPUT_POST, 'usuario_nombre');
            $rut = filter_input(INPUT_POST, 'usuario_rut');
            $mail = filter_input(INPUT_POST, 'usuario_mail');
            $clave = filter_input(INPUT_POST, 'usuario_clave');
            //$imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name'])); //Comentado por ser innecesario.
            $inst_id = $this->session->userdata('i_id'); //institucion_id
            $tipo_id = 2;
            
            //Se verifica que no exista el usuario con estos mismos datos en la misma institucion
            $consulta = "SELECT count(usuario_id) as cont from usuario "
                        . " where USUARIO_RUT = '". $rut ."' "
                        . " and USUARIO_CLAVE = '". md5($clave) ."' and INSTITUCION_ID = ". $inst_id ."";
            
            $datos = $this->Agregar_model->verificaUser($consulta);
            
            if($datos['a'] > 0){
                //Si se contaron mas de 0, entonces el usuario existe... lanzar una alerta.
                echo "<script>javascript:alert('El usuario ya existe, por favor verifique los datos');window.location = '".base_url()."principal' </script>";
            }
            else{
                //Si no se contaron usuarios con esos datos, insertar.
                $datos = array();
                foreach ($_POST as $key => $value) {
                    if ($key != "enviar") {
                        if($key == "usuario_clave"){
                            $datos[$key] = md5($value);
                        }
                        else{
                            $datos[$key] = $value;
                        }
                    }
                }
                /////Nota: la imagen convertirla a png, para poder mostrarla de manera correcta, y reducir su tamaño a 300x300
                $datos['institucion_id'] = $inst_id;
                $datos['tipo_id'] = $tipo_id;
                $this->Agregar_model->insertar("usuario", $datos);
                echo "<script>javascript:alert('Docente ingresado correctamente'); window.location = '".base_url()."principal'</script>";              

            }
        }
        
        //---------------------------------------------------
        
        function addAlumno(){
            //Se reciben los valores que vienen por POST
            $rut = filter_input(INPUT_POST, 'alumno_rut');
            $verificador = filter_input(INPUT_POST, 'alumno_verificador');
            $inst_id = $this->session->userdata('i_id'); //institucion_id
            $estado = 1;
            $curso = filter_input(INPUT_POST, 'curso_id');
            
            //Se verifica que no exista el usuario con estos mismos datos en la misma institucion
            $consulta = "select count(alumno_id) as cont from alumno where alumno_rut = '".$rut."' "
                    . "and alumno_verificador = '".$verificador."' "
                    . "and institucion_id = ".$inst_id." and alumno_estado = ".$estado."";
            
            $datos = $this->Agregar_model->verificaUser($consulta);
            
            if($datos['a'] > 0){
                //Si se contaron mas de 0, entonces el alumno existe... lanzar una alerta.
                echo "<script>javascript:alert('El alumno ya se encuentra ingresado, por favor verifique los datos');window.location = '".base_url()."principal' </script>";
            }
            else{
                //Si no se contaron alumnos con esos datos, insertar.
                $datos = array();
                foreach ($_POST as $key => $value) {
                    if ($key != "enviar") {
                        if($key == "curso_id"){
                        }
                        else{
                            $datos[$key] = $value;
                        }
                    }
                }
            }
            $datos['institucion_id'] = $inst_id;
            $datos['alumno_estado'] = $estado;
            $this->Agregar_model->insertar("alumno", $datos);
            //echo "<script>javascript:alert('Alumno ingresado correctamente'); window.location = '".base_url()."principal'</script>";              
            echo "<script>javascript:alert('Alumno ingresado correctamente'); </script>";              
            //SE INGRESÓ EL ALUMNO. AHORA HAY QUE RECUPERAR EL ID E INGRESARLO EN EL ROMPIMIENTO CON EL CURSO
            
            $consulta = "select ALUMNO_ID from ALUMNO order by ALUMNO_ID desc limit 1";
            //traer el dato del select, e ingresarlo al rompimiento con curso.
            $dato = $this->Agregar_model->traeRegistro($consulta, "ALUMNO_ID");
            $alumno_id = $dato['a'];
            
            $consulta = "Insert into curso_alumno(CURSO_ID, ALUMNO_ID, FECHA_INCORPORACION) values (".$curso.", ".$alumno_id.", curdate()) ";
            $this->Agregar_model->rawQuery($consulta);
            echo "<script>javascript:alert('Alumno registrado en el curso exitosamente.'); window.location = '".base_url()."principal'</script>";
        }
}
