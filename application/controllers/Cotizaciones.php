<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {
    public function index()
	{
		$data['contenido'] = "cotizaciones/index";
        $data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";
        
		$this->load->view('plantilla',$data);
	}

    public function consultar(){
        $data['contenido'] = "cotizaciones/consultar";
        $data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";
        
		$this->load->view('plantilla',$data);
    }
}
