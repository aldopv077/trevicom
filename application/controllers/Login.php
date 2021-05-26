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
            $contador = 0;

            $datosusuario = $this->ModLogin->login($Usuario, $Pass);
            if($datosusuario != null){
                foreach($datosusuario as $value){
                    if(password_verify($Pass, $value->Pass)){
                        $contador++;
                    }
                }

                if($contador == 1){
                    //Se crea la sesión
                    foreach($datosusuario as $usuario){
                        //Verifica si el usuario se encuetra activo
                        if(password_verify($Pass, $usuario->Pass)){
                            if($usuario->Activo == 1){  
                                $datos = array(
                                    'is_logued_in' =>       TRUE,
                                    'Id'           =>       $usuario->IdEmpleado,
                                    'Nombre'       =>       $usuario->Nombre.' '.$usuario->Paterno,
                                    'Iniciales'	   =>		$usuario->Iniciales,
                                    'Perfil'       =>       $usuario->Puesto,
                                );
                            }else{   
                                echo '<script> alert("Usuario y contraseña incorrectas"); </script>';
                                redirect('Login/index', 'refresh');
                            }
                        }                    
                    }

                    $this->session->set_userdata($datos);
                    redirect('Inicio/index');
                }
                else if($contador > 1){
                    echo '<script> alert("Solicitar cambio de contraseña"); </script>';
                    redirect('Login/index', 'refresh');
                }
            }else{
                echo '<script> alert("Usuario o contraseña incorrectos"); </script>';
                    redirect('Login/index', 'refresh');
            }
        }
    }

    public function cerrar_sesion(){
        $this->session->sess_destroy();//se cierra la sesión
        redirect('Login/index','refresh');
    }
}
