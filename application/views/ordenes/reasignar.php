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

        <h1 align="center">Reasignacion</h1>
        <div class="table-responsive">          
          <div class="form-row">
            <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
            <div class="form-group col-md-4">
              <label for="inputNo.Serie">No.Serie</label>
              <input type="text" class="form-control" id="No.Serie" name="No.Serie" placeholder="No.Serie">
            </div>
            <div class="form-group col-md-4">
              <label for="exampleFormControlSelect1">Reasignar A:</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Antonio</option>
                <option>Ana</option>
                <option>Aldo</option>
                <option>Gabi</option>
                <option>Pablo</option>
              </select>
            </div>
          </div>
          <table><nav class="navbar navbar-light bg-light">
            <form class="form-inline">
              <input class="form-control col-md-8" type="search" placeholder="" aria-label="Usuario">
              <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
            </form>
          </nav></table>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th>
                  <center>Cliente</center>
                </th>
                <th>
                  <center>Tipo de equipo</center>
                </th>
                <th>
                  <center>Marca</center>
                </th>
                <th>
                  <center>No.serie</center>
                </th>
                <th>
                  <center>Falla</center>
                </th>
              </tr>
            </thead>
            

        <tbody>
          <tr>
            <td>
              <center>
                Alberto
              </center>
            </td>
            <td>
              <center>
                PC
              </center>
            </td>
            <td>
              <center>
                soni
              </center>
            </td>
            <td>
              <center>
                2282515305
              </center>
            </td>
            <td>
              <center>
                no prende
              </center>
            </td>
          </tr>

          <tr>
            <td>
              <center>
                Alberto
              </center>
            </td>
            <td>
              <center>
                PC
              </center>
            </td>
            <td>
              <center>
                soni
              </center>
            </td>
            <td>
              <center>
                2282515305
              </center>
            </td>
            <td>
              <center>
                no prende
              </center>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <br>
    <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success">Reasignar</button>