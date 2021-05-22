<?php 
    foreach($empresas as $empresa){
?>
<div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
        <a href="<?php echo base_url('Empresas/registrar')?>" class="btn btn-outline-success float-right">Registrar</a>
    </div>
    <div class="btn-group" role="group" aria-label="Third group">
        <a href="<?php echo base_url('Empresas/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
</div>
<div class="container box col-md-12" id="advanced-search-form">
    
    <table>
        <nav class="navbar navbar-light bg-light">
        <form class="form-inline" name="FrmBuscarEmpresa" id="FrmBuscarEmpresa" action="<?php echo base_url('Empresas/busqueda')?>" method="post">
          <div class="input-group">
                  <input name="txtCliente" Id="txtCliente" type="search" class="form-control col-md-8" list="clientes" placeholder="Empresa">
                  <datalist id="clientes">
                      <?php
                          foreach ($lista as $key) {
                            print '<option value="'.$key->Id .' '. $key->Nombre.'"></option>';
                          }
                      ?>
                  </datalist>
                  <span class="input-group-btn"></span>
                    <button class="btn btn-outline-success col-md-2">
                      Buscar
                    </button>
                  </span>
              </div>
        </form>
        </nav>
    </table>

    <div class="container box col-md-12" id="advanced-search-form">
    <br>
    <h1 align="center">Datos de la empresa</h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
                <tr>
                    <th>
                        <center>Nombre</center>
                    </th>
                    <th>
                        <center>Dirección</center>
                    </th>
                    <th>
                        <center>Código postal</center>
                    </th>
                    <th>
                        <center>Teléfono</center>
                    </th>
                    <th>
                        <center>Dependencia</center>
                    </th>
                    <th>
                        <center>Macro</center>
                    </th>
                    <th colspan="2">
                        <center>Acciones</center>
                    </th>
                </tr>
            </thead>


            <tbody>
                <tr>
                    <td>
                        <center><?php echo $empresa->Nombre?></center>
                    </td>
                    <td>
                        <center>
                            <?php echo $empresa->Direccion.' #'.$empresa->NoInterior.' Int:'.$empresa->NoInterior.' Col.'.$empresa->Colonia.' Ciudad de '.$empresa->Ciudad?>
                        </center>
                    </td>
                    <td>
                        <center><?php echo $empresa->CodigoPostal?></center>
                    </td>
                    <td>
                        <center><?php echo $empresa->Telefono.' Ext'.$empresa->Extencion?></center>
                    </td>
                    <td>
                        <center><?php echo $empresa->Dependencia?></center>
                    </td>
                    <td>
                        <center><?php echo $empresa->Macro?></center>
                    </td>
                    <td>
                        <center>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <a href="<?php echo base_url('Empresas/editar/').$empresa->IdEmpresa?>"
                                    class="btn btn-outline-primary">editar</a>
                            </div>
                        </center>
                    </td>
                    <td>
                        <center>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <a onclick="if(confirma() === false) return false"
                                    href="<?php echo base_url('Empresas/eliminar/').$empresa->IdEmpresa?>"
                                    class="btn btn-outline-danger">Eliminar</a>
                            </div>
                    </td>
                    </center>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php }?>
    <br>
    <h1 align="center">Contactos de la empresa</h1>
    <br>
    <div class="container box col-md-12" id="advanced-search-form">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
                <tr>
                    <th>
                        <center>Nombre Completo</center>
                    </th>
                    <th>
                        <center>Telefono</center>
                    </th>
                    <th>
                        <center>Correo</center>
                    </th>
                    <th>
                        <center>Departamento</center>
                    </th>
                    <th colspan="2">
                        <center>Acciones</center>
                    </th>
                </tr>
            </thead>


            <tbody>
                <?php foreach($contactos as $cont){?>
                <tr>
                    <td>
                        <center><?php echo $cont->Nombre.' '.$cont->Paterno.' '.$cont->Materno?></center>
                    </td>
                    <td>
                        <center><?php echo $cont->Telefono?></center>
                    </td>
                    <td>
                        <center><?php echo $cont->Correo?></center>
                    </td>
                    <td>
                        <center><?php echo $cont->Departamento?></center>
                    </td>
                    <td>
                        <center>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <a href="<?php echo base_url('Contactos/editar/').$cont->IdContacto?>"
                                    class="btn btn-outline-primary">editar</a>
                            </div>
                        </center>
                    <td>
                        <center>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <a href="<?php echo base_url('Contactos/eliminar/').$cont->IdContacto?>"
                                    class="btn btn-outline-danger">Eliminar</a>
                            </div>
                        </center>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>