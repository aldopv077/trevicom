
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
        <form class="form-inline">
          <input class="form-control col-md-8" type="search" placeholder="Empresa" aria-label="Empresa">
          <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
        </form>
      </nav>
    </table>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead class="thead-light">
        <tr>
          <th>
            <center>Empresa</center>
          </th>
          <th>
            <center>Direccion</center>
          </th>
          <th>
            <center>Telefono</center>
          </th>
          <th>
            <center>Contacto</center>
          </th>
          <th>
            <center>Correo</center>
          </th>
          <th colspan="3">
            <center>Acciones</center>
          </th>
        </tr>
      </thead>


      <tbody>
        <tr>
          <td>
            <center>
              Trevicon
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
              Contacto
            </center>
          </td>
          <td>
            <center>
              Correo
            </center>
          </td>
          
          <td>
            <center>
              <div class="btn-group" role="group" aria-label="Third group">
                <a href="<?php echo base_url('Contacto/registrar')?>" class="btn btn-outline-primary">nuevo contacto</a>
              </div>
            </center>
          </td>
          <td>
            <center>
              <div class="btn-group" role="group" aria-label="Third group">
                <a href="<?php echo base_url('Empresas/editar')?>" class="btn btn-outline-primary">editar</a>
              </div>
            </center>
          </td>
          <td>
            <center>
              <div class="btn-group" role="group" aria-label="Third group">
                <a href="<?php echo base_url('Empresas/')?>" class="btn btn-outline-danger">Eliminar</a>
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
              Contacto
            </center>
          </td>
          <td>
            <center>
              Correo
            </center>
          </td>
          
          <td>
            <center>
              <div class="btn-group" role="group" aria-label="Third group">
                <a href="<?php echo base_url('Contactos/registrar')?>" class="btn btn-outline-primary">nuevo contacto</a>
              </div>
            </center>
          </td>
          <td>
            <center>
              <div class="btn-group" role="group" aria-label="Third group">
                <a href="<?php echo base_url('Empresas/editar')?>" class="btn btn-outline-primary">editar</a>
              </div>
            </center>
          </td>
          <td>
            <center>
              <div class="btn-group" role="group" aria-label="Third group">
                <a href="<?php echo base_url('Empresas/')?>" class="btn btn-outline-danger">Eliminar</a>
              </div>
          </td>
          </center>
          </td>
        </tr>

      </tbody>
    </table>

  </div>
</body>
</html>