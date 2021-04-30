<?php

class ModClientes extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Ingresa los datos del cliente a la BD
    public function ingresar($cliente){
        $ingresa = $this->db->insert('TblClientes', $cliente);
        if($ingresa){
            return true;
        }else{
            return false;
        }
    }

    //Lista de clientes
    public function listaclientes(){
        $this->db->select('IdCliente, Nombre, Paterno, Materno, Direccion, Telefono, Celular, Correo');
        $this->db->from('TblClientes');
        $this->db->where('Activo', 1);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busqueda del cliente a editar
    public function busqueda($Id){
        $this->db->select('*');
        $this->db->from('TblClientes');
        $this->db->where('IdCliente', $Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Actualiza los datos del cliente en la BD
    public function editar($Id, $cliente){
        $this->db->where('IdCliente', $Id);
        $this->db->update('TblClientes', $cliente);

        return true;
    }

    //Cambia el estado del usuario de activo a inactivo
    public function eliminar($Id){
        $this->db->query("UPDATE TblClientes SET Activo = 0 WHERE IdCliente = ". $Id);
    }
    
}