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
		$this->load->model("ModSeguimiento");
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

	//Obtiene los datos del cliente dependiendo si es empresa o cliente particular
	public function datoscliente(){
		
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();

			if(isset($datos)){
				
				$TipoCliente = $datos['TipoCliente'];
				$Cliente = $datos['txtClientes'];
				$Empresa = $datos['txtEmpresa'];
				$Contacto = $datos['cmbContactos'];

				switch($TipoCliente){
					case 1:
						$list = explode(' ', $Empresa);
						foreach($list as $value=>$datosclie){
							$Id=$list[0];
						}

						$datosEmp['contenido'] = 'ordenes/registro';

						$datosEmp['perfil'] = $this->session->userdata('Perfil');
						$datosEmp['clientes'] = $this->ModClientes->listaclientes();
						$datosEmp['empresas'] = $this->ModEmpresas->empresaactiva();
						$datosEmp['contactos'] = $this->ModContactos->contactosactivos();
						$datosEmp['tipoequipo'] = $this->ModOrdenes->listaequipos();
						$datosEmp['ing'] =$this->ModUsuarios->listausuarios();
								
						//print_r($datosEmp['ing']);exit;

						$datosEmp['empresa'] = $this->ModEmpresas->buscarempresa($Id);
						$datosEmp['contacto'] = $this->ModContactos->buscarcontacto($Contacto);
						$datosEmp['tipocliente'] = 'Empresa';


						$this->load->view('plantilla',$datosEmp);
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
				}
			}else{
				redirect('Ordenes/index',refresh);
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
			$hora = date("h:i:s a",  time());
			
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

				if(isset($datos['Intervenido'])){
					$Intervenido = $datos['Intervenido'];
				}else{
					$Intervenido = 0;
				}

				if(isset($datos['Tinta'])){
					$Tinta = $datos['Tinta'];
				}else{
					$Tinta = 0;
				}

				if(isset($datos['FCartuchos'])){
					$FCartuchos = $datos['FCartuchos'];
				}else{
					$FCartuchos = 0;
				}

				if(isset($datos['Toner'])){
					$Toner = $datos['Toner'];
				}else{
					$Toner = 0;
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
						'Intervenido' => $Intervenido,
						'Tinta' => $Tinta,
						'Cartuchos' => $FCartuchos,
						'Toner' => $Toner,
						'Fecha' => $Fecha,
						'Hora' => $Hora,
						'Estatus' => 'Sin revisar'
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
						'Intervenido' => $Intervenido,
						'Tinta' => $Tinta,
						'Cartuchos' => $FCartuchos,
						'Toner' => $Toner,
						'Fecha' => $Fecha,
						'Hora' => $Hora,
						'Estatus' => 'Sin revisar'
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
					
					$comentario = array(
						'IdOrden' => $IdOrden,
						'IdEmpleado' => $this->session->userdata('Id'),
						'TipoComentario' => 'Mostrar al cliente',
						'Comentario' => 'Equipo recibido',
						'Estatus' => 'Sin revisar',
						'Fecha' => $fechag,
						'Hora' => $hora
					);

					$agrComentario = $this->ModSeguimiento->ingresar($comentario);

					if($agrAsignacion){
						$this->verorden($IdOrden);
					}
				}				
			}
		}
	}

	//Redirecciona a la vista de consultar orden
	public function consultar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$data['contenido'] = 'ordenes/consultar';
			$data['perfil'] = $this->session->userdata('Perfil');
			$data['clientes'] = $this->ModClientes->listaclientes();
			$data['empresas'] = $this->ModEmpresas->empresaactiva();

			$this->load->view('plantilla',$data);
		}
	}

	//captura los criterios de busqueda para enviarlos al modelo
	public function busquedas(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();

			if(isset($datos)){
				$TipoBusqueda = $datos['TipoBusqueda'];
				$orden = null;
				$conteo = null;
				switch($TipoBusqueda){
					case "Orden":
							$IdOrden = $datos['NoOrden'];
							$orden = $this->ModOrdenes->buscarordenCliente($IdOrden);
							if($orden == null){
								$orden = $this->ModOrdenes->buscarordenEmpresa($IdOrden);
								if($orden == null){
									echo '<scritp> alert("No se encontraron resultados"); </script>';
									redirect('Ordenes/consultar','refresh');
								}
							}
							$data['seguimiento'] = $this->ModSeguimiento->listaseguimiento($IdOrden);
						break;
					case "Serie":
							$Serie = $datos['NoSerie'];
							$orden = $this->ModOrdenes->buscarordenCliente($Serie);
							if($orden == null){
								$orden = $this->ModOrdenes->buscarordenEmpresa($Serie);
								if($orden == null){
									echo '<scritp> alert("No se encontraron resultados"); </script>';
									redirect('Ordenes/consultar','refresh');
								}else{
									foreach($orden as $ord){
										$Id = $ord->Orden;
									}
									
									$data['seguimiento'] = $this->ModSeguimiento->listaseguimiento($Id);
								}
							}else{
								foreach($orden as $ord){
									$Id = $ord->Orden;
								}
								
								$data['seguimiento'] = $this->ModSeguimiento->listaseguimiento($Id);
							}
						break;
					case "Cliente":
							$Cliente = $datos['NomCliente'];
							
							$list = explode(' ', $Cliente);
							foreach($list as $value=>$datosclie){
								$IdCliente=$list[0];
							}
							$count = $this->ModOrdenes->conteocliente($IdCliente);
							if($count){
								foreach($count as $con){
									$conteo = $con->conteo;
								}
							}

							$orden = $this->ModOrdenes->buscarordenIdCliente($IdCliente);
						break;
					case "Empresa":
							$Cliente = $datos['NomEmpresa'];
							
							$list = explode(' ', $Cliente);
							foreach($list as $value=>$datosclie){
								$IdCliente=$list[0];
							}
							$count = $this->ModOrdenes->conteoempresa($IdCliente);
							if($count){
								foreach($count as $con){
									$conteo = $con->conteo;
								}
							}

							$orden = $this->ModOrdenes->buscarordenIdEmpresa($IdCliente);
						break;
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
				$data['conteo'] = $conteo;
				$data['orden'] = $orden;
				$data['dias'] = $dias;
				$this->load->view('plantilla',$data);
			}
		}
	}

	//Busqueda de la orden seleccionada en la tabla 
	public  function buscar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
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


	//Redirecciona a la reasignación de se las ordenes
	public function reasignar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			if($this->session->userdata('Perfil') == "Administrador"){
				$data['contenido'] = "reasignaciones/index";
				$data['perfil'] = $this->session->userdata('Perfil');
				$data['ing'] = $this->ModUsuarios->listausuarios();
				$this->load->view('plantilla',$data);
			}else{
				echo '<script> alert("No tiene permisos para ingresar a este apartado"); </script>';
				redirect('Inicio/index','refresh');
			}
		}
	}

	//Busca la orden para poder reasignarla
	public function busquedareasignacion(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$datos = $this->input->post();


			if(isset($datos)){	
				$Id = $datos['IdOrden'];

				$orden = $this->ModOrdenes->buscarordenCliente($Id);
				if($orden == null){
					$orden = $this->ModOrdenes->buscarordenEmpresa($Id);
				}
				$data['contenido'] = "reasignaciones/reasignacion";
				$data['perfil'] = $this->session->userdata('Perfil');
				$data['ing'] = $this->ModUsuarios->listausuarios();
				$data['orden'] = $orden;
				$data['asignaciones'] = $this->ModOrdenes->asignaciones($Id);

				$this->load->view('plantilla',$data);
			}
		}
	}

	//Captura los datos del formulario para realizar la reasignación en el modelo
	public function asignar(){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			//Se establece el uso horario que se utilizará
			date_default_timezone_set('America/Mexico_City');
			$datos = $this->input->post();
			$fechag = date("Y-m-d");
			$hora = date("h:i:s", time());

			if(isset($datos)){
				$IdOrden = $datos['txtOrden'];
				

				$asignacion = array(
					'IdOrden' => $IdOrden,
					'IdEmpleado' => $this->session->userdata('Id'),
					'AsignadoA' => $datos['cmbIng'],
					'Fecha' => $fechag,
					'Hora' => $hora
				);

				$consulta = $this->ModOrdenes->consultarAsignacion($IdOrden);
				if($consulta){
					$this->ModOrdenes->actualizaorden($IdOrden,$datos['cmbIng']);
				}


				$agrAsignacion = $this->ModOrdenes->asignar($asignacion);



				if($asignacion){
					echo '<script> alert("Se ha reasignado la orden correctamente"); </script>';
					redirect('Ordenes/index');
				}
			}
		}
	}

	public function verorden($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			require_once('././public/vendor/autoload.php');
			$css = file_get_contents('././public/dist/css/pdf.css');

			$orden = null;
			$orden = $this->ModOrdenes->buscarordenCliente($Id);
			
			if($orden == null){
				$orden = $this->ModOrdenes->buscarordenEmpresa($Id);
				if($orden == null){
					echo '<scritp> alert("No se encontraron resultados"); </script>';
					redirect('Ordenes/consultar','refresh');
				}
				
				$data['orden'] = $orden;

				$mpdf = new \Mpdf\Mpdf([]);

				$html = $this->load->view('ordenes/ordenEmpresaPDF', $data, true);

				$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
				$mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);
	
				$mpdf->Output();
			}else{
				$data['orden'] = $orden;
				$mpdf = new \Mpdf\Mpdf([]);
				$html = $this->load->view('ordenes/ordenClientePDF', $data, true);
				
				$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
				$mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);
	
				$mpdf->Output();
			}
		}
	}

	public function verentrega($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			require_once('././public/vendor/autoload.php');
			$css = file_get_contents('././public/dist/css/pdf.css');

			$orden = null;
			$orden = $this->ModOrdenes->buscarordenCliente($Id);
			
			if($orden == null){
				$orden = $this->ModOrdenes->buscarordenEmpresa($Id);
				if($orden == null){
					echo '<scritp> alert("No se encontraron resultados"); </script>';
					redirect('Ordenes/consultar','refresh');
				}
				
				$data['orden'] = $orden;
				$data['resultado'] = $this->ModSeguimiento->resultado($Id);

				$mpdf = new \Mpdf\Mpdf([]);

				$html = $this->load->view('ordenes/entregaEmpresaPDF', $data, true);

				$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
				$mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);
	
				$mpdf->Output();
			}else{
				$data['orden'] = $orden;
				$data['resultado'] = $this->ModSeguimiento->resultado($Id);

				$mpdf = new \Mpdf\Mpdf([]);
				$html = $this->load->view('ordenes/entregaClientePDF', $data, true);
				
				$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
				$mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);
	
				$mpdf->Output();
			}
		}
	}

	/*public function pdf(){
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
	}*/

	//Captura los datos del formulario para marcar como entregado el equipo
	public function entregar($Id){
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
			$consulta = $this->ModOrdenes->verificaestatus($Id);

			foreach($consulta as $con){
				$Estatus = $con->Estatus;
			}

			if($Estatus == "Terminado" || $Estatus == "Terminado sin reparar"){
				$actualiza = $this->ModOrdenes->entregar($Id);

				if($actualiza){
					$this->verentrega($Id);
				}
			}else{
				echo '<script> alert("No es posible entregar el equipo si no se encuentra terminado"); </script>';
				redirect('Ordenes/index', 'refresh');
			}			
		}
	}
}