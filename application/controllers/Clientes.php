<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("ModClientes");
    }

	public function index()
	{
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$data['contenido'] = "clientes/index";
        	$data['perfil'] = $this->session->userdata('Perfil');
			$data['clientes'] = $this->ModClientes->listaclientes();
			$this->load->view('plantilla',$data);
		}
	}

	//Carga el formulario de registro del cliente
	public function registrar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$data['contenido'] = "clientes/registro";
			$data['perfil'] = $this->session->userdata('Perfil');
			$this->load->view('plantilla',$data);
		}
	}

	//Captura los datos del formulario para mandarlos al modelo ModClientes
	public function agregar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();

			if(isset($datos)){
				$cliente = array(
					'Nombre' => $datos['Nombre'],
					'Paterno' => $datos['Paterno'],
					'Materno' => $datos['Materno'],
					'Telefono' => $datos['Telefono'],
					'Celular' => $datos['Celular'],
					'Correo' => $datos['Correo'],
					'Direccion' => $datos['Direccion'],
					'NoExterior' => $datos['Exterior'],
					'NoInterior' => $datos['Interior'],
					'Colonia' => $datos['Colonia'],
					'Ciudad' => $datos['Ciudad'],
					'CP' => $datos['CodigoPostal'],
					'Macro' => $datos['Macro']
				);
			
				$ingresar = $this->ModClientes->ingresar($cliente);

				if($ingresar){
					echo'<script> alert("Cliente registrado"); </script>';
                	redirect('Clientes/index', 'refresh');
				}else{
					echo'<script> alert("Ha ocurrido un error verificar con el administrador"); </script>';
                	redirect('Usuarios/registrar', 'refresh');
				}
			}
		}
	}




	public function editar(){
		$data['contenido'] = "clientes/editar";
		$data['perfil'] = "Administrador";        
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}
}