<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Trevicom </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/jqvmap/jqvmap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('public/dist/css/adminlte.min.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/daterangepicker/daterangepicker.css')?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/summernote/summernote-bs4.min.css')?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/dist/css/registro.css')?>">

    <script>
        function confirma() {
            if (confirm("¿Realmente desea eliminarlo?")) {
                alert("El registro ha sido eliminado");
            } else {
               return false;
            }
        }
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?php $perfil = $perfil?>
    <div id="app">
        <div class="wrapper">
            <!-- Navbar cambiar de color con nav-indigo nav-dark -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">

                    <li>
                        <div>
                            <a class="dropdown-item" href="<?php echo base_url('Login/cerrar_sesion')?>">

                                    <i class="nav-icon fas fa-power-off"></i>
                         </a>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- navbar-indigo para cambiar el color de menu -->
                <a href="" class="brand-link navbar-black">
                    <img src="<?php echo base_url('public/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">System Treviño</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar brand-link navbar-navy">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
                            <?php echo $this->session->userdata('Iniciales').'-'. $this->session->userdata('Nombre');?>
                        </div>
                        <div class="info">
                            <a href="auth.login" class="d-block">

                                <a class="nav-link " href=""></a>

                                <form id="logout-form" action="logout" method="POST"
                                    style="display: none;">

                                </form>
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item has-treeview">
                                <a href="<?php echo base_url('Inicio/index')?>" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>
                            <?php 
                                if($perfil == "Administrador"){
                            ?>
                            <li class="nav-item has-treeview">
                                <a href="<?php echo base_url('Usuarios/index')?>" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Usuarios</p>
                                </a>
                            </li>
                            <?php
                                }
                            ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Orden<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Ordenes/index')?>"
                                            class="">
                                            <i class="fas fa-plus-circle"></i>
                                            <p>Nueva Orden</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Reportes/index')?>"
                                            class="">
                                            <i class="far fa-file"></i>
                                            <p>Reportes</p>
                                        </a>
                                    </li>
                                    <?php if($perfil == "Técnico"){?>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('Seguimiento/index')?>"
                                                class="">
                                                <i class="fas fa-external-link-alt"></i>
                                                <p>Seguimiento De Orden</p>
                                            </a>
                                        </li>
                                    <?php }?>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Cotizaciones/index')?>">
                                        <i class="fas fa-money-check-alt"></i>
                                            <p>Cotizaciones</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Inventario/index')?>">
                                        <i class="fas fa-clipboard-check"></i>
                                            <p>Inventario</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>                     
                            <li class="nav-item has-treeview">
                                <a href="<?php echo base_url('Empresas/index')?>" class="nav-link">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>Empresa</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?php echo base_url('Clientes/index')?>" class="nav-link">
                                    <i class="nav-icon fas fa-address-book"></i>
                                    <p>Cliente</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>


            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>

    <section>
            <?php $this->load->view($contenido); //aqui se manda a llamar a la vista correspondiente de cada modulo?>
    </section>

</body>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('public/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/dist/js/adminlte.min.js')?>"></script>
</body>
</html>