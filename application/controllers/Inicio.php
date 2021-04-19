<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$data['contenido'] = "usuarios/index";
		$data['perfil'] = "Administrador";
		$data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}
}
