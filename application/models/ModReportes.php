<?php

class ModReportes extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Busca los equipos asigados a un Ing. y un estatus en espesifico de los clientes
    function ReporteIngCliente($Ing, $Estatus){
        //echo 'Ing = '. $Ing .' Estatus = '.$Estatus; exit;
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, cli.Nombre As Nombre, cli.Paterno As CPaterno, cli.Materno AS CMaterno, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblClientes AS cli','ord.IdCliente = cli.IdCliente');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Asignado',$Ing);
        $this->db->where('ord.Estatus',$Estatus);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos asigados a un Ing. y un estatus en espesifico de las Empresas
    function ReporteIngEmpresa($Ing, $Estatus){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, emp.Nombre AS Nombre, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblEmpresas AS emp','ord.IdEmpresa = emp.IdEmpresa');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Asignado',$Ing);
        $this->db->where('ord.Estatus',$Estatus);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos de un estatus en espesifico de los clientes
    function ReporteCliente($Estatus){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, cli.Nombre As Nombre, cli.Paterno As CPaterno, cli.Materno AS CMaterno, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblClientes AS cli','ord.IdCliente = cli.IdCliente');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Estatus',$Estatus);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos de un estatus en espesifico de las Empresas
    function ReporteEmpresa($Estatus){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, emp.Nombre AS Nombre, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblEmpresas AS emp','ord.IdEmpresa = emp.IdEmpresa');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Estatus',$Estatus);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos que tengan prioridad de urgencia de los clientes
    function ReporteUrgCliente(){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, cli.Nombre As Nombre, cli.Paterno As CPaterno, cli.Materno AS CMaterno, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblClientes AS cli','ord.IdCliente = cli.IdCliente');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Prioridad',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos que tengan prioridad de urgencia de las empresas
    function ReporteUrgEmpresa(){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, emp.Nombre AS Nombre, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblEmpresas AS emp','ord.IdEmpresa = emp.IdEmpresa');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Prioridad',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos que sean garantía de los clientes
    function ReporteGarCliente(){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, cli.Nombre As Nombre, cli.Paterno As CPaterno, cli.Materno AS CMaterno, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblClientes AS cli','ord.IdCliente = cli.IdCliente');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Garantia',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }


    //Busca los equipos que sean garantía de las empresas
    function ReporteGarEmpresa(){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, emp.Nombre AS Nombre, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblEmpresas AS emp','ord.IdEmpresa = emp.IdEmpresa');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Garantia',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos que sean reincidenca de los clientes
    function ReporteReinCliente(){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, cli.Nombre As Nombre, cli.Paterno As CPaterno, cli.Materno AS CMaterno, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblClientes AS cli','ord.IdCliente = cli.IdCliente');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Reincidencia',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }


    //Busca los equipos que sean reincidenca de las empresas
    function ReporteReinEmpresa(){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, emp.Nombre AS Nombre, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblEmpresas AS emp','ord.IdEmpresa = emp.IdEmpresa');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Reincidencia',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos que tengan prioridad de urgencia de los clientes
    function ReporteUrgIngCliente($Ing){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, cli.Nombre As Nombre, cli.Paterno As CPaterno, cli.Materno AS CMaterno, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblClientes AS cli','ord.IdCliente = cli.IdCliente');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Asignado',$Ing);
        $this->db->where('ord.Prioridad',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos que tengan prioridad de urgencia de las empresas
    function ReporteUrgIngEmpresa($Ing){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, emp.Nombre AS Nombre, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblEmpresas AS emp','ord.IdEmpresa = emp.IdEmpresa');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Asignado',$Ing);
        $this->db->where('ord.Prioridad',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos que sean garantía de los clientes
    function ReporteGarIngCliente($Ing){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, cli.Nombre As Nombre, cli.Paterno As CPaterno, cli.Materno AS CMaterno, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblClientes AS cli','ord.IdCliente = cli.IdCliente');
        $this->db->join('TblTipoEquipo AS te', 'ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Asignado',$Ing);
        $this->db->where('ord.Garantia',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }


    //Busca los equipos que sean garantía de las empresas
    function ReporteGarIngEmpresa($Ing){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, emp.Nombre AS Nombre, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblEmpresas AS emp','ord.IdEmpresa = emp.IdEmpresa');
        $this->db->join('TblTipoEquipo AS te', 'ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Asignado',$Ing);
        $this->db->where('ord.Garantia',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca los equipos que sean reincidenca de los clientes
    function ReporteReinIngCliente($Ing){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, cli.Nombre As Nombre, cli.Paterno As CPaterno, cli.Materno AS CMaterno, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblClientes AS cli','ord.IdCliente = cli.IdCliente');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Asignado',$Ing);
        $this->db->where('ord.Reincidencia',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }


    //Busca los equipos que sean reincidenca de las empresas
    function ReporteReinIngEmpresa($Ing){
        $this->db->select('ord.IdOrden AS Orden, ord.Asignado, emp.Nombre AS Nombre, te.TipoEquipo AS TipoEquipo, ord.Marca AS Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Estatus As Estatus, ord.Fecha AS Fecha');
        $this->db->from('TblOrdenes AS ord');
        $this->db->join('TblEmpresas AS emp','ord.IdEmpresa = emp.IdEmpresa');
        $this->db->join('TblTipoEquipo as te','ord.IdTipoEquipo = te.IdTipoEquipo');
        $this->db->where('ord.Asignado',$Ing);
        $this->db->where('ord.Reincidencia',1);
        $this->db->order_by('ord.IdOrden');

        $consulta = $this->db->get();
        return $consulta->result();
    }
}