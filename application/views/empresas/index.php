
  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Empresas/registrar')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Empresas/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>

<div class="container box" id="advanced-search-form">
  <h1 align="center">Empresa</h1>
  <div class="table-responsive">
    <table>
      <nav class="navbar navbar-light bg-light">
        <form class="form-inline" name="FrmBuscarEmpresa" id="FrmBuscarEmpresa" action="<?php echo base_url('Empresas/busqueda')?>" method="post">
          <div class="input-group">
                  <input name="txtCliente" Id="txtCliente" type="search" class="form-control col-md-8" list="clientes" placeholder="Empresa">
                  <datalist id="clientes">
                      <?php
                        if(isset($lista)){
                          foreach ($lista as $key) {
                            print '<option value="'.$key->IdEmpresa .' '. $key->Nombre.'"></option>';
                          }
                        }else{
                          foreach ($empresas as $key) {
                            print '<option value="'.$key->IdEmpresa .' '. $key->Nombre.'"></option>';
                          }
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
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead class="thead-light">
        <tr>
          <th><center>Empresa</center></th>
          <th><center>Dirección</center></th>
          <th><center>Télefono</center></th>
          <th><center>Contacto</center></th>
          <th><center>Teléfono de Contacto</center></th>
          <th><center>Correo de Contacto</center></th>
          <th colspan="3"><center>Acciones</center></th>
        </tr>
      </thead>


      <tbody>
        <?php foreach($empresas as $value){ ?>
        <tr>
          <td><center><?php echo $value->Nombre?></center></td>
          <td><center><?php echo $value->Direccion?></center></td>
          <td><center><?php echo $value->Telefono?></center></td>
          <td><center><?php echo $value->NombreCont.' '.$value->PaternoCont.' '.$value->MaternoCont?></center></td>
          <td><center><?php echo $value->TelefonoCont?></center></td>
          <td><center><?php echo $value->CorreoCont?></center></td>
          <td>
            <center>
              <div class="btn-group" role="group" aria-label="Third group">
                <a href="<?php echo base_url('Contactos/registrar/').$value->Id?>" class="btn btn-outline-primary">nuevo contacto</a>
               </div>
             </center>
          </td>
          <td>
            <center>
              <div class="btn-group" role="group" aria-label="Third group">
                <a href="<?php echo base_url('Empresas/editar/').$value->Id?>" class="btn btn-outline-primary">editar</a>
              </div>
            </center>
          </td>
          <td>
            <center>
              <div class="btn-group" role="group" aria-label="Third group">
                <a onclick="if(confirma() === false) return false" href="<?php echo base_url('Empresas/eliminar/').$value->Id?>" class="btn btn-outline-danger">Eliminar</a>
              </div>
          </td>
          </center>
          </td>
        </tr>
        <?php }?>

      </tbody>
    </table>

  </div>
</body>
</html>