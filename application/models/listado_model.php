<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listado_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

        //-------------------------------------------------------

        function insertar($tabla,$datos){
            $this->db->insert($tabla, $datos);
        }

        //--------------------------------------------------------

        function updateTarea($id, $estado){
            $data = array(
            'ESTADO_ID' => $estado,
        );
        $this->db->where('ACTIVIDAD_ID', $id);
        return $this->db->update('actividad', $data);
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

        function eliminarTarea($id){
            $data = array(
            'ACTIVIDAD_ELIMINADA' => 1,
        );
        $this->db->where('ACTIVIDAD_ID', $id);
        return $this->db->update('actividad', $data);
        }

        //-------------------------------------------------------

        function console_log( $data ){
            echo '<script>';
            echo 'console.log('. json_encode( $data ) .')';
            echo '</script>';
        }

}
