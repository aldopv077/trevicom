<?php

class ModSeguimiento extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Ingresa los datos del seguimiento a la BD
    public function ingresar($seguimiento){
        $ingresa = $this->db->insert('TblComentarios', $seguimiento);
        if($ingresa){
            return true;
        }else{
            return false;
        }
    }

    //Busca el seguimiento de la orden seleccionada{
    public function listaseguimiento($Id){
        $this->db->select('com.IdComentario As IdComentario, com.IdOrden As IdOrden, usu.Iniciales As Iniciales, com.TipoComentario AS TipoComentario, com.Comentario AS Comentario, com.Estatus AS Estatus, com.Fecha AS Fecha, com.Hora AS Hora ');
        $this->db->from('TblComentarios AS com');
        $this->db->join('TblEmpleados AS usu','com.IdEmpleado = usu.IdEmpleado');
        $this->db->where('com.IdOrden',$Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }
}