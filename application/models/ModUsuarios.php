<?php

class ModUsuarios extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Ingresa el registro de un nuevo empleado a la BD
    public function ingresar($usuario){

            $ingresa = $this->db->insert('TblEmpleados', $usuario);
            if($ingresa){
                return true;
            }else{
                return false;
            }
            
    }

    //selecciona los empleados que se encuentran activos
    public function listausuarios(){ 
        $this->db->select('IdEmpleado, Nombre, Paterno, Iniciales, Correo, Telefono');
        $this->db->from('TblEmpleados');
        $this->db->where('Activo', 1);
        $this->db->order_by('Nombre','ASC');
        
        $consulta=$this->db->get();
        return $consulta->result();
    }

    //Busca el empleado a editar sus datos
    public function busqueda($Id){
        $this->db->select('*');
        $this->db->from('TblEmpleados');
        $this->db->where('IdEmpleado', $Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Edita los datos del usuario seleccionado en la BD
    public function editar($Id, $Usuario){
        $this->db->where('IdEmpleado', $Id);
        $this->db->update('TblEmpleados', $Usuario);

        return true;
    }

    //Cambia el estado del usuario de activo a inactivo
    public function eliminar($Id){
        $this->db->query("UPDATE TblEmpleados SET activo = 0 WHERE IdEmpleado = ". $Id);
    }
}