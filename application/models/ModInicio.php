<?php

class ModInicio extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Consulta cuantas ordenes están en estatus "Sin revisar" de todos los técnicos
    public function admSinRevisar(){
        $consulta = $this->db->query("SELECT COUNT(IdOrden) AS Cantidad, Asignado FROM TblOrdenes WHERE Estatus = 'Sin revisar' GROUP BY Asignado");
        return $consulta->result();
    }

    //Consulta el estatus y el asignado de todas las ordenes
    public function ordenes(){
        $this->db->select('Estatus, Asignado');
        $this->db->from('TblOrdenes');
        
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //consulta el estatus de las ordenes que se encuentran con el ing asignado
    public function ordenestec($tec){
        $this->db->select('Estatus');
        $this->db->from('TblOrdenes');
        $this->db->where('Asignado', $tec);
        
        $consulta = $this->db->get();
        return $consulta->result();
    }
}