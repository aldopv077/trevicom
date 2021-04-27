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

        $consulta = $this->db->get();
        return $consulta->result();
    }
}