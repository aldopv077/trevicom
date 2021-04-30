<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("ModContactos");
        $this->load->model("ModEmpresas");
    }


	//Manda a llamar a la vista principal de los contactos
	public function index($Id = null)
	{
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{

			if($Id == NULL){
				$IdEmpresa = $this->session->flashdata('IdEmpresa');

				$empresa = $this->ModEmpresas->buscarempresa($IdEmpresa);
				
				foreach($empresa as $val){
					$Nombre = $val->Nombre;
				}

				$data['contenido'] = "contactos/index";
        		$data['perfil'] = $this->session->userdata('Perfil');
				$data['contactos'] = $this->ModContactos->listacontactos($IdEmpresa);
				$data['Empresa'] = $Nombre;
				$data['IdEmpresa'] = $IdEmpresa;

				$this->load->view('plantilla',$data);
			}else{
				$empresa = $this->ModEmpresas->buscarempresa($Id);
				foreach($empresa as $val){
					$Nombre = $val->Nombre;
				}

				$data['contenido'] = "contactos/index";
        		$data['perfil'] = $this->session->userdata('Perfil');
				$data['contactos'] = $this->ModContactos->listacontactos($Id);
				$data['Empresa'] = $Nombre;
				$data['IdEmpresa'] = $Id;

				$this->load->view('plantilla',$data);
			}
		}
	}

	//Redirecciona a la vista para registrar un nuevo contacto de la empresa
	public function registrar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$data['contenido'] = "contactos/registro";
			$data['perfil'] = $this->session->userdata('Perfil');
			$data['IdEmpresa'] = $Id;

			$this->load->view('plantilla',$data);
		}
	}

	//Captura los datos del formulario y los manda al modelo
	public function ingresar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();

			if(isset($datos)){
				$contacto = array(
					'IdEmpresa' => $datos['IdEmpresa'],
					'Nombre' => $datos['NombreCont'],
					'Paterno' => $datos['PaternoCont'],
					'Materno' => $datos['MaternoCont'],
					'Telefono' => $datos['TelefonoCont'],
					'Departamento' => $datos['DepartamentoCont'],
					'Correo' => $datos['CorreoCont'],
					'Principal' => $datos['Principal']
				);

				$ingresacontacto = $this->ModContactos->ingresar($contacto);
				
				if($ingresacontacto){
					echo'<script> alert("Contacto registrado"); </script>';
					
					$this->session->set_flashdata('IdEmpresa', $datos['IdEmpresa']);
					redirect('Contactos/index');
				}else{
					echo'<script> alert("Ha ocurrido un error verificar con el administrador"); </script>';
					redirect('Empresas/index', 'refresh');
				}
			}
		}
	}

	//Redirecciona a la vista para editar los datos del contacto de la empresa
	public function editar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			if($Id != NULL){
				$datos = $this->input->post();
				$data['contenido'] = "contactos/editar";
				$data['contacto'] = $this->ModContactos->buscarcontacto($Id);
				$data['perfil'] = $this->session->userdata('Perfil');

				$this->load->view('plantilla',$data);
			}
		}
	}

	//Captura los datos del formulario para mandarlos al modelo
	public function actualizar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();

			if($datos){

				$Id = $datos['Id'];

				$contacto = array(
					'IdEmpresa' => $datos['IdEmpresa'],
					'Nombre' => $datos['NombreCont'],
					'Paterno' => $datos['PaternoCont'],
					'Telefono' => $datos['TelefonoCont'],
					'Departamento' => $datos['DepartamentoCont'],
					'Correo' => $datos['CorreoCont'],
					'Principal' => $datos['Principal']
				);

				$actualiza = $this->ModContactos->actualizar($Id, $contacto);

				if($actualiza){
					echo'<script> alert("Contacto actualizado"); </script>';

					$this->session->set_flashdata('IdEmpresa', $datos['IdEmpresa']);
					redirect('Contactos/index');
				}
			}
		}
	}

	//Eliminar contacto de la empresa
	Public function eliminar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			if($Id != NULL){
            	$this->ModContactos->eliminar($Id);
            	redirect('Contactos/index');
        	}
		}
	}
}