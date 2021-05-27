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
                $data['CotizacionPend'] = $this->ModCotizaciones->conCotizacionPendTec($this->session->userdata('Iniciales'));
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
            $data['contenido'] = "cotizaciones/tecnico/registro";
            $data['perfil'] = $this->session->userdata('Perfil');
            $data['partidas'] = $this->ModCotizaciones->conPartidas($Id);

            $this->load->view('plantilla', $data);
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

                    $data['contenido'] = "cotizaciones/tecnico/registro";
                    $data['perfil'] = $this->session->userdata('Perfil');
                    $data['partidas'] = $this->ModCotizaciones->conPartidas($Id);

                    $this->load->view('plantilla', $data);
                }
                            
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
