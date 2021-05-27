<div class="container box" id="advanced-search-form-1">
  <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Cotizaciones/index')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
  <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Cotizaciones/consultar')?>" class="btn btn-outline-primary float-light">Consultar</a>
  </div>

<div class="container box" id="advanced-search-form">
  <form Id="FrmRegistarCot" name="FrmRegistrarCot" action="<?php echo base_url('Cotizaciones/solicitud')?>" method="post">
        <div class="table-responsive">          
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="Orden">No. de orden</label>
              <input type="text" class="form-control" id="Orden" name="Orden" placeholder="Numero de orden" required>
            </div>
            <div class="form-group col-md-4">
              <label for="Cantidad">Cantidad</label>
              <input type="text" class="form-control" id="Cantidad" name="Cantidad" placeholder="Cantidad" required>
            </div>
            <div class="form-group col-md-4">
              <label for="Descripcion">Descripcion</label>
              <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" required>
            </div>
          </div>
          <div class="form-group col-md-8">
            <button name="Enviar" Id="Enviar" type="submit" class="btn btn-success">Agregar</button>
          </div>              
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th><center>No.</center></th>
                <th><center>Cantidad</center></th>
                <th><center>Descripcion</center></th>
                <th><center>Acciones</center></th>
              </tr>
            </thead>
          
          
            <tbody>

            </tbody>
          </table>
    </div>
    <br>
    <div class="container box">
      <button type="button" class="btn btn-danger float-right">Cancelar</button>
    </div>
    <br>
  </form>
</div>