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
    public function listaempresas(){
        $this->db->select('em.IdEmpresa AS Id, em.Nombre AS Nombre, em.Direccion as Direccion, em.Telefono as Telefono, con.Nombre As NombreCont, con.Paterno as PaternoCont, con.Materno as MaternoCont, con.Telefono as TelefonoCont, con.Correo as CorreoCont');
        $this->db->from('TblEmpresas as em');
        $this->db->join('TblContactoEmpresa as con', 'em.IdEmpresa = con.IdEmpresa');
        $this->db->where('em.Activo', 1);
        $this->db->where('con.Principal',1);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busqueda de una sola empresa
    public function buscarempresa($Id){
        $this->db->select('*');
        $this->db->from('TblEmpresas');
        $this->db->where('IdEmpresa', $Id);

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
}