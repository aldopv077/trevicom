<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{	
			$data['contenido'] = "usuarios/index";
			$data['empleados'] = $this->ModUsuarios->listausuarios();
        	$data['perfil'] = $this->session->userdata('Perfil');
		
			$this->load->view('plantilla',$data);
		}
	}
}
