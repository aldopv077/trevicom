<div class="container box col-md-12" id="advanced-search-form"> 
      <table>
        <nav class="navbar navbar-light bg-light">
          <form class="form-inline" name="FrmBuscarOrden" Id="FrmBuscarOrden" action="<?php echo base_url('Seguimiento/buscaorden')?>" method="post">
            <input class="form-control col-md-8" type="search" Id="IdOrden" name="IdOrden"placeholder="Numero De Orden" aria-label="No. De Orden" required>
            <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
          </form>
        </nav>
      </table>
    <div class="container box col-md-12" id="advanced-search-form">
      <h1 align="center">Datos de orden</h1>
      <div class="form-row">
        <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
        <div class="form-group col-md-4">
          <label>Nombre: </label>
          <label>-----</label>
        </div>
        <div class="form-group col-md-4">
              <label>No. Serie</label>
              <label>-----</label>
            </div>
            <div class="form-group col-md-4">
              <label>Marca</label>
              <label>-----</label>
            </div>
            <div class="form-group col-md-4">
              <label>Modelo</label>
              <label>-----</label>
            </div>
            <div class="form-group col-md-4">
              <label>Color</label>
              <label>-----</label>
            </div>
            <div class="form-group col-md-4">
              <label>Estatus</label>
              <label>-----</label>
            </div>
          </div>
        </div>
        <br>
        <form>
        <div class="form-group col-md-4">
          <label for="cmbTComentario">Tipo de comentario</label>
          <select class="form-control" id="cmbTComentario" name="cmbTComentario">
            <option value="0" selected>Seleccione una opción</option>
            <option value="Información interna" >Información interna</option>
            <option value="Mostrar al cliente">Mostrar al cliente</option>
          </select>
        </div>
        <div class="form-group col-md-8">
          <label for="inputNo.Serie"></label>
          <input type="" class="form-control" id="comentario" name="comentario" placeholder="Comentario">
        </div>
        <br> 
        <div class="form-row">
          <div class="container"></div>
          <div class="form-group col-md-4">
            <label for="cmbEstatus">Estatus del equipo:</label>
            <select class="form-control" id="cmbEstatus" name="cmbEstatus">
              <option value="0" selected> Seleccione una opción</option>
              <option value="1"> En reparación </option>
              <option value="2"> En espera de piezas </option>
              <option value="3"> Listo para entrega </option>
              <option value="4"> Terminado sin reparar </option>
            </select>
          </div>
        </div>
        <button name="Agregar" Id="Agregar" type="submit" onclick="return Seguimiento();" class="btn btn-success col-md-2">Agregar</button>
        </form>
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>
                <center>Tipo de información</center>
              </th>
              <th>
                <center>Comentario</center>
              </th>
              <th>
                <center>Fecha</center>
              </th>
              <th>
                <center>Hora</center>
              </th>
              <th>
                <center>Usuario</center>
              </th>
            </tr>
          </thead>
        
        
          <tbody>
          </tbody>
        
        </table>
      </form>
    </div>

    <script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>