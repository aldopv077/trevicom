

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
            <?php foreach($empleados as $value){?>
              <tr>
            <td><center><?php echo $value->Nombre.' '. $value->Paterno?></center></td>
            <td><center><?php echo $value->Iniciales?></center></td>
            <td><center><?php echo $value->Correo?></center></td>
            <td><center><?php echo $value->Telefono?></center></td>
            <td>
              <center>
                <div class="btn-group" role="group" aria-label="Third group">
                  <a href="<?php echo base_url('Usuarios/editar/').$value->IdEmpleado?> " type="button" class="btn btn-outline-primary">editar</a>
                </div>
              </center>
            </td>
            <td>
              <center>
                <div class="btn-group" role="group" aria-label="Third group">
                  <a onclick="if(confirma() === false) return false" href="<?php echo base_url('Usuarios/Eliminar/').$value->IdEmpleado;?>" type="button" class="btn btn-outline-danger">Eliminar</a>
                </div>
            </td>
            </center>
            </td>
          </tr>
            <?php }?>
        </tbody>
      </table>

    </div>