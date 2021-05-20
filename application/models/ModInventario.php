<?php

class ModInventario extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Registra los datos del formulario en la BD para generar un inventario
    public function registrar($inventario){
        $ingresar = $this->db->insert('TblInventario', $inventario);

        if($ingresar){
            $this->db->select_max('IdInventario');
            $this->db->from('TblInventario');

            $consulta = $this->db->get();
            return $consulta->result();
        }else{
            return false;
        }

    }

    //Busca todas las ordenes que se encuentren diferentes al estatus de entregado
    public function Ordenes(){
        $this->db->select('ord.IdOrden AS Orden, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo AS Modelo, ord.NumeroSerie As Serie, ord.LugarRevision As Lugar');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblTipoEquipo As te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Estatus <>','Entregado');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Registra las ordenes que si existen
    public function existen($IdInventario,$IdOrden,$Fecha){
        $ingresar = array(
            'IdInventario' => $IdInventario,
            'IdOrden' => $IdOrden,
            'FechaInv' => $Fecha
        );

        $insertar = $this->db->insert('TblOrdenesInventariadas',$ingresar);

        if($insertar){
            return true;
        }else{
            return false;
        }
    }

    //Registra las ordenes que no se encontraron 
    public function NoEncontradas($IdInventario,$IdOrden,$Fecha){
        $ingresar = array(
            'IdInventario' => $IdInventario,
            'IdOrden' => $IdOrden,
            'FechaInv' => $Fecha
        );

        $insertar = $this->db->insert('TblOrdenesNoEncontradas',$ingresar);

        if($insertar){
            return true;
        }else{
            return false;
        }
    }

    //Consulta el inventario solicitado
    public function ConInventario($buscar){
        $this->db->select('*');
        $this->db->from('TblInventario');
        $this->db->where('IdInventario', $buscar);
        $this->db->or_where('FechaInicio', $buscar);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Consulta cuantos registros hay en TblOrdenesInventariadas
    public function ContExistentes($Id){
        $consulta = $this->db->query('SELECT count(IdOrden) AS conteo FROM TblOrdenesInventariadas');
        
        return $consulta->result();
    }

    //Consulta las ordenes no existentes
    public function Desaparecidas($Id){
        $this->db->select('noex.IdOrden AS Orden, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo AS Modelo, ord.NumeroSerie As Serie, ord.LugarRevision As Lugar');
        $this->db->from('TblOrdenesNoEncontradas AS noex');
        $this->db->join('TblOrdenes AS ord','noex.IdOrden = ord.IdOrden');
        $this->db->join('TblTipoEquipo As te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('noex.IdInventario', $Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }
}