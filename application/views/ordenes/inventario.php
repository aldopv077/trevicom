<div class="container box" id="advanced-search-form">
        <div class="table-responsive">          
          <div class="form-row">
            <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
            <div class="form-group col-md-4">
              <label for="inputorden">Nombre de supervisor</label>
              <input type="text" class="form-control" id="orden" name="" placeholder="Numero de orden">
            </div>
            <div class="form-group col-md-4">
              <label for="inputequipo">Jefe de departamento</label>
              <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Nombre de Jefe de departamento">
            </div>
            <div class="form-group col-md-4">
              <label for="inputMarca">Fecha inicio</label>
              <input type="date" class="form-control" id="inicio" name="inicio" placeholder="Fecha inicio">
            </div>
            <div class="form-group col-md-4">
              <label for="inputModelo">Fecha fin</label>
              <input type="date" class="form-control" id="fin" name="fin" placeholder="Fecha fin">
            </div>
          </div>
          <div class="form-group col-md-8">
            <button name="Enviar" Id="Enviar" type="submit" class="btn btn-success">Generar Inventario</button>
          </div>              
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th>
                  <center>No. de orden</center>
                </th>
                <th>
                  <center>Tipo de equipo</center>
                </th>
                <th>
                  <center>Marca</center>
                </th>
                <th>
                  <center>Modelo</center>
                </th>
                <th>
                  <center>No. de serie</center>
                </th>
                <th>
                  <center>Lugar de servicio</center>
                </th>
                <th>
                  <center>Inventario</center>
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
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Respuesta">
                      <label class="custom-control-label" for="Respuesta"></label>
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
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Garantia">
                    <label class="custom-control-label" for="Garantia"></label>
                  </div>
                  </center>
                </td>
              </tr>          
            </tbody>
          </table>
    </div>
    <br>
    <div class="container box">
      <button type="button" class="btn btn-success float-right">Guardar Inventario</button>
    </div>
    <br>