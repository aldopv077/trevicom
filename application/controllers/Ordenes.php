<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model("ModOrdenes");
		$this->load->model("ModClientes");
		$this->load->model("ModEmpresas");
		$this->load->model("ModContactos");
		$this->load->model("ModUsuarios");
    }

	public function index()
	{
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$data['contenido'] = "ordenes/index";
        	$data['perfil'] = $this->session->userdata('Perfil');
			$data['clientes'] = $this->ModClientes->listaclientes();
			$data['empresas'] = $this->ModEmpresas->empresaactiva();
			$data['contactos'] = $this->ModContactos->contactosactivos();

        
			$this->load->view('plantilla',$data);
		}
	}

	public function datoscliente(){
		
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();
			
			if(isset($datos)){
				$TipoCliente = $datos['TipoCliente'];
				$TipoBusqueda = $datos['TipoBusqueda'];
				$Cliente = $datos['txtClientes'];
				$ClienteTel = $datos['txtTelefonoCl'];
				$Empresa = $datos['txtEmpresa'];
				$EmpresaTel = $datos['txtTelefonoEm'];
				$Contacto = $datos['cmbContactos'];


				switch($TipoCliente){
					case 1: 
						switch($TipoBusqueda){
							case 1: 
								$datosEmp['contenido'] = 'ordenes/registro';

								$datosEmp['perfil'] = $this->session->userdata('Perfil');
								$datosEmp['clientes'] = $this->ModClientes->listaclientes();
								$datosEmp['empresas'] = $this->ModEmpresas->empresaactiva();
								$datosEmp['contactos'] = $this->ModContactos->contactosactivos();


								$datosEmp['empresa'] = $this->ModEmpresas->buscarportelefono($EmpresaTel);
								$datosEmp['contacto'] = $this->ModContactos->buscarcontacto($Contacto);
								$datosEmp['tipocliente'] = 'Empresa';

								print_r($datosEmp);
								exit;

								$this->load->view('plantilla',$datosEmp);
								break;
							case 2:
								$datosEmp['contenido'] = 'ordenes/registro';

								$datosEmp['perfil'] = $this->session->userdata('Perfil');
								$datosEmp['clientes'] = $this->ModClientes->listaclientes();
								$datosEmp['empresas'] = $this->ModEmpresas->empresaactiva();
								$datosEmp['contactos'] = $this->ModContactos->contactosactivos();
								$datosEmp['tipoequipo'] = $this->ModOrdenes->listaequipos();
								$datosEmp['ing'] =$this->ModUsuarios->listausuarios();
								
								//print_r($datosEmp['ing']);exit;

								$datosEmp['empresa'] = $this->ModEmpresas->buscarempresa($Empresa);
								$datosEmp['contacto'] = $this->ModContactos->buscarcontacto($Contacto);
								$datosEmp['tipocliente'] = 'Empresa';


								$this->load->view('plantilla',$datosEmp);
								break;
							default:
								echo '<script> alert("Debe elegir el criterio de la busqueda"); </script>';
								redirect('Ordenes/index');
								break;
						}
						break;
					case 2:
						switch($TipoBusqueda){
							case 1:
								break;
							case 2:
								
			  					$list = explode(' ', $Cliente);
								foreach($list as $value=>$datosclie){
									$Id=$list[0];
								}

								$datosCl['contenido'] = 'ordenes/registro';

								$datosCl['perfil'] = $this->session->userdata('Perfil');
								$datosCl['clientes'] = $this->ModClientes->listaclientes();
								$datosCl['empresas'] = $this->ModEmpresas->empresaactiva();
								$datosCl['contactos'] = $this->ModContactos->contactosactivos();
								$datosCl['tipoequipo'] = $this->ModOrdenes->listaequipos();
								$datosCl['ing'] =$this->ModUsuarios->listausuarios();
								
								$datosCl['cliente'] = $this->ModClientes->busqueda($Id);
								$datosCl['tipocliente'] = 'Cliente';

								$this->load->view('plantilla', $datosCl);

								break;
							default:
								echo '<script> alert("Debe elegir el criterio de la busqueda"); </script>';
								redirect('Ordenes/index');
								break;
						}
						break;
					default:
						echo'<script> alert("Debe elegir el tipo de cliente que ingresa su equipo"); </script>';
						redirect('Ordenes/index');
						break;
				}
			}else{
				redirect('Ordenes/index');
			}
		}
	}

	//Captura los datos del formulario para enviarlos al Modelo
	public function registrar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{

			//Se establece el uso horario que se utilizará
			date_default_timezone_set('America/Mexico_City');
			$datos = $this->input->post();
			$fechag = date("Y-m-d");
			$fecham = date("d-m-Y");
			$hora = date("h:i:s", time());
			
			if(isset($datos)){
				//Se verifica que se hayan seleccionado algun checkbox
				if(isset($datos['Prioridad'])){
					$prioridad = $datos['Prioridad'];
				}else{
					$prioridad = 0;
				}

				if(isset($datos['Garantia'])){
					$Garantia = $datos['Garantia'];
				}else{
					$Garantia = 0;
				}
				
				if(isset($datos['Respaldo'])){
					$Respaldo = $datos['Respaldo'];
				}else{
					$Respaldo = 0;
				}

				if(isset($datos['Reincidencia'])){
					$Reincidencia = $datos['Reincidencia'];
				}else{
					$Reincidencia = 0;
				}

				if($datos['LugarRevision'] == "Domicilio"){
					$Fecha = $datos['Fecha'];
					$Hora = $datos['Hora'];
				}else{
					$Fecha = $fechag;
					$Hora = $hora;
				}

				if($datos['IdCliente'] == 0){
					$equipo = array(
						'IdEmpresa' => $datos['IdEmpresa'],
						'IdContactoEmpresa' => $datos['IdContacto'],
						'IdEmpleado' => $this->session->userdata('Id'),
						'Asignado' => $datos['cmbIng'],
						'IdTipoEquipo' => $datos['cmbTipoEquipo'],
						'NumeroSerie' => $datos['NoSerie'],
						'NumeroEquipo' => $datos['Producto'],
						'Marca' => $datos['Marca'],
						'Modelo' => $datos['Modelo'],
						'Color' => $datos['Color'],
						'Falla' => $datos['Falla'],
						'Accesorios' => $datos['Accesorios'],
						'Observaciones' => $datos['Observacion'],
						'Contrasena' => $datos['Contrasena'],
						'LugarRevision' => $datos['LugarRevision'],
						'Prioridad' => $prioridad,
						'Garantia' => $Garantia,
						'Respaldo' => $Respaldo,
						'Reincidencia' => $Reincidencia,
						'Fecha' => $Fecha,
						'Hora' => $Hora,
						'Estatus' => 'En reparación'
					);					
				}else{
					$equipo = array(
						'IdCliente' => $datos['IdCliente'],
						'IdEmpleado' => $this->session->userdata('Id'),
						'Asignado' => $datos['cmbIng'],
						'IdTipoEquipo' => $datos['cmbTipoEquipo'],
						'NumeroSerie' => $datos['NoSerie'],
						'NumeroEquipo' => $datos['Producto'],
						'Marca' => $datos['Marca'],
						'Modelo' => $datos['Modelo'],
						'Color' => $datos['Color'],
						'Falla' => $datos['Falla'],
						'Accesorios' => $datos['Accesorios'],
						'Observaciones' => $datos['Observacion'],
						'Contrasena' => $datos['Contrasena'],
						'LugarRevision' => $datos['LugarRevision'],
						'Prioridad' => $prioridad,
						'Garantia' => $Garantia,
						'Respaldo' => $Respaldo,
						'Reincidencia' => $Reincidencia,
						'Fecha' => $Fecha,
						'Hora' => $Hora,
						'Estatus' => 'En reparación'
					);
				}

				$LastIdOrden = $this->ModOrdenes->registrar($equipo);

				foreach($LastIdOrden as $Orden){
					$IdOrden = $Orden->IdOrden;
				}

				if($LastIdOrden != NULL){
					$asignacion = array(
						'IdOrden' => $IdOrden,
						'IdEmpleado' => $this->session->userdata('Id'),
						'AsignadoA' => $datos['cmbIng'],
						'Fecha' => $fechag,
						'Hora' => $hora
					);
					$agrAsignacion = $this->ModOrdenes->asignar($asignacion);

					if($asignacion){
						echo '<script> alert("Se ha agregado la orden correctamente"); </script>';
						redirect('Ordenes/index');
					}
				}				
			}
		}
	}

	public function orden(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			
			$data['contenido'] = "ordenes/registro";
        	$data['perfil'] = $this->session->userdata('Perfil');
			$data['clientes'] = $this->ModClientes->listaclientes();
			$data['empresas'] = $this->ModEmpresas->empresaactiva();
			$data['contactos'] = $this->ModContactos->contactosactivos();

			$this->load->view('plantilla',$data);
		}
	}

	public function consultar(){
		$tecnico = "no propio";

		if($tecnico == "propio"){	
			$data['contenido'] = "ordenes/consultar";
			$data['perfil'] = "Administrador";
        	$data['perfil2'] = "Técnico";

			$this->load->view('plantilla',$data);
		}else{
				
			$data['contenido'] = "ordenes/consultarexterna";
			$data['perfil'] = "Administrador";
        	$data['perfil2'] = "Técnico";

			$this->load->view('plantilla',$data);
		}
	}
	
	public function reasignar(){
		$data['contenido'] = "ordenes/reasignar";
		$data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}

	public function reportes(){
		$data['contenido'] = "ordenes/reportes";
		$data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}

	public function inventario(){
		$data['contenido'] = "ordenes/inventario";
		$data['perfil'] = "Administrador";
        $data['perfil2'] = "Técnico";

		$this->load->view('plantilla',$data);
	}

	public function pdf(){
		//$this->load->view('ordenes/pdf');

		$data=[];
		require_once('././public/vendor/autoload.php');

		$mpdf = new \Mpdf\Mpdf([
	
		]);
		$html = $this->load->view('ordenes/pdf',$data,true);

		//echo $html;
		//exit;

		$mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);
	
		$mpdf->Output();
	}
}