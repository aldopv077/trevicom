<?php

class ModEmpresas extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Ingresa el registro de una nueva empresa
    public function ingresar($empresa){
        $insertar = $this->db->insert('TblEmpresas',$empresa);
        
        if($insertar){
            $this->db->select_max('IdEmpresa');
            $this->db->from('TblEmpresas');
            $consulta = $this->db->get();

            return $consulta->result();
        }else{
            return false;
        }
        
    }

    //Listado de empresas registradas
    public function listaempresas($Id = null){
        if($Id != null) {
            
            $this->db->select('em.IdEmpresa AS Id, em.Nombre AS Nombre, em.Direccion as Direccion, em.Telefono as Telefono, em.Telefono as Extencion, con.Nombre As NombreCont, con.Paterno as PaternoCont, con.Materno as MaternoCont, con.Telefono as TelefonoCont, con.Correo as CorreoCont');
            $this->db->from('TblEmpresas as em');
            $this->db->join('TblContactoEmpresa as con', 'em.IdEmpresa = con.IdEmpresa');
            $this->db->where('em.Activo', 1);
            $this->db->where('con.Principal',1);
            $this->db->where('em.IdEmpresa',$Id);

            $consulta = $this->db->get();
            return $consulta->result();
        }else{
            
            $this->db->select('em.IdEmpresa AS Id, em.Nombre AS Nombre, em.Direccion as Direccion, em.Telefono as Telefono, em.Extencion As Extencion, con.Nombre As NombreCont, con.Paterno as PaternoCont, con.Materno as MaternoCont, con.Telefono as TelefonoCont, con.Correo as CorreoCont');
            $this->db->from('TblEmpresas as em');
            $this->db->join('TblContactoEmpresa as con', 'em.IdEmpresa = con.IdEmpresa');
            $this->db->where('em.Activo', 1);
            $this->db->where('con.Principal',1);

            $consulta = $this->db->get();
            return $consulta->result();
        }
    }

    //Busqueda de una sola empresa
    public function buscarempresa($Id){
        $this->db->select('*');
        $this->db->from('TblEmpresas');
        $this->db->where('IdEmpresa', $Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busqueda de las empresas activas
    public function empresaactiva(){
        $this->db->select('*');
        $this->db->from('TblEmpresas');
        $this->db->where('Activo', 1);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Actualiza los datos de la tabla Empresas del registro obtenido
    public function actualizar($Id, $empresa){
        $this->db->where('IdEmpresa', $Id);
        $this->db->update('TblEmpresas', $empresa);

        return true;
    }

    //Cambia el estado de la empresa de activo a inactivo
    public function eliminar($Id){
        $this->db->query("UPDATE TblEmpresas SET Activo = 0 WHERE IdEmpresa = ". $Id);
    }

    //Busca todas las empresas sin importar si estan activas o no
    public function listatodos(){
        $this->db->select('IdEmpresa, Nombre');
        $this->db->from('TblEmpresas');

        $consulta = $this->db->get();
        return $consulta->result();
    }
}