<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("ModInicio");
        $this->load->model("ModUsuarios");
    }

	public function index()
	{
		if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{	
			$perfil = $this->session->userdata('Perfil');

			$SinRevisar = 0;
			$Revisado = 0;
			$EsperaPzas = 0;
			$Terminado = 0;
			$TerminadoSR = 0;


			if($perfil == "Administrador"){
				$data['contenido'] = "inicio/admin";
				$data['perfil'] = $perfil;
				$data['Usuarios'] = $this->ModUsuarios->listausuarios();
				$data['Ordenes'] = $this->ModInicio->ordenes();
				
				$this->load->view('plantilla',$data);
			}else{
				$ordenes = $this->ModInicio->ordenestec($this->session->userdata('Iniciales'));

				/*for($x=0; $x < sizeof($ordenes); $x++){
					switch($ordenes[$x]->Estatus){
						case "Sin revisar":
								$SinRevisar = $SinRevisar + 1; 
							break;
						case "Revisado":
								$Revisado = $Revisado + 1;
							break;
						case "En espera de piezas":
								$EsperaPzas = $EsperaPzas +1;
							break;
						case "Terminado":
								$Terminado = $Terminado +1;
							break;
						case "Terminado sin reparar":
								$TerminadoSR = $TerminadoSR +1;
							break;
					}
	
					$cantidad = array(
						'SinRevisar' => $SinRevisar,
						'Revisado' => $Revisado,
						'EsperaPzas' => $EsperaPzas,
						'Terminado' => $Terminado,
						'TerminadoSR' => $TerminadoSR
					);
				}*/

				

				$data['contenido'] = "inicio/tecnico";
				$data['perfil'] = $perfil;
				//$data['cantidades'] = $cantidad;
				$data['ordenes'] = $ordenes;
				//print_r($data['cantidades']); exit;
				
				$this->load->view('plantilla',$data);
			}

			
			
			/*for($z=0;$z < sizeof($usuarios); $z++){
				for($y=0; $y < sizeof($ordenes); $y++){
					if($ordenes[$y]->Asignado == $usuarios[$z]->Iniciales){
						switch($ordenes[$y]->Estatus){
							case "Sin revisar":
									$SinRevisar = $SinRevisar + 1; 
								break;
							case "Revisado":
									$Revisado = $Revisado + 1;
								break;
							case "En espera de piezas":
									$EsperaPzas = $EsperaPzas +1;
								break;
							case "Terminado":
									$Terminado = $Terminado +1;
								break;
							case "Terminado sin reparar":
									$TerminadoSR = $TerminadoSR +1;
								break;
						}
					}
				}
				echo 'Sin revisar: '.$SinRevisar. ' Revisado: '.$Revisado.' En espera de piezas: '.$EsperaPzas.' Terminado: '.$Terminado.' Terminado sin reparar: '.$TerminadoSR;
				
				$SinRevisar = 0;
				$Revisado = 0;
				$EsperaPzas = 0;
				$Terminado = 0;
				$TerminadoSR = 0;
			}*/
		}
	}
}
