<?php

class ModOrdenes extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Lista de los tipos de equipos
    public function listaequipos(){
        $this->db->select('*');
        $this->db->from('TblTipoEquipo');
        
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Ingresa los datos de la orden a la BD y devuelve el IdOrden asignado
    public function registrar($equipo){
        $insertar=$this->db->insert('TblOrdenes', $equipo);

        if($insertar){
            $this->db->select_max('IdOrden');
            $this->db->from('TblOrdenes');
            $consulta = $this->db->get();

            return $consulta->result();
        }else{
            return false;
        }
    }

    //Ingresa a que ingeniero se le asignó el equipo ingresado
    public function asignar($asignacion){
        $insertar = $this->db->insert('TblAsignaciones', $asignacion);

        return true;
    }
}