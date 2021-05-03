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
			$data['lista'] = $this->ModClientes->listatodos();
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
					'Macro' => $datos['Macro'],
					'Activo' => 1
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

	//Busqueda del cliente a editar los datos
	public function editar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			if($Id != NULL){
				$data['contenido'] = "clientes/editar";
				$data['cliente'] = $this->ModClientes->busqueda($Id);
				$data['perfil'] = $this->session->userdata('Perfil');

				$this->load->view('plantilla',$data);
			}
		}
	}

	//Captura los datos del formulario editar para mandarlos al modelo
	public function actualizar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();

			if(isset($datos)){
				$Id = $datos['Id'];

				if(isset($datos['chkActivo'])){
					$Activar = $datos['chkActivo'];
				}else{
					$Activar = 1;
				}

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
					'Macro' => $datos['Macro'],
					'Activo' => $Activar
				);

				$ingresar = $this->ModClientes->editar($Id, $cliente);

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

	//Cambiar el estado del cliente a inactivo
	public function eliminar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			if($Id != NULL){
            	$this->ModClientes->eliminar($Id);
            	redirect('Clientes/index');
        	}
		}
	}

	//Redirecciona a la vista clientes/index con los resultados de la busqueda del cliente
	public function busqueda(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$dato=$this->input->post();

			if(isset($dato)){
			  $datosclie = $dato['txtCliente'];
			  $list = explode(' ', $datosclie);
			  foreach($list as $value=>$datosclie){
				$Id=$list[0];
				$nombre=$list[1];
				$paterno=$list[2];
				$materno=$list[3];
			  }
		
				$data['contenido'] = "clientes/index";
        		$data['perfil'] = $this->session->userdata('Perfil');
				$data['clientes'] = $this->ModClientes->busqueda($Id);
				$data['lista'] = $this->ModClientes->listatodos();

				$this->load->view('plantilla',$data);
			}
		}
	}
}