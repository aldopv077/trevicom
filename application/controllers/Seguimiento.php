<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

	public function index()
	{
		$data['contenido'] = "seguimiento/index";
        $data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";
        
		$this->load->view('plantilla',$data);
	}

	public function registrar(){
		$data['contenido'] = "seguimiento/registro";
		$data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}

	public function editar(){
		$data['contenido'] = "seguimiento/editar";
		$data['perfil'] = "Administrador";        
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}
}