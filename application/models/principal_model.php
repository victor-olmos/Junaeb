<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
        
        //-------------------------------------------------------
        
        function insertar($tabla,$datos){
            $this->db->insert($tabla, $datos);
        }
        
        //--------------------------------------------------------
    
        function updateProd($stock, $idprod){
            $data = array(
            'stock' => $stock,
        );
        $this->db->where('idproducto', $idprod);
        return $this->db->update('productos', $data);
        }
        
        
        //-------------------------------------------------------------------
        
        function rawSelect2($consulta){
            $query = $this->db->query($consulta);
            return $query->result();
        }
        
        function rawSelect($consulta){
            $query = $this->db->query($consulta);
            return $query->result();
        }
        
        //-------------------------------------------------------

        function console_log( $data ){
            echo '<script>';
            echo 'console.log('. json_encode( $data ) .')';
            echo '</script>';
        }
    
}