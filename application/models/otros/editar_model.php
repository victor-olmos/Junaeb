<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Editar_model extends CI_Model {

     public function __construct()
    {
        parent::__construct();
    }

    //-------------------------------------------------------------------
        
        function rawSelect2($consulta){
            $query = $this->db->query($consulta);
            return $query->result();
        }
        
        //----------------------------------------------------------------
        
        function insertar($tabla,$datos){
            $this->db->insert($tabla, $datos);
        }
        
        //----------------------------------------------------------------
        
        function rawQuery($consulta){
            return $this->db->query($consulta);
        }

        //-----------------------------------------------------------------
        
        function rawUpdate($consulta){
            $query = $this->db->query($consulta);
        }
        
}