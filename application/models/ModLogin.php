<?php

class ModLogin extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    public function login($Usuario, $Pass){

       // $query=$this->db->query("SELECT IdEmpleado, Iniciales, Nombre, Paterno, Puesto, Pass FROM TblEmpleados WHERE Iniciales='".$Usuario."'");

        $this->db->select('IdEmpleado, Iniciales, Nombre, Paterno, Puesto, Pass, Activo');
        $this->db->from('TblEmpleados');
        $this->db->where('Iniciales', $Usuario);
        $this->db->or_where('Correo', $Usuario);

        $consulta = $this->db->get();
        $datos = $consulta->result();
    
        $filas = $consulta->num_rows();

        //return $consulta->num_rows();
        $contador = 0;

        switch($filas){
            case 0:
                return false;
                break;
            case 1:
                foreach($datos as $value){
                    if(password_verify($Pass, $value->Pass)){
                        return $datos;
                    }
                }
                break;
            default:
                return $datos;
                break;

        }



            /*if ($query->num_rows() == 1) {//si los datos coinciden solamente 1 vez se envía la fila de lo contrario se manda mensaje de error.
                return $query->row();
            } else {
                $this->session->set_flashdata('usuario_incorrecto', 'Los datos introducidos son incorrectos, porfavor vuelva a introducirlos');
                redirect('');
            }*/
    }
}