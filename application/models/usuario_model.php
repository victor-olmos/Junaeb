<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

        //-------------------------------------------------------

        function insertar($tabla,$datos){
            $this->db->insert($tabla, $datos);
        }

        //-------------------------------------------------------------------

        function rawSelect($consulta){
          $query = $this->db->query($consulta);
          return $query->result();
        }

        //----------------------------------------------------------------

        function cuentaUsuarios($consulta){
            $query = $this->db->query($consulta);
            $datos = array();
            if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row){
                $datos['a'] = $row['cont'];
            }
                return $datos;
            }
            else{
                return false;
            }
        }

        //-------------------------------------------------------

        function console_log( $data ){
            echo '<script>';
            echo 'console.log('. json_encode( $data ) .')';
            echo '</script>';
        }

}
