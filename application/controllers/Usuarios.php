<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		$data['contenido'] = "usuarios/index";
        $data['perfil'] = "Administrador";
		$data['perfil2'] = "Técnico";
		$this->load->view('plantilla',$data);
	}
    
    public function registrar(){
		$data['contenido'] = "usuarios/registro";
		$data['perfil'] = "Administrador";
		$data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}

	public function editar(){
		$data['contenido'] = "usuarios/editar";
		$data['perfil'] = "Administrador";
		$data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}
}