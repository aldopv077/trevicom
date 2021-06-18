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
    public function conCotizacionReal($Fecha){
        $this->db->select('*');
        $this->db->from('TblCotizacion');
        $this->db->where('Estatus', 'Realizada');
        $this->db->where('Fecha',$Fecha);

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
    public function conCotizacionRealTec($tec, $Fecha){
        $this->db->select('*');
        $this->db->from('TblCotizacion');
        $this->db->where('Estatus', 'Realizada');
        $this->db->where('Asignado', $tec);
        $this->db->where('Fecha',$Fecha);

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

    //Consulta las cotizaciones realizadas dentro de un rango de fechas
    public function realizadas($FechaInicio, $FechaFin){
        $where = 'Estatus = "Realizada" AND Fecha BETWEEN "'.$FechaInicio.'" AND "'. $FechaFin.'"';
        $this->db->select('*');
        $this->db->from('TblCotizacion');
        $this->db->where($where);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Consutla las cotizaciones que estén en solicitud
    public function consolicitud(){
        $this->db->select('*');
        $this->db->from('TblCotizacion');
        $this->db->where('Estatus', 'Solicitud');

        $consulta = $this->db->get();
        return $consulta->result();
    }

     //Consulta las cotizaciones realizadas dentro de un rango de fechas
     public function realizadasIng($Ing, $FechaInicio, $FechaFin){
        $where = 'Asignado = "'.$Ing.'" AND Estatus = "Realizada" AND Fecha BETWEEN "'.$FechaInicio.'" AND "'. $FechaFin.'"';
        $this->db->select('*');
        $this->db->from('TblCotizacion');
        $this->db->where($where);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Consutla las cotizaciones que estén en solicitud
    public function consolicitudIng($Ing){
        $this->db->select('*');
        $this->db->from('TblCotizacion');
        $this->db->where('Asignado', $Ing);
        $this->db->where('Estatus', 'Solicitud');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Consulta la cotización seleccionada
    public function conCotizacion($Id){
        $this->db->select('cot.IdCotizacion As IdCotizacion, em.Nombre As Nombre, em.Paterno AS Paterno, em.Materno AS Materno, cot.IdOrden As Orden, cot.SubTotal, cot.Total As Total, cot.Fecha AS Fecha');
        $this->db->from('TblCotizacion As cot');
        $this->db->join('TblEmpleados as em','cot.IdEmpleado = em.IdEmpleado');
        $this->db->where('IdCotizacion', $Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Modifica la descripción de la partida 
    public function actDescripcion($Id, $Descrip){
        $this->db->query("UPDATE TblPartidasCotizacion SET Descripcion = '".$Descrip."' WHERE IdPartida = ". $Id);
    }

    //Consulta las cotizaciones del cliente que estén realizadas
    public function conCotizacionClie($Id){
        $this->db->select('cot.IdCotizacion, ord.IdOrden, cot.Estatus, cot.Fecha');
        $this->db->from('TblCotizacion AS cot');
        $this->db->join('TblOrdenes AS ord','cot.IdOrden = ord.IdOrden');
        $this->db->where('ord.IdCliente', $Id);
        $this->db->where('ord.Estatus<>','Entregado');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Consulta las cotizaciones de la empresa que estén realizadas
    public function conCotizacionEmp($Id){
        $this->db->select('cot.IdCotizacion, ord.IdOrden, cot.Estatus, cot.Fecha');
        $this->db->from('TblCotizacion AS cot');
        $this->db->join('TblOrdenes AS ord','cot.IdOrden = ord.IdOrden');
        $this->db->where('ord.IdEmpresa', $Id);
        $this->db->where('ord.Estatus<>','Entregado');

        $consulta = $this->db->get();
        return $consulta->result();
    }
}