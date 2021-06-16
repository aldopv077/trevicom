<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("ModCotizaciones");
        $this->load->model("ModOrdenes");
        $this->load->model("ModUsuarios");
    }

    public function index()
	{
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            $perfil = $this->session->userdata('Perfil');

            if($perfil == "Administrador"){
                $data['contenido'] = "cotizaciones/admin/index";
                $data['ing'] = $this->ModUsuarios->listausuarios();
                $data['cotpend'] = $this->ModCotizaciones->conCotizacionPend();
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
                        'IdOrden' => $datos['Orden'],
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
                    'IdOrden' => $datos['Orden'],
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
            //Se establece el uso horario que se utilizará
			date_default_timezone_set('America/Mexico_City');
			$fecha = date("Y-m-d");

            if($this->session->userdata('Perfil') == "Administrador"){
                $data['contenido'] = 'cotizaciones/admin/consultar';
                $data['perfil'] = $this->session->userdata('Perfil');
                $data['cotizacionPend'] = $this->ModCotizaciones->conCotizacionPend();
                $data['cotizacionReal'] = $this->ModCotizaciones->conCotizacionReal($fecha);
                $data['ing'] = $this->ModUsuarios->listausuarios();

                
                $this->load->view('plantilla',$data);
            }else{
                $data['contenido'] = 'cotizaciones/tecnico/consultar';
                $data['perfil'] = $this->session->userdata('Perfil');
                $data['cotizacionPend'] = $this->ModCotizaciones->conCotizacionPendTec($this->session->userdata('Iniciales'));
                $data['cotizacionReal'] = $this->ModCotizaciones->conCotizacionRealTec($this->session->userdata('Iniciales'),$fecha);

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
                $partidas = $this->ModCotizaciones->conPartidas($Id);
                        
                        foreach($partidas as $part){
                            $IdOrd = $part->IdOrden;
                        }

                        $orden = $this->ModOrdenes->buscarOrdenCliente($IdOrd);
                        if($orden == null){
                            $orden = $this->ModOrdenes->buscarOrdenEmpresa($IdOrd);
                        }

                        $data['contenido'] = "cotizaciones/admin/registro";
                        $data['perfil'] = $perfil;
                        $data['orden'] = $orden;
                        $data['partidas'] = $partidas;

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
                    $partidas = $this->ModCotizaciones->conPartidas($Id);
                            
                    foreach($partidas as $part){
                        $IdOrd = $part->IdOrden;
                    }

                    $orden = $this->ModOrdenes->buscarOrdenCliente($IdOrd);
                    if($orden == null){
                        $orden = $this->ModOrdenes->buscarOrdenEmpresa($IdOrd);
                    }

                    $data['contenido'] = "cotizaciones/admin/registro";
                    $data['perfil'] = $perfil;
                    $data['orden'] = $orden;
                    $data['partidas'] = $partidas;

                    $this->load->view('plantilla', $data);
                }
            }                 
        }
    }

    //Ingresa los costos de cada partida
    public function agrCostos(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            $tam = $_POST['tamanio'] - 1;
            $IdCot = $_POST['IdCotizacion'];

            
            $Comentario = $_POST['Comentario'];
            $CostoUS = $_POST['PrecioUS'];
            $TipoCambio = $_POST['TipoCambio'];
            $CostoMX = $_POST['CostoMN'];
            $Margen = $_POST['Margen'];
            $Flete = $_POST['Flete'];
            $Utilidad = $_POST['Utilidad'];
            $PrecioUnitario = $_POST['PrecioUnitario'];
            $Proveedor = $_POST['Proveedor'];
            $PrecioSinIva = $_POST['SubTotalPart'];
            $PrecioIva = $_POST['TotalPart'];

            $Id = $_POST['IdPartida'];
            $SubTotal = $_POST['SubTotal'];
            $Total= $_POST['Total'];

            date_default_timezone_set('America/Mexico_City');
			$fechag = date("Y-m-d");
			$hora = date("h:i:s", time());


            for($x = 0; $x < $tam; $x++){
                
                $precios = array(
                    'Comentario' => $Comentario[$x],
                    'CostoUS' => $CostoUS[$x],
                    'TipoCambio' => $TipoCambio[$x],
                    'CostoMN' => $CostoMX[$x],
                    'Margen' => $Margen[$x],
                    'Flete' => $Flete[$x],
                    'Utilidad' => $Utilidad[$x],
                    'PrecioUnitario' => $PrecioUnitario[$x],
                    'PrecioSinIva' => $PrecioSinIva[$x],
                    'PrecioIva' => $PrecioIva[$x],
                    'Proveedor' => $Proveedor[$x],
                );
                
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

            
            if($ingresacot){
                $this->VerCotizacion($IdCot);
            }
        }
    }

    //Muestra la cotización en PDF
    public function VerCotizacion($Id){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
                //$this->load->view('cotizaciones/pdf');

                $cotizacion = $this->ModCotizaciones->conCotizacion($Id);
                $partidas = $this->ModCotizaciones->conPartidas($Id);
                
                foreach($cotizacion as $cot){
                    $IdOrden = $cot->Orden;
                    $Fecha = $cot->Fecha;
                }

                $formatofecha = strtotime($Fecha);
                $Anio = date("Y", $formatofecha);
				$Mes = date("m", $formatofecha);
				$Dia = date("d", $formatofecha);
				$FechaFormateada = $Dia.'/'.$Mes.'/'.$Anio;

                $orden = $this->ModOrdenes->buscarordenCliente($IdOrden);
                if($orden == null){
                    $orden = $this->ModOrdenes->buscarordenEmpresa($IdOrden);
                    if($orden != null){
                        $data['orden'] = $orden;
                        $data['partidas'] = $partidas;
                        $data['cotizacion'] = $cotizacion;
                        $data['Id'] = $Id;
                        $data['fecha'] = $FechaFormateada;

                        require_once('././public/vendor/autoload.php');
                        $css = file_get_contents('././public/dist/css/pdfcot.css');
                
                        $mpdf = new \Mpdf\Mpdf([
                            'mode' => 'utf-8',
                            'format' => 'A4',
                            'setAutoTopMargin' => 'stretch',
                            'autoMarginPadding' => 67
                        ]);
                    
                        $html = $this->load->view('cotizaciones/cotizacion',$data,true);
                
                        //echo $html;
                        //exit;
                        $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
                        $mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);

                        $mpdf->Output();
                    }else{
                        echo '<scritp> alert("No se encontraron resultados"); </script>';
					    redirect('Ordenes/consultar','refresh');
                    }
                }else{
                    $data['orden'] = $orden;
                    $data['partidas'] = $partidas;
                    $data['cotizacion'] = $cotizacion;
                    $data['Id'] = $Id;
                    $data['fecha'] = $FechaFormateada;

                    require_once('././public/vendor/autoload.php');
                    $css = file_get_contents('././public/dist/css/pdfcot.css');
                    $mpdf = new \Mpdf\Mpdf([
                        'mode' => 'utf-8',
                        'format' => 'A4',
                        'setAutoTopMargin' => 'stretch',
                        'autoMarginPadding' => 67
                    ]);
                    $html = $this->load->view('cotizaciones/cotizacion',$data,true);
                    //echo $html;
                    //exit;
                    $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);
                    $mpdf->Output();
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

    //Consultar cotizaciones realizadas dentro de un rango de fechas
    public function reporte(){
        if($this->session->userdata('is_logued_in') == FALSE){
            redirect('login', 'refresh');
        }else{
            $datos = $this->input->post();

            if(isset($datos)){
                if(isset($datos['cmbIng'])){
                    $Asignado = $datos['cmbIng'];
                }

                $Estatus = $datos['cmbEstatus'];

                if(isset($Asignado)){
                    if($Asignado == "0"){
                        if($Estatus == 'Realizada'){
                            $FechaInicio = $datos['dtInicio'];
                            $FechaFin = $datos['dtFin'];

                            $realizadas = $this->ModCotizaciones->realizadas($FechaInicio, $FechaFin);

                            $data['contenido'] = 'cotizaciones/admin/index';
                            $data['ing'] = $this->ModUsuarios->listausuarios();
                            $data['cotreal'] = $realizadas;
                            $data['perfil'] = $this->session->userdata('Perfil');

                            $this->load->view('plantilla', $data);

                        }else{
                            $solicitud = $this->ModCotizaciones->consolicitud();
                            
                            $data['contenido'] = 'cotizaciones/admin/index';
                            $data['ing'] = $this->ModUsuarios->listausuarios();
                            $data['cotpend'] = $solicitud;
                            $data['perfil'] = $this->session->userdata('Perfil');

                            $this->load->view('plantilla', $data);
                        }
                    }else{
                        if($Estatus == "Realizada"){
                            $FechaInicio = $datos['dtInicio'];
                            $FechaFin = $datos['dtFin'];
    
                            $realizadas = $this->ModCotizaciones->realizadasIng($Asignado, $FechaInicio, $FechaFin);
                            
                            $data['contenido'] = 'cotizaciones/admin/index';
                            $data['ing'] = $this->ModUsuarios->listausuarios();
                            $data['cotreal'] = $realizadas;
                            $data['perfil'] = $this->session->userdata('Perfil');

                            $this->load->view('plantilla', $data);
    
                        }else{
                            $solicitud = $this->ModCotizaciones->consolicitudIng($Asignado);
                            
                            $data['contenido'] = 'cotizaciones/admin/index';
                            $data['cotpend'] = $solicitud;
                            $data['ing'] = $this->ModUsuarios->listausuarios();
                            $data['perfil'] = $this->session->userdata('Perfil');
    
                            $this->load->view('plantilla', $data); 
                        }
                    }
                }else{
                    $Asignado = $this->session->userdata('Iniciales');
                    if($Estatus == "Realizada"){
                        $FechaInicio = $datos['dtInicio'];
                        $FechaFin = $datos['dtFin'];

                        $realizadas = $this->ModCotizaciones->realizadasIng($Asignado, $FechaInicio, $FechaFin);
                        $data['contenido'] = 'cotizaciones/tecnico/consultar';
                        $data['cotizacionReal'] = $realizadas;
                        $data['ing'] = $this->ModUsuarios->listausuarios();
                        $data['perfil'] = $this->session->userdata('Perfil');

                        $this->load->view('plantilla', $data);

                    }else{
                        $solicitud = $this->ModCotizaciones->consolicitudIng($Asignado);
                        
                        $data['contenido'] = 'cotizaciones/tecnico/consultar';
                        $data['cotizacionPend'] = $solicitud;
                        $data['ing'] = $this->ModUsuarios->listausuarios();
                        $data['perfil'] = $this->session->userdata('Perfil');

                        $this->load->view('plantilla', $data); 
                    }
                }
            }
        }
    }
}
