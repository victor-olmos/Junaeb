<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listar_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

        //-------------------------------------------------------

        function insertar($tabla,$datos){
            $this->db->insert($tabla, $datos);
        }

        //--------------------------------------------------------

        function eliminarObjetivo($id){
            $data = array(
            'OBJETIVO_ELIMINADO' => 1,
        );
        $this->db->where('OBJETIVO_ID', $id);
        return $this->db->update('objetivo', $data);
        }

        function updateObjetivo($id, $actual){
            $data = array(
            'OBJETIVO_ACTUAL' => $actual,
        );
        $this->db->where('OBJETIVO_ID', $id);
        return $this->db->update('objetivo', $data);
        }

        function updateEstadoObjetivo($id, $estado){
            $data = array(
            'ESTADO_ID' => $estado,
        );
        $this->db->where('OBJETIVO_ID', $id);
        return $this->db->update('objetivo', $data);
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
