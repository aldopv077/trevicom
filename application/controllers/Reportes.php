<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model("ModUsuarios");
		$this->load->model("ModReportes");
    }

    //Redirecciona a la vista reportes
	public function index()
	{
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
            $data['contenido'] = "reportes/prueba";
			$data['perfil'] = $this->session->userdata('Perfil');
			$data['ing'] = $this->ModUsuarios->listausuarios();

			$this->load->view('plantilla',$data);
        }
    }

    //Obtiene los datos de la vista para realizar la busquda desde el modelo
    public function reporte(){
		if($this->session->userdata('is_logued_in') == FALSE){
			redirect('login','refresh');
		}else{
			$datos = $this->input->post();

			if(isset($datos)){
                if(isset($datos['cmbIng'])){
                    $Ing = $datos['cmbIng'];
                }else{
                    $Ing = $this->session->userdata('Iniciales');
                }

				$Estatus = $datos['cmbEstatus'];
				$reporteCli = null;
				$reporteEmp = null;
                
                //echo 'Ing = '. $Ing .' Estatus = '.$Estatus;
                //echo'<br><br><br>';

                switch($Estatus){
                    case "Urgente":
                            if($Ing == "0"){
                                $reporteCli = $this->ModReportes->ReporteUrgCliente();
                                $reporteEmp = $this->ModReportes->ReporteUrgEmpresa();
                            }else{
                                $reporteCli = $this->ModReportes->ReporteUrgIngCliente($Ing);
                                $reporteEmp = $this->ModReportes->ReporteUrgIngEmpresa($Ing);
                            }
                        break;
                    case "Garantía":
                            if($Ing == "0"){
                                $reporteCli = $this->ModReportes->ReporteGarCliente();
                                $reporteEmp = $this->ModReportes->ReporteGarEmpresa();
                            }else{
                                $reporteCli = $this->ModReportes->ReporteGarIngCliente($Ing);
                                $reporteEmp = $this->ModReportes->ReporteGarIngEmpresa($Ing);
                            }
                        break;
                    case "Reincidencia":
                            if($Ing == "0"){
                                $reporteCli = $this->ModReportes->ReporteReinCliente();
                                $reporteEmp = $this->ModReportes->ReporteReinEmpresa();
                            }else{
                                $reporteCli = $this->ModReportes->ReporteReinIngCliente($Ing);
                                $reporteEmp = $this->ModReportes->ReporteReinIngEmpresa($Ing);
                            }
                        break;
                    default:
                            if($Ing == "0"){
                                $reporteCli = $this->ModReportes->ReporteCliente($Estatus);
                                $reporteEmp = $this->ModReportes->ReporteEmpresa($Estatus);
                            }else{
                                $reporteCli = $this->ModReportes->ReporteIngCliente($Ing, $Estatus);
                                $reporteEmp = $this->ModReportes->ReporteIngEmpresa($Ing, $Estatus);
                            }
                        break;
                }
                
                //print_r($reporteCli); echo'<br><br>'; print_r($reporteEmp); exit;

				$data['contenido'] = "reportes/reportes";
				$data['perfil'] = $this->session->userdata('Perfil');
                $data['reporteCli'] = $reporteCli;
                $data['reporteEmp'] = $reporteEmp;
				$data['ing'] = $this->ModUsuarios->listausuarios();

				$this->load->view('plantilla', $data);
			}
		}

	}
}