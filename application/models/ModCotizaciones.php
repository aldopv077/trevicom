<?php

class ModCotizaciones extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Consulta las partidas de la cotización espesificada
    public function conPartidas($Id){
        $this->db->select('*');
        $this->db->from('TblPartidasCotizacion');
        $this->db->where('IdCotizacion', $Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Registra la solicitud de la cotización
    public function solicitud($solicitud){
        $inserta = $this->db->insert('TblCotizacion', $solicitud);

        if($inserta){
            $this->db->select_max('IdCotizacion');
            $this->db->from('TblCotizacion');
            $this->db->where('Asignado', $this->session->userdata('Iniciales'));
            
            $consulta = $this->db->get();
            return $consulta->result();
        }else{
            return false;
        }
    }

    //Registra las partidas de la cotizacion
    public function agrPartidas($partidas){
        $this->db->insert('TblPartidasCotizacion', $partidas);
        
        return true;
    }

    //Consulta todas las cotizaciones que esten en estatus de solicitud
    public function conCotizacionPend(){
        $this->db->select('*');
        $this->db->from('TblCotizacion');
        $this->db->where('Estatus', 'Solicitud');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Consulta todas las cotizaciones que esten en estatus de realizadas
    public function conCotizacionReal(){
        $this->db->select('*');
        $this->db->from('TblCotizacion');
        $this->db->where('Estatus', 'Realizada');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Consulta todas las cotizaciones que esten en estatus de solicitud
    public function conCotizacionPendTec($tec){
        $this->db->select('*');
        $this->db->from('TblCotizacion');
        $this->db->where('Estatus', 'Solicitud');
        $this->db->where('Asignado', $tec);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Consulta todas las cotizaciones que esten en estatus de realizadas
    public function conCotizacionRealTec($tec){
        $this->db->select('*');
        $this->db->from('TblCotizacion');
        $this->db->where('Estatus', 'Realizada');
        $this->db->where('Asignado', $tec);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Elimina las partidas de la cotizacion
    public function eliminar($Id){
        $this->db->where('IdPartida', $Id);
        $this->db->delete('TblPartidasCotizacion');

        return true;
    }

    //ingresa los precios de las partidas de la cotización
    public function agrPrecios($Id, $precios){
        $this->db->where('IdPartida', $Id);
        $this->db->update('TblPartidasCotizacion', $precios);

        return true;
    }

    //Ingresa los totales generales de la cotización realizada
    public function actCotizacion($Id, $cotizacion){
        $this->db->where('IdCotizacion', $Id);
        $this->db->update('TblCotizacion', $cotizacion);

        return true;
    }
}