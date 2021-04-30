<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("ModEmpresas");
        $this->load->model("ModContactos");
    }

	public function index()
	{
		$data['contenido'] = "empresas/index";
		$data['perfil'] = $this->session->userdata('Perfil');
		$data['empresas'] = $this->ModEmpresas->listaempresas();
		$this->load->view('plantilla',$data);
	}

	//Redirecciona a la página de registrar empresa
	public function registrar(){
		$data['contenido'] = "empresas/registro";
		$data['perfil'] = $this->session->userdata('Perfil');
		$this->load->view('plantilla',$data);
	}

	//Captura los datos del formulario para mandarlos al modelo
	public function ingresar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();

			if(isset($datos)){
				$empresa = array(
					'Nombre' => $datos['Nombre'],
					'Direccion' => $datos['Direccion'],
					'NoInterior' => $datos['NoInterior'],
					'NoExterior' => $datos['NoExterior'],
					'Colonia' => $datos['Colonia'],
					'Ciudad' => $datos['Ciudad'],
					'CodigoPostal' => $datos['CodigoPostal'],
					'Telefono' => $datos['Telefono'],
					'Dependencia' => $datos['Dependencia'],
					'Macro' => $datos['Macro'],
				);

				$IdEmpresa = $this->ModEmpresas->ingresar($empresa);

				foreach ($IdEmpresa as $val){
					$Id = $val->IdEmpresa;
				}

				if($IdEmpresa != false){
					$contacto = array(
						'IdEmpresa' => $Id,
						'Nombre' => $datos['NombreCont'],
						'Paterno' => $datos['PaternoCont'],
						'Materno' => $datos['MaternoCont'],
						'Telefono' => $datos['TelefonoCont'],
						'Departamento' => $datos['DepartamentoCont'],
						'Correo' => $datos['CorreoCont']
					);
					//print_r($contacto); exit;

					$ingresacontacto = $this->ModContactos->ingresar($contacto);

					if($ingresacontacto){
						echo'<script> alert("Empresa registrada"); </script>';
                		redirect('Empresas/index', 'refresh');
					}else{
						echo'<script> alert("Ha ocurrido un error verificar con el administrador"); </script>';
                		redirect('Empresas/registrar', 'refresh');
					}

				}else{
					echo'<script> alert("Ha ocurrido un error verificar con el administrador"); </script>';
                	redirect('Empresas/registrar', 'refresh');
				}
			}
		}
	}

	//Redirecciona a la página de editar empresa
	public function editar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			if($Id != NULL){
				$data['contenido'] = "empresas/editar";
				$data['perfil'] = $this->session->userdata('Perfil');
				$data['empresa'] = $this->ModEmpresas->buscarempresa($Id);

				$this->load->view('plantilla',$data);
			}
		}
	}

	//Captura los datos del formulario editar y los manda al modelo
	public function actualizar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();

			if(isset($datos)){

				$Id = $datos['Id'];
				
				$empresa = array(
					'Nombre' => $datos['Nombre'],
					'Direccion' => $datos['Direccion'],
					'NoInterior' => $datos['NoInterior'],
					'NoExterior' => $datos['NoExterior'],
					'Colonia' => $datos['Colonia'],
					'Ciudad' => $datos['Ciudad'],
					'CodigoPostal' => $datos['CodigoPostal'],
					'Telefono' => $datos['Telefono'],
					'Dependencia' => $datos['Dependencia'],
					'Macro' => $datos['Macro'],
				);

				$actualiza= $this->ModEmpresas->actualizar($Id, $empresa);

				if($actualiza){
					echo'<script> alert("Datos de la empresa actualizados"); </script>';
                	redirect('Empresas/index', 'refresh');
				}
			}
		}
	}

	//Eliminar la empresa registrada
	public function eliminar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			if($Id != NULL){
            	$this->ModEmpresas->eliminar($Id);
            	redirect('Empresas/index');
        	}
		}
	}
}