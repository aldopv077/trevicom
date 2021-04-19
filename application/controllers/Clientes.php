<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function index()
	{
		$data['contenido'] = "clientes/index";
        $data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";
        
		$this->load->view('plantilla',$data);
	}

	public function registrar(){
		$data['contenido'] = "clientes/registro";
		$data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}

	public function editar(){
		$data['contenido'] = "clientes/editar";
		$data['perfil'] = "Administrador";        
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}
}