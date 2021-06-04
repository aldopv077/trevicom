<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("ModCotizaciones");
    }

    public function index()
	{
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            $perfil = $this->session->userdata('Perfil');

            if($perfil == "Administrador"){
                $data['contenido'] = "cotizaciones/admin/index";
            }else{
                $data['contenido'] = "cotizaciones/tecnico/index";
            }

            $data['perfil'] = $perfil;
            $this->load->view('plantilla',$data);
        }
	}

    //Registro de solicitud de cotización
    public function solicitud(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            $datos = $this->input->post();

            if(isset($datos)){
                $solicitud = array(
                    'IdOrden' => $datos['Orden'],
                    'Asignado' => $this->session->userdata('Iniciales'),
                    'Estatus' => 'Solicitud'

                );

                $IdCot = $this->ModCotizaciones->solicitud($solicitud);

                if($IdCot){
                    foreach($IdCot as $Cot){
                        $Id = $Cot->IdCotizacion;
                    }

                    $partidas = array(
                        'IdCotizacion' => $Id,
                        'Cantidad' => $datos['Cantidad'],
                        'Descripcion' =>$datos['Descripcion']
                    );

                    $this->ModCotizaciones->agrPartidas($partidas);

                    $data['contenido'] = "cotizaciones/tecnico/registro";
                    $data['perfil'] = $this->session->userdata('Perfil');
                    $data['partidas'] = $this->ModCotizaciones->conPartidas($Id);

                    $this->session->set_userdata('Partidas', $data);
                    redirect('Cotizaciones/partidas');
                    //$this->load->view('plantilla', $data);
                }
            }
        }
    }

    //Redireccion al registro de las partidas
    public function partidas(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            $dat = $this->session->userdata('Partidas');
            $this->load->view('plantilla', $dat);
        }
    }

    //Registro de partidas
    public function agrPartidas(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            $datos = $this->input->post();

            if(isset($datos)){
                $partidas = array(
                    'IdCotizacion' => $datos['Cotizacion'],
                    'Cantidad' => $datos['Cantidad'],
                    'Descripcion' => $datos['Descripcion']
                );
                
                $this->ModCotizaciones->agrPartidas($partidas);

                $data['contenido'] = "cotizaciones/tecnico/registro";
                $data['perfil'] = $this->session->userdata('Perfil');
                $data['partidas'] = $this->ModCotizaciones->conPartidas($datos['Cotizacion']);

                $this->session->set_userdata('Partidas', $data);
                    redirect('Cotizaciones/partidas');
            }
        }
    }

    //Consulta las cotizaciones de las ordenes
    public function consultar(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            if($this->session->userdata('Perfil') == "Administrador"){
                $data['contenido'] = 'cotizaciones/admin/consultar';
                $data['perfil'] = $this->session->userdata('Perfil');
                $data['cotizacionPend'] = $this->ModCotizaciones->conCotizacionPend();
                $data['cotizacionReal'] = $this->ModCotizaciones->conCotizacionReal();

                
                $this->load->view('plantilla',$data);
            }else{
                $data['contenido'] = 'cotizaciones/tecnico/consultar';
                $data['perfil'] = $this->session->userdata('Perfil');
                $data['cotizacionPend'] = $this->ModCotizaciones->conCotizacionPendTec($this->session->userdata('Iniciales'));
                $data['cotizacionReal'] = $this->ModCotizaciones->conCotizacionRealTec($this->session->userdata('Iniciales'));

                $this->load->view('plantilla',$data);
            }
        }
    }    
    
    //Consulta la cotizacion espesificada por enlace
    public function econCotizacion($Id){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            $perfil = $this->session->userdata('Perfil');
            if($perfil == "Técnico"){
                $data['contenido'] = "cotizaciones/tecnico/registro";
                $data['perfil'] = $perfil;
                $data['partidas'] = $this->ModCotizaciones->conPartidas($Id);

                $this->load->view('plantilla', $data);
            }else{
                $data['contenido'] = "cotizaciones/admin/registro";
                $data['perfil'] = $perfil;
                $data['partidas'] = $this->ModCotizaciones->conPartidas($Id);

                $this->load->view('plantilla', $data);
            }
        }
    }

    //Consulta la cotización espesificada
    public function conCotizacion(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
                $datos = $this->input->post();

                if(isset($datos)){
                    $Id = $datos['Cotizacion'];

                    $perfil = $this->session->userdata('Perfil');
                    if($perfil == "Técnico"){
                        $data['contenido'] = "cotizaciones/tecnico/registro";
                        $data['perfil'] = $perfil;
                        $data['partidas'] = $this->ModCotizaciones->conPartidas($Id);

                        $this->load->view('plantilla', $data);
                    }else{
                        $data['contenido'] = "cotizaciones/admin/registro";
                        $data['perfil'] = $perfil;
                        $data['partidas'] = $this->ModCotizaciones->conPartidas($Id);

                        $this->load->view('plantilla', $data);
                    }
                }
                            
        }
    }

    //Realiza los calculos necesarios para realizar la cotización
    public function Calcular(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            $tam = $_POST['tamanio'] - 1;
            $IdCot = $_POST['IdCotizacion'];

            $CostoUS = $_POST['PrecioUS'];
            $TipoCambio = $_POST['TipoCambio'];
            $CostoMX = $_POST['CostoMN'];
            $Margen = $_POST['Margen'];
            $Flete = $_POST['Flete'];
            $Comentario = $_POST['Comentario'];
            $Cantidad = $_POST['Cantidad'];
            $Proveedor = $_POST['Proveedor'];
            $Id = $_POST['IdPartida'];
            $SubTotal = 0;
            $Total=0;

            date_default_timezone_set('America/Mexico_City');
			$fechag = date("Y-m-d");
			$hora = date("h:i:s", time());


            for($x = 0; $x < $tam; $x++){
                               
                if($CostoUS[$x] != "" && $TipoCambio[$x] != "" && $CostoMX[$x] == ""){
                    $CostoMX[$x] = $CostoUS[$x] * $TipoCambio[$x];
                    $cientoganan = '0.'.$Margen[$x];
                    $PrecioUnitario = ($CostoMX[$x]/(1 - $cientoganan)) + $Flete[$x];
                    $Utilidad = ($PrecioUnitario - $CostoMX[$x])-$Flete[$x];
                    
                    $TotalConIva = ($PrecioUnitario * 1.16) * $Cantidad[$x];
                    $TotalSinIva = $PrecioUnitario * $Cantidad[$x];

                    $SubTotal = round($SubTotal + $TotalSinIva, 2) ;
                    $Total = round($Total + $TotalConIva, 2); 

                    $precios = array(
                        'Comentario' => $Comentario[$x],
                        'CostoUS' => $CostoUS[$x],
                        'TipoCambio' => $TipoCambio[$x],
                        'CostoMN' => $CostoMX[$x],
                        'Margen' => $Margen[$x],
                        'Flete' => $Flete[$x],
                        'Utilidad' => round($Utilidad, 2),
                        'PrecioUnitario' => round($PrecioUnitario, 2),
                        'PrecioSinIva' => round($TotalSinIva, 2),
                        'PrecioIva' => round($TotalConIva, 2),
                        'Proveedor' => $Proveedor[$x]
                    ); 
                    
                }else if($CostoUS[$x] == "" && $TipoCambio[$x] == "" && $CostoMX[$x] != ""){
                    $cientoganan = '0.'.$Margen[$x];
                    $PrecioUnitario = ($CostoMX[$x]/(1 - $cientoganan)) + $Flete[$x];
                    $Utilidad = ($PrecioUnitario - $CostoMX[$x])-$Flete[$x];

                    $TotalConIva = ($PrecioUnitario * 1.16)*$Cantidad[$x];
                    $TotalSinIva = $PrecioUnitario * $Cantidad[$x];


                    $SubTotal = round($SubTotal + $TotalSinIva, 2) ;
                    $Total = round($Total + $TotalConIva, 2);  

                    $precios = array(
                        'Comentario' => $Comentario[$x],
                        'CostoMN' => $CostoMX[$x],
                        'Margen' => $Margen[$x],
                        'Flete' => $Flete[$x],
                        'Utilidad' => round($Utilidad, 2),
                        'PrecioUnitario' => round($PrecioUnitario, 2),
                        'PrecioSinIva' => round($TotalSinIva, 2),
                        'PrecioIva' => round($TotalConIva, 2),
                        'Proveedor' => $Proveedor[$x]
                    );

                }

                $ingresar = $this->ModCotizaciones->agrPrecios($Id[$x], $precios);              
            }

            $cotizacion = array(
                'IdEmpleado' => $this->session->userdata('Id'),
                'SubTotal' => $SubTotal,
                'Total' => $Total,
                'Fecha' => $fechag,
                'Hora' => $hora,
                'Estatus' => 'Realizada'
            );

            $ingresacot = $this->ModCotizaciones->actCotizacion($IdCot ,$cotizacion);

            
            if($ingresar){
                echo'<script> alert("Cotización realizada"); </scrpt>';
                redirect('Cotizaciones/index');
            }
        }
    }

    //Muestra la cotización en PDF
    public function CotPDF(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
                //$this->load->view('cotizaciones/pdf');

                $data=[];
                require_once('././public/vendor/autoload.php');
                $css = file_get_contents('././public/dist/css/pdfcot.css');
        
                $mpdf = new \Mpdf\Mpdf([
                    'mode' => 'utf-8',
                    'format' => 'A4',
                    'setAutoTopMargin' => 'stretch',
                    'autoMarginPadding' => 67
                ]);
               
                $html = $this->load->view('cotizaciones/pdf',$data,true);
        
                //echo $html;
                //exit;
                $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
                $mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);
            
                //$mpdf->AddPage('P');
                $mpdf->writeHtml('<p><p>', \Mpdf\HTMLParserMode::HTML_BODY);
                $mpdf->Output();

                
        }
    }
    

    //Eliminar la partida
    public function eliminar($IdPart, $IdCot){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            $this->ModCotizaciones->eliminar($IdPart);

            $data['contenido'] = "cotizaciones/tecnico/registro";
            $data['perfil'] = $this->session->userdata('Perfil');
            $data['partidas'] = $this->ModCotizaciones->conPartidas($IdCot);

            $this->load->view('plantilla', $data);
        }
    }
}
