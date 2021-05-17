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

    //Busca las ordenes por número de orden o por número de serie de Clientes
    public function buscarordenCliente($Id){
        //echo $Id; exit;
        $this->db->select('ord.IdOrden As Orden, cli.IdCliente AS IdCliente, cli.Nombre As Nombre, cli.Paterno As Paterno, cli.Materno As Materno, cli.Telefono, cli.Celular, te.TipoEquipo As Equipo, ord.NumeroSerie AS Serie, ord.Marca As Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Observaciones AS Observ, ord.Estatus AS Estatus, usu.Iniciales AS Recibe, ord.Asignado as Asignado, ord.Fecha AS Fecha, ord.Hora As Hora');
        $this->db->from('TblOrdenes as ord');
        $this->db->join('TblClientes as cli','ord.IdCliente=cli.IdCliente');
        $this->db->join('TblTipoEquipo As te','ord.IdTipoEquipo=te.IdTipoEquipo');
        $this->db->join('TblEmpleados as usu','ord.IdEmpleado = usu.IdEmpleado');
        $this->db->where('IdOrden',$Id);
        $this->db->or_where('NumeroSerie',$Id);
        $this->db->where('Estatus <>', 'Entregado');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busqueda de ordenes por número de orden o por número de serie de Empresas
    public function buscarordenEmpresa($Id){
        $this->db->select('ord.IdOrden As Orden, emp.IdEmpresa As IdEmpresa, emp.Nombre As Empresa, cnt.Nombre As Nombre, cnt.Paterno As Paterno, cnt.Materno As Materno, emp.Telefono as Telefono, cnt.Telefono AS TelContacto, te.TipoEquipo As Equipo, ord.NumeroSerie AS Serie, ord.Marca As Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Observaciones AS Observ, ord.Estatus AS Estatus, usu.Iniciales AS Recibe, ord.Asignado as Asignado, ord.Fecha AS Fecha, ord.Hora As Hora');
        $this->db->from('TblOrdenes as ord');
        $this->db->join('TblEmpresas as emp','ord.IdEmpresa=emp.IdEmpresa');        
        $this->db->join('TblContactoEmpresa as cnt','ord.IdContactoEmpresa=cnt.IdContacto');    
        $this->db->join('TblTipoEquipo As te','ord.IdTipoEquipo=te.IdTipoEquipo');    
        $this->db->join('TblEmpleados as usu','ord.IdEmpleado = usu.IdEmpleado');
        $this->db->where('IdOrden',$Id);
        $this->db->or_where('NumeroSerie',$Id);
        $this->db->where('Estatus <>', 'Entregado');
        
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca las ordenes por IdClientes
    public function buscarordenIdCliente($Id){
        //echo $Id; exit;
        $this->db->select('ord.IdOrden As Orden, cli.IdCliente AS IdCliente, cli.Nombre As Nombre, cli.Paterno As Paterno, cli.Materno As Materno, cli.Telefono, cli.Celular, te.TipoEquipo As Equipo, ord.NumeroSerie AS Serie, ord.Marca As Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Observaciones AS Observ, ord.Estatus AS Estatus, usu.Iniciales AS Recibe, ord.Asignado as Asignado, ord.Fecha As Fecha, ord.Hora AS Hora');
        $this->db->from('TblOrdenes as ord');
        $this->db->join('TblClientes as cli','ord.IdCliente=cli.IdCliente');
        $this->db->join('TblTipoEquipo As te','ord.IdTipoEquipo=te.IdTipoEquipo');
        $this->db->join('TblEmpleados as usu','ord.IdEmpleado = usu.IdEmpleado');
        $this->db->where('ord.IdCliente',$Id);
        $this->db->where('Estatus <>', 'Entregado');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busqueda de ordenes por IdEmpresas
    public function buscarordenIdEmpresa($Id){
        $this->db->select('ord.IdOrden As Orden, emp.IdEmpresa As IdEmpresa, emp.Nombre As Empresa, cnt.Nombre As Nombre, cnt.Paterno As Paterno, cnt.Materno As Materno, emp.Telefono as Telefono, cnt.Telefono AS TelContacto, te.TipoEquipo As Equipo, ord.NumeroSerie AS Serie, ord.Marca As Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Observaciones AS Observ, ord.Estatus AS Estatus, usu.Iniciales AS Recibe, ord.Asignado as Asignado, ord.Fecha As Fecha, ord.Hora AS Hora');
        $this->db->from('TblOrdenes as ord');
        $this->db->join('TblEmpresas as emp','ord.IdEmpresa=emp.IdEmpresa');        
        $this->db->join('TblContactoEmpresa as cnt','ord.IdContactoEmpresa=cnt.IdContacto');    
        $this->db->join('TblTipoEquipo As te','ord.IdTipoEquipo=te.IdTipoEquipo');    
        $this->db->join('TblEmpleados as usu','ord.IdEmpleado = usu.IdEmpleado');
        $this->db->where('ord.IdEmpresa',$Id);
        $this->db->where('Estatus <>', 'Entregado');
        
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Realiza el conteo de las ordenes registradas al IdCliente 
    public function conteocliente($Id){
        $consulta = $this->db->query('SELECT count(IdOrden) AS conteo FROM TblOrdenes WHERE IdCliente='.$Id.' AND Estatus<> "Entregado"' );
        
        return $consulta->result();
    }

    //Realiza el conteo de las ordenes registradas al IdEmpresa
    public function conteoempresa($Id){
        $consulta = $this->db->query('SELECT count(IdOrden) AS conteo FROM TblOrdenes WHERE IdEmpresa='.$Id.' AND Estatus<> "Entregado"' );
        
        return $consulta->result();
    }

    //Busqueda de asignaciones de la orden seleccionada
    public function asignaciones($Id){
        $this->db->select('asg.IdOrden As Orden, usu.Iniciales As Iniciales, asg.AsignadoA AS Asignado');
        $this->db->from('TblAsignaciones AS asg');
        $this->db->join('TblEmpleados as usu','asg.IdEmpleado = usu.IdEmpleado');
        $this->db->where('asg.IdOrden',$Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }
}