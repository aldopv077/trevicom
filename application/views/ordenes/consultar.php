  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Ordenes/index')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Ordenes/consultar')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>


 <div class="container box" id="advanced-search-form">

        <h1 align="center">Consultar</h1>
        <div class="table-responsive">
          <div class="form-group col-md-4">
            <label for="exampleFormControlSelect1">Buscar por:</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>Nombre</option>
              <option>Telefono</option>
              <option>No.Serie</option>
              <option>Empresa</option>
              <option>No.Orden</option>
            </select>
          </div>
          <table><nav class="navbar navbar-light bg-light">
            <form class="form-inline">
              <input class="form-control col-md-8" type="search" placeholder="" aria-label="Usuario">
              <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
            </form>
          </nav></table>
         
           <div class="container box col-md-12" id="advanced-search-form">
              <h1 align="center">Datos de orden</h1>
            <div class="form-row">
              <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
              <div class="form-group col-md-4">
                <label for="inputNombre"></label>
                <input type="Nombre" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
              </div>
              <div class="form-group col-md-4">
                <label for="inputserie"></label>
                <input type="" class="form-control" id="serie" name="serie" placeholder="Numero de serie">
              </div>
              <div class="form-group col-md-4">
                <label for="inputMarca"></label>
                <input type="Marca" class="form-control" id="Marca" name="Marca" placeholder="Marca">
              </div>
              <div class="form-group col-md-4">
                <label for="inputModelo"></label>
                <input type="" class="form-control" id="Modelo" name="Modelo" placeholder="Modelo">
              </div>
              <div class="form-group col-md-4">
                <label for="inputColor"></label>
                <input type="" class="form-control" id="Color" name="Color" placeholder="Color">
            </div>
            <div class="form-group col-md-4">
              <label for="inputEstatus"></label>
              <input type="" class="form-control" id="Estatus" name="Estatus" placeholder="Estatus">
          </div>
          <br>
          
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <h1 align="center">Comentarios</h1>
              <tr>
                <th>
                  <center>Tipo de comentario</center>
                </th>
                <th>
                  <center>comentario</center>
                </th>
                <th>
                  <center>Usuario</center>
                </th>
                <th>
                  <center>Fecha</center>
                </th>
                <th>
                  <center>Hora</center>
                </th>
              </tr>
            </thead>
            

        <tbody>
          <tr>
            <td>
              <center>
                informacion interna
              </center>
            </td>
            <td>
              <center>
                no sirve se chingo
              </center>
            </td>
            <td>
              <center>
                yo mero
              </center>
            </td>
            <td>
              <center>
                18/04/21
              </center>
            </td>
            <td>
              <center>
                5:30pm
              </center>
            </td>
          </tr>

          <tr>
            <td>
              <center>
                informacion interna
              </center>
            </td>
            <td>
              <center>
                no sirve se chingo
              </center>
            </td>
            <td>
              <center>
                yo mero
              </center>
            </td>
            <td>
              <center>
                18/04/21
              </center>
            </td>
            <td>
              <center>
                5:30pm
              </center>
            </td>
          </tr>
        </tbody>
        
      </table>
      <a href="<?php echo base_url('Seguimiento/index')?>" name="Ingresar" Id="Ingresar" class="btn btn-danger">Agregar comentario</a>
      <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success">Entregar Equipo</button>
    </div>
</body>
</html>