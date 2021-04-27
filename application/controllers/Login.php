<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("ModLogin");
    }

    public function index(){
        $this->load->view('login');
    }

    //Inicio de sesión
    public function IniciaSesion(){
        $datos = $this->input->post();

        if(isset($datos)){
            $Usuario = $datos['Usuario'];
            $Pass = $datos['Pass'];

            $datosusuario = $this->ModLogin->login($Usuario, $Pass);

            //print_r($datosusuario);
            //exit;

            if($datosusuario == true){
                $usuario = array(
                    'is_logued_in' =>       TRUE,
                    'Id'           =>       $datosusuario->IdEmpleado,
                    'Iniciales'	   =>		$datosusuario->Iniciales,
                    'Perfil'       =>       $datosusuario->Puesto,
                );
                $this->session->set_userdata($usuario);
                redirect('Ordenes/index');

            }else{
                echo '<script> alert("Usuario o contraseña incorrectos");</script>';
                redirect('Login/index', 'refresh');
            }
        }
    }

    public function cerrar_sesion(){
        $this->session->sess_destroy();//se cierra la sesión
        redirect('Login/index','refresh');
    }
}
