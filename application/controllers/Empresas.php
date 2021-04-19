<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {

	public function index()
	{
		$data['contenido'] = "empresas/index";
        $data['perfil'] = "Administrador";
		$data['perfil2'] = "Técnico";
		$this->load->view('plantilla',$data);
	}

	public function registrar(){
		$data['contenido'] = "empresas/registro";
		$data['perfil'] = "Administrador";
		$data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}

	public function editar(){
		$data['contenido'] = "empresas/editar";
		$data['perfil'] = "Administrador";
		$data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}
}