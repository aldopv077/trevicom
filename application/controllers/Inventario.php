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
            $data['lista'] = $this->ModInventario->lista();
            
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
                        if($inventario != null){
                            foreach($inventario as $inv){
                                $Id = $inv->IdInventario;
                            }

                            $existentes = $this->ModInventario->ContExistentes($Id);

                            foreach($existentes as $exist){
                                $existe = $exist->conteo;
                            }

                            $data['contenido'] = 'inventario/consultar';
                            $data['perfil'] = $this->session->userdata('Perfil');
                            $data['inventario'] = $inventario;
                            $data['contexistentes'] = $existe;
                            $data['desaparecidas'] = $this->ModInventario->Desaparecidas($Id);
                            $data['encontradas'] = $this->ModInventario->Encontradas($Id);
                        }else{
                            echo'<script> alert("No se encontraron resultados en su busqueda");</script>';
                            redirect('Inventario/index','refresh');
                        }

                }else if($IdInventario != null){

                    $existentes = $this->ModInventario->ContExistentes($IdInventario);
                    $inventario = $this->ModInventario->ConInventario($IdInventario);
                    
                    if($inventario != null){
                        foreach($existentes as $exist){
                            $existe = $exist->conteo;
                        }
                        $data['contenido'] = 'inventario/consultar';
                        $data['perfil'] = $this->session->userdata('Perfil');
                        $data['inventario'] = $inventario;
                        $data['contexistentes'] = $existe;
                        $data['desaparecidas'] = $this->ModInventario->Desaparecidas($IdInventario);
                        $data['encontradas'] = $this->ModInventario->Encontradas($IdInventario);
                    }else{
                        echo'<script> alert("No se encontraron resultados en su busqueda");</script>';
                        redirect('Inventario/index','refresh');
                    }
                }

                $this->load->view('plantilla', $data);
            }
        }
    }

    //Consulta inventario seleccionado
    public function econsultainv($Id){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
                    $existentes = $this->ModInventario->ContExistentes($Id);
                    $inventario = $this->ModInventario->ConInventario($Id);
                    
                    if($inventario != null){
                        foreach($existentes as $exist){
                            $existe = $exist->conteo;
                        }
                        $data['contenido'] = 'inventario/consultar';
                        $data['perfil'] = $this->session->userdata('Perfil');
                        $data['inventario'] = $inventario;
                        $data['contexistentes'] = $existe;
                        $data['desaparecidas'] = $this->ModInventario->Desaparecidas($Id);
                        $data['encontradas'] = $this->ModInventario->Encontradas($Id);
                    }else{
                        echo'<script> alert("No se encontraron resultados en su busqueda");</script>';
                        redirect('Inventario/index','refresh');
                    }

                $this->load->view('plantilla', $data);
        }
    }

    //Consulta las ordenes no encotradas para su actualizacion de datos
    public function ebuscainv($IdInventario){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{

                if($IdInventario != null){

                    $existentes = $this->ModInventario->ContExistentes($IdInventario);

                    foreach($existentes as $exist){
                        $existe = $exist->conteo;
                    }
                    $data['contenido'] = 'inventario/consulta';
                    $data['perfil'] = $this->session->userdata('Perfil');
                    $data['inventario'] = $this->ModInventario->ConInventario($IdInventario);
                    $data['contexistentes'] = $existe;
                    $data['desaparecidas'] = $this->ModInventario->Desaparecidas($IdInventario);
                    $data['encontradas'] = $this->ModInventario->Encontradas($IdInventario);
                }
                $this->load->view('plantilla', $data);
        }
    }

    //Marcar como encontrado y agregar el comentario
    public function encontradas(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login','refresh');
        }else{
           $encontrados = $_POST['Comentario'];

           if(isset($encontrados)){
                $tam = sizeof($encontrados);
                $comentario = $_POST['Comentario'];
                $fecha = date('Y-m-d');
                $Id = $_POST['IdInventario'];
                $IdOrden = $_POST['IdOrden'];

                
                for($x = 0; $x < $tam; $x++){
                    $comentarios = array(
                        'Encontrada' => 1,
                        'Comentario' => $comentario[$x],
                        'FechaComentario' => $fecha
                    );

                    $ingresar = $this->ModInventario->actDesaparecidas($Id, $IdOrden[$x], $comentarios);
                    if($ingresar){
                        echo '<script> alert("Inventario actualizado"); </script>';
                        redirect('Inventario/index');
                    }
                }
           }else{
               redirect('Inventario/index', 'refresh');
           }
        }
    }

    //Muestra pdf del inventario para impresión
    public function pdf($Id){
		/*$data['inventario'] = $this->ModInventario->ConInventario($Id);
        $data['ordenes'] = $this->ModInventario->Ordenes();
        $this->load->view('inventario/inventarioPDF', $data);*/

		

		require_once('././public/vendor/autoload.php');
        $css = file_get_contents('././public/dist/css/inventariopdf.css');

        $data['inventario'] = $this->ModInventario->ConInventario($Id);
        $data['ordenes'] = $this->ModInventario->Ordenes();

		$mpdf = new \Mpdf\Mpdf([
	
		]);


        $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        
		$html = $this->load->view('inventario/inventarioPDF',$data,true);

		//echo $html;
		//exit;

		$mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);
	
		$mpdf->Output();
	}
}
