<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {

     public function __construct()
    {
        parent::__construct();
    }

    //------------------------------------------------------------------

        function getLogin($consulta){
            $query = $this->db->query($consulta);
            $datos = array();

            if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row){
                $datos['a'] = $row['cont'];
                $datos['b'] = $row['usuario_nombre'];
                $datos['c'] = $row['tipo'];
                $datos['d'] = $row['usuario_id'];
                $datos['e'] = $row['tareas'];
            }
                return $datos;
            }
            else{
                return false;
            }
        }


    //-------------------------------------------------------------------

        function rawSelect2($consulta){
            $query = $this->db->query($consulta);
            return $query->result();
        }

}
