<?php

class ModLogin extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    public function login($Usuario, $Pass){
        $query=$this->db->query("SELECT IdEmpleado, Iniciales, Puesto FROM TblEmpleados WHERE Iniciales='".$Usuario."' AND Pass='".$Pass."'");
            
            
            if ($query->num_rows() == 1) {//si los datos coinciden solamente 1 vez se envía la fila de lo contrario se manda mensaje de error.
                return $query->row();
            } else {
                $this->session->set_flashdata('usuario_incorrecto', 'Los datos introducidos son incorrectos, porfavor vuelva a introducirlos');
                redirect('');
            }
    }
}