<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$data['contenido'] = "ordenes/index";
        	$data['perfil'] = $this->session->userdata('Perfil');
        
			$this->load->view('plantilla',$data);
		}
	}

	public function consultar(){
		$tecnico = "no propio";

		if($tecnico == "propio"){	
			$data['contenido'] = "ordenes/consultar";
			$data['perfil'] = "Administrador";
        	$data['perfil2'] = "Técnico";

			$this->load->view('plantilla',$data);
		}else{
				
			$data['contenido'] = "ordenes/consultarexterna";
			$data['perfil'] = "Administrador";
        	$data['perfil2'] = "Técnico";

			$this->load->view('plantilla',$data);
		}
	}
	
	public function reasignar(){
		$data['contenido'] = "ordenes/reasignar";
		$data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}

	public function reportes(){
		$data['contenido'] = "ordenes/reportes";
		$data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}

	public function inventario(){
		$data['contenido'] = "ordenes/inventario";
		$data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}
}