<?php

class ModContactos extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Ingresa un nuevo contacto a la BD
    public function ingresar($Contacto){
        $ingresa = $this->db->insert('TblContactoEmpresa', $Contacto);

        return $ingresa;
    }

    //Busqueda de todos los contactos de la empresa
    public function listacontactos($Id){
        $this->db->select('*');
        $this->db->from('TblContactoEmpresa');
        $this->db->where('IdEmpresa',$Id);
        $this->db->where('Activo',1);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca el contacto seleccionado para su actualización de datos
    public function buscarcontacto($Id){
        $this->db->select('*');
        $this->db->from('TblContactoEmpresa');
        $this->db->where('IdContacto',$Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Actualizar los datos del contacto seleccionado
    public function actualizar($Id, $contacto){
        $this->db->where('IdContacto', $Id);
        $this->db->update('TblContactoEmpresa',$contacto);

        return true;
    }

    //Eliminar al contacto seleccionado
    public function eliminar($Id){
        $this->db->query("UPDATE TblContactoEmpresa SET Activo = 0 WHERE IdContacto = ". $Id);
    }
}