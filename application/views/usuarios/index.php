

  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Usuarios/registrar')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Usuarios/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>


 <div class="container box" id="advanced-search-form">

        <h1 align="center">Usuarios</h1>
        <div class="table-responsive">
          <table><nav class="navbar navbar-light bg-light">
            <form class="form-inline">
              <input class="form-control col-md-8" type="search" placeholder="Usuario" aria-label="Usuario">
              <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
            </form>
          </nav></table>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th>
                  <center>Nombre</center>
                </th>
                <th>
                  <center>Iniciales</center>
                </th>
                <th>
                  <center>Correo</center>
                </th>
                <th>
                  <center>Telefono</center>
                </th>
                <th>
                  <center></center>
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
                Alberto
              </center>
            </td>
            <td>
              <center>
                APV
              </center>
            </td>
            <td>
              <center>
                16610696@utgz.edu.mx
              </center>
            </td>
            <td>
              <center>
                2282515305
              </center>
            </td>
            <td>
              <center>
                <div class="btn-group" role="group" aria-label="Third group">
                  <a href="<?php echo base_url('Usuarios/editar')?>" type="button" class="btn btn-outline-primary">editar</a>
                </div>
              </center>
            </td>
            <td>
              <center>
                <div class="btn-group" role="group" aria-label="Third group">
                  <a href="#" type="button" class="btn btn-outline-danger">Eliminar</a>
                </div>
                </td>
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
                APV
              </center>
            </td>
            <td>
              <center>
                16610696@utgz.edu.mx
              </center>
            </td>
            <td>
              <center>
                2282515305
              </center>
            </td>
            <td>
              <center>
                <div class="btn-group" role="group" aria-label="Third group">
                  <a href="<?php echo base_url('Usuarios/editar')?>" type="button" class="btn btn-outline-primary">editar</a>
                </div>
              </center>
            </td>
            <td>
              <center>
                <div class="btn-group" role="group" aria-label="Third group">
                  <a href="#" type="button" class="btn btn-outline-danger">Eliminar</a>
                </div>
            </td>
            </center>
            </td>
          </tr>

        </tbody>
      </table>

    </div>