<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("ModUsuarios");
    }

	public function index()
	{
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{	
			$data['contenido'] = "usuarios/index";
			$data['empleados'] = $this->ModUsuarios->listausuarios();
        	$data['perfil'] = $this->session->userdata('Perfil');
			$this->load->view('plantilla',$data);
		}
	}
    
	//Redirecciona a la página de registro del módulo de usuarios
    public function registrar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$data['contenido'] = "usuarios/registro";
			$data['perfil'] = $this->session->userdata('Perfil');
			$data['perfil2'] = "Técnico";

			$this->load->view('plantilla',$data);
		}
	}

	//Captura los datos del formulario para enviarlos al modelos ModUsuarios
	public function ingresar(){
		
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datform = $this->input->post();

			if(isset($datform)){
				

					//cifrado de password
					$pass = password_hash($datform['Password'], PASSWORD_DEFAULT, array('coste'=>12));
					$correo = $datform['Correo'].$datform['cmbDominio'];

					
					$arrayUsuario = array(
						'Nombre' => $datform['Nombre'],
						'Paterno' => $datform['Paterno'],
						'Materno' => $datform['Materno'],
						'Telefono' => $datform['Telefono'],
						'Puesto' => $datform['Puesto'],
						'Iniciales' => $datform['Usuario'],
						'Correo' => $correo,
						'Direccion' => $datform['Direccion'],
						'TelefonoEmergencia' => $datform['TelefonoEme'],
						'Pass' => $pass,
						'Activo' => 1,
					);
				
				$ingresar = $this->ModUsuarios->ingresar($arrayUsuario);

				if($ingresar){
					echo'<script> alert("Usuario registrado"); </script>';
                	redirect('Usuarios/index', 'refresh');
				}else{
					echo'<script> alert("Ya existe un usuario con esas iniciales"); </script>';
                	redirect('Usuarios/registrar', 'refresh');
				}
			}
		}
	}


	//Muestra el formulario de editar usuario
	public function editar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			if(isset($Id)){
				$data['contenido'] = "usuarios/editar";
				$data['empleado'] = $this->ModUsuarios->busqueda($Id);
				$data['perfil'] = $this->session->userdata('Perfil');

				$this->load->view('plantilla',$data);
			}
		}
	}

	//Captura los datos del formulario de editar usuario para guardarlos en la bd
	public function actualizar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datform = $this->input->post();

			if(isset($datform)){
				$Id = $datform['Id'];

				if($datform['Password'] != null){
					$pass = password_hash($datform['Password'], PASSWORD_DEFAULT, array('coste'=>12));

					$usuario = array(
						'Nombre' => $datform['Nombre'],
						'Paterno' => $datform['Paterno'],
						'Materno' => $datform['Materno'],
						'Telefono' => $datform['Telefono'],
						'Puesto' => $datform['Puesto'],
						'Iniciales' => $datform['Usuario'],
						'Correo' => $datform['Correo'],
						'Direccion' => $datform['Direccion'],
						'TelefonoEmergencia' => $datform['TelefonoEme'],
						'Pass' => $pass,
						'Activo' => 1,
					);
				}else{
					$usuario = array(
						'Nombre' => $datform['Nombre'],
						'Paterno' => $datform['Paterno'],
						'Materno' => $datform['Materno'],
						'Telefono' => $datform['Telefono'],
						'Puesto' => $datform['Puesto'],
						'Iniciales' => $datform['Usuario'],
						'Correo' => $datform['Correo'],
						'Direccion' => $datform['Direccion'],
						'TelefonoEmergencia' => $datform['TelefonoEme'],
						'Activo' => 1,
					);
				}

				$actualizar = $this->ModUsuarios->editar($Id, $usuario);

				if($actualizar){
					echo'<script> alert("Datos actualizados correctamente"); </script>';
                	redirect('Usuarios/index', 'refresh');
				}else{
					echo'<script> alert("Ha ocurrido un error verificar con el administrador"); </script>';
                	redirect('Usuarios/registrar', 'refresh');
				}

			}
		}
	}

	//Eliminar/bloquear un usuario
	public function eliminar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			if($Id != NULL){
            	$this->ModUsuarios->eliminar($Id);
            	redirect('Usuarios/index');
        	}
		}
	}

}