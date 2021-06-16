  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Ordenes/index')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Ordenes/consultar')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Ordenes/reasignar')?>" class="btn btn-outline-primary float-light">Reasignar</a>
    </div>
  </div>


 <div class="container box" id="advanced-search-form">
      
        <h1 align="center">Reasignación</h1>
          <div class="form-row">
              <form class="form-inline" Id="FrmBuscarOrden" name="FrmBuscarOrden" action="<?php echo base_url('Ordenes/busquedareasignacion')?>" method="post">
                <label for="IdOrden"> No. De orden:</label><br>
                <input class="form-control col-md-4" type="search" placeholder="Número de orden" id="IdOrden" name="IdOrden" aria-label="Usuario">
                <button class="btn btn-outline-success col-md-4" type="submit">Verificar</button>
              </form>
          </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-light">
                <tr>
                  <th><center>Cliente</center></th>
                  <th><center>Tipo de equipo</center></th>
                  <th><center>Marca</center></th>
                  <th><center>No.serie</center></th>
                  <th><center>Falla</center></th>
                </tr>
              </thead>
          <tbody>
          
          </tbody>
        </table>
    </div>
    <br>
 </div>