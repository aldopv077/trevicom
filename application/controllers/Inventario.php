<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model("ModInventario");
    }

	//Redirecciona a la vista inventario
    public function index(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
            $data['contenido'] = "inventario/index";
		    $data['perfil'] = $this->session->userdata('Perfil');

		    $this->load->view('plantilla',$data);
        }		
	}

    //Guarda los datos del formilario y realiza la busqueda para generar la
    //lista de las ordenes existentes a inventariar.
    public function inventariar(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
            $datos = $this->input->post();
            if(isset($datos)){
                $ordenes = $this->ModInventario->Ordenes();
                $total = sizeof($ordenes);

                $inventario = array(
                    'NombreSupervisor' => $datos['Supervisor'],
                    'NombreEncargado' => $datos['JefeDepartamento'],
                    'TotalOrdenes' => $total,
                    'FechaInicio' => $datos['Inicio']
                );

                $Ingresar = $this->ModInventario->registrar($inventario);

                if($Ingresar){
                    foreach($Ingresar as $ingr){
                        $IdInventario = $ingr->IdInventario;
                    }
                    $data = array(
                        'contenido' => 'inventario/inventario',
                        'perfil' => $this->session->userdata('Perfil'),
                        'ordenes' => $ordenes,
                        'Inventario' => $IdInventario
                    );
                    $this->session->set_userdata('datos', $data);
                    redirect('Inventario/invent');
                }
            }
        }
    }

    //Redirecciona a la vista inventario
    public function invent(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
            $dat = $this->session->userdata('datos');
            $this->load->view('plantilla',$dat);
        }
    }

    //Captura las ordenes marcadas para guardarlas en el inventario
    public function inventario(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
            date_default_timezone_set('America/Mexico_City');
			$datos = $this->input->post();
			$fecha = date("Y-m-d");
            $NoEncontrados = 0;

            if(isset($datos)){
                
                $IdInventario = $datos['IdInventario'];

                if(!empty($datos['chbInventario'])){
                    foreach($datos['chbInventario'] as $select){
                       $existentes = $this->ModInventario->existen($IdInventario, $select, $fecha);
                    }
                }
                
                if(!empty($datos['chbNoEncontrado'])){
                    foreach($datos['chbNoEncontrado'] as $sel){
                        $noexitentes = $this->ModInventario->NoEncontradas($IdInventario, $sel, $fecha);   
                    }
                }

                if($existentes == true || $noexitentes == true){
                    echo'<script> alert("Inventario registrado exitosamente"); </script>';
                    redirect('Inventario/index','refresh');
                }
            }
        }
    }

    //Redirecciona a la vista para consultar los inventarios realizados
    public function consultar(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
            $data['contenido'] = 'inventario/consultar';
            $data['perfil'] = $this->session->userdata('Perfil');
            
            $this->load->view('plantilla', $data);
        }
    }

    //Captura los datos del formulario para realizar la consulta por 
    //Id del inventario o fecha de realización
    public function buscainv(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
            $datos = $this->input->post();

            if(isset($datos)){
                $Fecha = $datos['Fecha'];
                $IdInventario = $datos['IdInventario'];

                if($Fecha != null){
                    $inventario = $this->ModInventario->ConInventario($Fecha);

                    foreach($inventario as $inv){
                        $Id = $inv->IdInventario;
                    }

                    $existentes = $this->ModInventario->ContExistentes($Id);

                    foreach($existentes as $exist){
                        $existe = $exist->conteo;
                    }

                    $data['contenido'] = 'inventario/consulta';
                    $data['perfil'] = $this->session->userdata('Perfil');
                    $data['inventario'] = $inventario;
                    $data['contexistentes'] = $existe;
                    $data['desaparecidas'] = $this->ModInventario->Desaparecidas($Id);

                }else if($IdInventario != null){

                    $existentes = $this->ModInventario->ContExistentes($IdInventario);

                    foreach($existentes as $exist){
                        $existe = $exist->conteo;
                    }
                    $data['contenido'] = 'inventario/consulta';
                    $data['perfil'] = $this->session->userdata('Perfil');
                    $data['inventario'] = $this->ModInventario->ConInventario($IdInventario);
                    $data['contexistentes'] = $existe;
                    $data['desaparecidas'] = $this->ModInventario->Desaparecidas($IdInventario);
                }
                $this->load->view('plantilla', $data);
            }
        }
    }
}
