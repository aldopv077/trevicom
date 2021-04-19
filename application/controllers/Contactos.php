<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller {

	public function index()
	{
		$data['contenido'] = "contactos/index";
        $data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";
		$this->load->view('plantilla',$data);
	}

	public function registrar(){
		$data['contenido'] = "contactos/registro";
		$data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}

	public function editar(){
		$data['contenido'] = "contactos/editar";
		$data['perfil'] = "Administrador";        
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}
}