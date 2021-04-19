<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends CI_Controller {

	public function index()
	{
		$data['contenido'] = "ordenes/index";
        $data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";
        
		$this->load->view('plantilla',$data);
	}

	public function consultar(){
		$data['contenido'] = "ordenes/consultar";
		$data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}
}