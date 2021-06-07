<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("ModOrdenes");
        $this->load->model("ModSeguimiento");
        $this->load->model("ModClientes");
        $this->load->model("ModEmpresas");
    }


	//Redirecciona a la vista principal del seguimiento
	public function index()
	{
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$data['contenido'] = "seguimiento/index";
			$data['perfil'] = $this->session->userdata('Perfil');
			$this->load->view('plantilla',$data);
		}
	}

	//Captura el Id de la orden para buscarla y registrar su seguimiento
	public function buscaorden(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();
			if(isset($datos)){
				$Id = $datos['IdOrden'];
				$orden = $this->ModOrdenes->buscarordenCliente($Id);
				
				if($orden == null){
					$orden = $this->ModOrdenes->buscarordenEmpresa($Id);
					if($orden == null){
						echo '<scritp> alert("No se encontraron resultados"); </script>';
						redirect('Seguimiento/index', 'refresh');
					}else if($this->session->userdata('Perfil') == "Técnico"){
						foreach($orden as $ord){
							$Asignado = $ord->Asignado;
						}
	
						if($Asignado == $this->session->userdata('Iniciales')){

							foreach($orden as $datos){
								$formatofecha = strtotime($datos->Fecha);
								$fecha = date("d-m-Y");
								
								$AnioActual = date("Y");
								$MesActual = date("m");
								$DiaActual = date("d");
			
								$AnioSQL = date("Y", $formatofecha);
								$MesSQL = date("m", $formatofecha);
								$DiaSQL = date("d", $formatofecha);
			
								//contabilizar cuantos días hay de diferencia entre la fecha actual y la fecha de registro
								$timestampSQL = mktime(0,0,0, $MesSQL, $DiaSQL, $AnioSQL);
								$timestampActual = mktime(0,0,0,$MesActual,$DiaActual,$AnioActual);
			
								$segundos_diferencia = $timestampActual - $timestampSQL;
								$dias = $segundos_diferencia/(60*60*24);
			
								//Valor abosoluto de los días y asi siquita el signo negativo
								$dias = abs($dias);
			
								//se quitan los decimales y se redondea al valor más bajo cercano
								$dias = floor($dias);
			
								$FechaSQL = $DiaSQL ."/". $MesSQL ."/". $AnioSQL;
								$FechaActual = $DiaActual .'/'. $MesActual .'/'. $AnioActual;
							}
	

							$data['contenido'] = "seguimiento/registro";
							$data['perfil'] = $this->session->userdata('Perfil');
							$data['seguimiento'] = $this->ModSeguimiento->listaseguimiento($Id);
							$data['orden'] = $orden;
							$data['dias'] =$dias;
							
							$this->load->view('plantilla',$data);
						}
						else{
							echo '<script> alert("Este equipo no lo tiene asignado"); </script>';
							redirect('Seguimiento/index','refresh');
						}
					}else{
						foreach($orden as $datos){
							$formatofecha = strtotime($datos->Fecha);
							$fecha = date("d-m-Y");
							
							$AnioActual = date("Y");
							$MesActual = date("m");
							$DiaActual = date("d");
		
							$AnioSQL = date("Y", $formatofecha);
							$MesSQL = date("m", $formatofecha);
							$DiaSQL = date("d", $formatofecha);
		
							//contabilizar cuantos días hay de diferencia entre la fecha actual y la fecha de registro
							$timestampSQL = mktime(0,0,0, $MesSQL, $DiaSQL, $AnioSQL);
							$timestampActual = mktime(0,0,0,$MesActual,$DiaActual,$AnioActual);
		
							$segundos_diferencia = $timestampActual - $timestampSQL;
							$dias = $segundos_diferencia/(60*60*24);
		
							//Valor abosoluto de los días y asi siquita el signo negativo
							$dias = abs($dias);
		
							//se quitan los decimales y se redondea al valor más bajo cercano
							$dias = floor($dias);
		
							$FechaSQL = $DiaSQL ."/". $MesSQL ."/". $AnioSQL;
							$FechaActual = $DiaActual .'/'. $MesActual .'/'. $AnioActual;
						}


						$data['contenido'] = "seguimiento/registro";
						$data['perfil'] = $this->session->userdata('Perfil');
						$data['seguimiento'] = $this->ModSeguimiento->listaseguimiento($Id);
						$data['orden'] = $orden;
						$data['dias'] = $dias;
							
						$this->load->view('plantilla',$data);
					}
	
				}else if($this->session->userdata('Perfil') == "Técnico"){
					foreach($orden as $ord){
						$Asignado = $ord->Asignado;
					}

					if($Asignado == $this->session->userdata('Iniciales')){
						
						foreach($orden as $datos){
							$formatofecha = strtotime($datos->Fecha);
							$fecha = date("d-m-Y");
							
							$AnioActual = date("Y");
							$MesActual = date("m");
							$DiaActual = date("d");
		
							$AnioSQL = date("Y", $formatofecha);
							$MesSQL = date("m", $formatofecha);
							$DiaSQL = date("d", $formatofecha);
		
							//contabilizar cuantos días hay de diferencia entre la fecha actual y la fecha de registro
							$timestampSQL = mktime(0,0,0, $MesSQL, $DiaSQL, $AnioSQL);
							$timestampActual = mktime(0,0,0,$MesActual,$DiaActual,$AnioActual);
		
							$segundos_diferencia = $timestampActual - $timestampSQL;
							$dias = $segundos_diferencia/(60*60*24);
		
							//Valor abosoluto de los días y asi siquita el signo negativo
							$dias = abs($dias);
		
							//se quitan los decimales y se redondea al valor más bajo cercano
							$dias = floor($dias);
		
							$FechaSQL = $DiaSQL ."/". $MesSQL ."/". $AnioSQL;
							$FechaActual = $DiaActual .'/'. $MesActual .'/'. $AnioActual;
						}


						$data['contenido'] = "seguimiento/registro";
						$data['perfil'] = $this->session->userdata('Perfil');
						$data['seguimiento'] = $this->ModSeguimiento->listaseguimiento($Id);
						$data['orden'] = $orden;
						$data['dias'] = $dias;
						
						$this->load->view('plantilla',$data);
					}else{
						echo '<script> alert("Este equipo no lo tiene asignado"); </script>';
						redirect('Seguimiento/index','refresh');
					}
				}else{
					foreach($orden as $datos){
						$formatofecha = strtotime($datos->Fecha);
						$fecha = date("d-m-Y");
						
						$AnioActual = date("Y");
						$MesActual = date("m");
						$DiaActual = date("d");
	
						$AnioSQL = date("Y", $formatofecha);
						$MesSQL = date("m", $formatofecha);
						$DiaSQL = date("d", $formatofecha);
	
						//contabilizar cuantos días hay de diferencia entre la fecha actual y la fecha de registro
						$timestampSQL = mktime(0,0,0, $MesSQL, $DiaSQL, $AnioSQL);
						$timestampActual = mktime(0,0,0,$MesActual,$DiaActual,$AnioActual);
	
						$segundos_diferencia = $timestampActual - $timestampSQL;
						$dias = $segundos_diferencia/(60*60*24);
	
						//Valor abosoluto de los días y asi siquita el signo negativo
						$dias = abs($dias);
	
						//se quitan los decimales y se redondea al valor más bajo cercano
						$dias = floor($dias);
	
						$FechaSQL = $DiaSQL ."/". $MesSQL ."/". $AnioSQL;
						$FechaActual = $DiaActual .'/'. $MesActual .'/'. $AnioActual;
					}

					$data['contenido'] = "seguimiento/registro";
					$data['perfil'] = $this->session->userdata('Perfil');
					$data['seguimiento'] = $this->ModSeguimiento->listaseguimiento($Id);
					$data['orden'] = $orden;
					$data['dias'] = $dias;
						
					$this->load->view('plantilla',$data);
				}
			}
		}
	}

	//Captura los datos del formulario para guardar el seguimiento de la orden en el modelo
	public function registrar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();

			//Se establece el uso horario que se utilizará
			date_default_timezone_set('America/Mexico_City');
			$datos = $this->input->post();
			$fechag = date("Y-m-d");
			$hora = date("h:i:s a", time());

			if(isset($datos)){

				$seguimiento = array(
					'IdOrden' => $datos['txtIdOrden'],
					'IdEmpleado' => $this->session->userdata('Id'),
					'TipoComentario' => $datos['cmbTComentario'],
					'Comentario' => $datos['Comentario'],
					'Estatus' => $datos['cmbEstatus'],
					'Fecha' => $fechag,
					'Hora' => $hora,
				);

				//print_r($seguimiento);exit;
				$ingresar=$this->ModSeguimiento->ingresar($seguimiento);

				if($ingresar){

					if(isset($datos['Costo'])){
						$Costo = $datos['Costo'];
						$Estatus = $datos ['cmbEstatus'];
						$Id = $datos['txtIdOrden'];
						
						$this->ModOrdenes->costo($Id, $Costo, $Estatus);
					}else{
						$Estatus = $datos ['cmbEstatus'];
						$Id = $datos['txtIdOrden'];

						$this->ModOrdenes->estatus($Id, $Estatus);
					}

					$Id = $datos['txtIdOrden'];
					$orden = $this->ModOrdenes->buscarordenCliente($Id);
					if($orden == null){
						$orden = $this->ModOrdenes->buscarordenEmpresa($Id);
						if($orden == null){
							echo '<scritp> alert("No se encontraron resultados"); </script>';
							redirect('Seguimiento/index', refresh);
						}
					}

					if($this->session->userdata('Perfil') == "Técnico"){
						$data['contenido'] = "seguimiento/registro";
						$data['perfil'] = $this->session->userdata('Perfil');
						$data['orden'] = $orden;
						$data['seguimiento'] = $this->ModSeguimiento->listaseguimiento($Id);

						$this->session->set_userdata('DatosSeguimiento', $data);
						redirect('Seguimiento/seguir');

						//$this->load->view('plantilla',$data);
					}else{
						$conteo = 1;
						$orden = $this->ModOrdenes->buscarordenCliente($Id);
						if($orden == null){
							$orden = $this->ModOrdenes->buscarordenEmpresa($Id);
						}

						foreach($orden as $datos){
							$formatofecha = strtotime($datos->Fecha);
							$fecha = date("d-m-Y");
							
							$AnioActual = date("Y");
							$MesActual = date("m");
							$DiaActual = date("d");
		
							$AnioSQL = date("Y", $formatofecha);
							$MesSQL = date("m", $formatofecha);
							$DiaSQL = date("d", $formatofecha);
		
							//contabilizar cuantos días hay de diferencia entre la fecha actual y la fecha de registro
							$timestampSQL = mktime(0,0,0, $MesSQL, $DiaSQL, $AnioSQL);
							$timestampActual = mktime(0,0,0,$MesActual,$DiaActual,$AnioActual);
		
							$segundos_diferencia = $timestampActual - $timestampSQL;
							$dias = $segundos_diferencia/(60*60*24);
		
							//Valor abosoluto de los días y asi siquita el signo negativo
							$dias = abs($dias);
		
							//se quitan los decimales y se redondea al valor más bajo cercano
							$dias = floor($dias);
		
							$FechaSQL = $DiaSQL ."/". $MesSQL ."/". $AnioSQL;
							$FechaActual = $DiaActual .'/'. $MesActual .'/'. $AnioActual;
						}

						$data['contenido'] = 'ordenes/consultamultiple';
						$data['perfil'] = $this->session->userdata('Perfil');
						$data['clientes'] = $this->ModClientes->listaclientes();
						$data['empresas'] = $this->ModEmpresas->empresaactiva();
						$data['seguimiento'] = $this->ModSeguimiento->listaseguimiento($Id);
						$data['conteo'] = $conteo;
						$data['orden'] = $orden;
						$data['dias'] = $dias;
						$this->load->view('plantilla',$data);
					}
					
				}
			}
		}
	}

	//redirecciona a la vista de registro 
	public function seguir(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
            $dat = $this->session->userdata('DatosSeguimiento');
            $this->load->view('plantilla',$dat);
        }
	}

}