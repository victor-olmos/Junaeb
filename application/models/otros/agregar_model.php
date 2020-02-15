<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agregar_model extends CI_Model {

     public function __construct()
    {
        parent::__construct();
    }
    
    //------------------------------------------------------------------
    
        function verificaUser($consulta){
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
    
    //-------------------------------------------------------------------
        
        function traeRegistro($consulta, $campo){
            $query = $this->db->query($consulta);
            $datos = array();
            
            if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row){
                $datos['a'] = $row[$campo];
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
        
        //----------------------------------------------------------------
        
        function insertar($tabla,$datos){
            $this->db->insert($tabla, $datos);
        }
        
        //----------------------------------------------------------------
        
        function rawQuery($consulta){
            return $this->db->query($consulta);
        }
    
        function getUser($consulta){
            $query = $this->db->query($consulta);
            $datos = array();
            
            if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row){
                $datos['a'] = $row['USUARIO_RUT'];
                $datos['b'] = $row['USUARIO_NOMBRE'];
                $datos['c'] = $row['USUARIO_MAIL'];
            }
                return $datos;
            }
            else{
                return false;
            }
        }
        
}