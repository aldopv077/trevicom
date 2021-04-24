<div class="container box" id="advanced-search-form-1">
  <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Ordenes/index')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
  <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Ordenes/consultar')?>" class="btn btn-outline-primary float-light">Consultar</a>
  </div>

<div class="container box" id="advanced-search-form">
        <div class="table-responsive">          
          <div class="form-row">
            <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
            <div class="form-group col-md-4">
              <label for="inputorden">No. de orden</label>
              <input type="text" class="form-control" id="orden" name="" placeholder="Numero de orden">
            </div>
            <div class="form-group col-md-4">
              <label for="inputCantidad">Cantidad</label>
              <input type="text" class="form-control" id="Cantidad" name="Cantidad" placeholder="Cantidad">
            </div>
            <div class="form-group col-md-4">
              <label for="inputDescripcion">Descripcion</label>
              <input type="password" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion">
            </div>
            <div class="form-group col-md-4">
              <label for="inputCosto">Costo</label>
              <input type="password" class="form-control" id="Costo" name="Costo" placeholder="Costo">
            </div>
          </div>
          <div class="form-group col-md-8">
            <button name="Enviar" Id="Enviar" type="submit" class="btn btn-success">Agregar</button>
          </div>              
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th>
                  <center>Cantidad</center>
                </th>
                <th>
                  <center>Descripcion</center>
                </th>
                <th>
                  <center>Costo</center>
                </th>
                <th>
                  <center>Precio sin IVA</center>
                </th>
                <th>
                  <center>IVA</center>
                </th>
                <th>
                  <center>Precio con IVA</center>
                </th>
                <th>
                  <center></center>
                </th>
              </tr>
            </thead>
          
          
            <tbody>
              <tr>
                <td>
                  <center>
                    2
                  </center>
                </td>
                <td>
                  <center>
                  muy bien
                  </center>
                </td>
                <td>
                  <center>
                    $60
                  </center>
                </td>
                <td>
                  <center>
                    $58
                  </center>
                </td>
                <td>
                  <center>
                    .16%
                  </center>
                </td>
                <td>
                  <center>
                    $64
                  </center>
                </td>
                <td>
                  <center>
                    <div class="btn-group" role="group" aria-label="Third group">
                      <button type="button" class="btn btn-outline-danger">Eliminar</button>
                    </div>
                </center>
                </td>
              </tr>
          
              <tr>
                <td>
                  <center>
                    2
                  </center>
                </td>
                <td>
                  <center>
                    muy bien
                  </center>
                </td>
                <td>
                  <center>
                    $60
                  </center>
                </td>
                <td>
                  <center>
                    $58
                  </center>
                </td>
                <td>
                  <center>
                    .16%
                  </center>
                </td>
                <td>
                  <center>
                    $64
                  </center>
                </td>
                <td>
                  <center>
                    <div class="btn-group" role="group" aria-label="Third group">
                      <button type="button" class="btn btn-outline-danger">Eliminar</button>
                    </div>
                  </center>
                </td>
              </tr>          
            </tbody>
          </table>
    </div>
    <br>
    <div class="container box">
      <button type="button" class="btn btn-danger float-right">Cancelar</button>
    </div>
    <br>