<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("ModInicio");
        $this->load->model("ModUsuarios");
    }

	public function index()
	{
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{	
			$perfil = $this->session->userdata('Perfil');

			if($perfil == "Administrador"){
				$data['contenido'] = "inicio/admin";
				$data['perfil'] = $perfil;
				$data['Usuarios'] = $this->ModUsuarios->listausuarios();
				$data['Ordenes'] = $this->ModInicio->ordenes();
				
				$this->load->view('plantilla',$data);
			}else{
				$ordenes = $this->ModInicio->ordenestec($this->session->userdata('Iniciales'));

				$data['contenido'] = "inicio/tecnico";
				$data['perfil'] = $perfil;
				$data['ordenes'] = $ordenes;
				
				$this->load->view('plantilla',$data);
			}
		}
	}
}
