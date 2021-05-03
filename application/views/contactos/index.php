  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Contactos/registrar/').$IdEmpresa?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Contactos/index/').$IdEmpresa?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>
  <div class="container box" id="advanced-search-form">
  
    <h1 align="center">Contactos de la empresa: <?php echo $Empresa?></h1>
    <div class="table-responsive">
      <table>
        <nav class="navbar navbar-light bg-light">
          <form class="form-inline" name="FrmBuscarContaco" id="FrmBuscarContato" action="<?php echo base_url('Contactos/busqueda')?>" method="Post">
            <input class="form-control col-md-8" type="search" placeholder="Contacto" aria-label="Contacto" name="Contacto">
            <input type="hidden" name="IdEmpresa" id="IdEmpresa" value="<?php echo $IdEmpresa?>">
            <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
          </form>
        </nav>
      </table>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-light">
          <tr>
            <th><center>Nombre</center></th>
            <th><center>Teléfono</center></th>
            <th><center>Correo</center></th>
            <th><center>Departamento</center></th>
            <th colspan="2"><center>Acciones</center></th>
          </tr>
        </thead>
  
  
        <tbody>
          <tr>
            <?php foreach($contactos as $cont){?>

              <td><center><?php echo $cont->Nombre.' '.$cont->Paterno.' '.$cont->Materno?></center></td>
              <td><center><?php echo $cont->Telefono?></center></td>
              <td><center><?php echo $cont->Correo?></center></td>
              <td><center><?php echo $cont->Departamento?></center></td>
              <td>
                <center>
                  <div class="btn-group" role="group" aria-label="Third group">
                    <a href="<?php echo base_url('Contactos/editar/').$cont->IdContacto?>" class="btn btn-outline-primary">editar</a>
                  </div>
                </center>
              <td>
                <center>
                  <div class="btn-group" role="group" aria-label="Third group">
                    <a href="<?php echo base_url('Contactos/eliminar/').$cont->IdContacto?>" class="btn btn-outline-danger">Eliminar</a>
                  </div>
              </center>
              </td>
          </tr>            
          <?php }?>
        </tbody>
      </table>
  
    </div>