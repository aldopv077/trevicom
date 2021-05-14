<div class="container box col-md-12" id="advanced-search-form"> 
  <form name="FrmRegistro" Id="FrmRegistro" method="post" action="">
      <table>
        <nav class="navbar navbar-light bg-light">
          <form class="form-inline">
            <input class="form-control col-md-8" type="search" placeholder="Numero De Orden" aria-label="No. De Orden">
            <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
          </form>
        </nav>
      </table>
        </form>
        <div class="container box col-md-12" id="advanced-search-form">
            <h1 align="center">Datos de la orden</h1>
            <div class="form-row">
              <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
              <div class="form-group col-md-4">
                <label for="inputNombre"></label>
                <input type="Nombre" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre del cliente">
              </div>
              <div class="form-group col-md-4">
                <label for="inputserie"></label>
                <input type="" class="form-control" id="serie" name="serie" placeholder="Marca">
              </div>
              <div class="form-group col-md-4">
                <label for="inputModelo"></label>
                <input type="" class="form-control" id="Modelo" name="Modelo" placeholder="Modelo">
              </div>
              <div class="form-group col-md-4">
                <label for="inputMarca"></label>
                <input type="Falla" class="form-control" id="Falla" name="Marca" placeholder="Falla">
              </div>
              <div class="form-group col-md-4">
                <label for="inputFecha"></label>
                <input type="" class="form-control" id="Fecha" name="Fecha" placeholder="Fecha de ingreso">
              </div>
              <div class="form-group col-md-4">
                <label for="inputEstatus"></label>
                <input type="" class="form-control" id="Estatus" name="Estatus" placeholder="Estatus">
              </div>
            </div>            
        </div>
        <br>
        <div class="form-group col-md-4">
          <label for="exampleFormControlSelect1">Tipo de comentario</label>
          <select class="form-control" id="exampleFormControlSelect1">
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
          <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
          <div class="container"></div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlSelect1">Estatus del equipo:</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option value="0" selected> Seleccione una opción</option>
              <option value="1"> En reparación </option>
              <option value="2"> En espera de piezas </option>
              <option value="3"> Listo para entrega </option>
              <option value="4"> Terminado sin reparar </option>
            </select>
          </div>
        </div>
        <button name="Agregar" Id="Agregar" type="submit" class="btn btn-success col-md-2">Agregar</button>
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
            <tr>
              <td>
                <center>
                  informacion interna
                </center>
              </td>
              <td>
                <center>
                  -----------
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
              <td>
                <center>
                  ------------
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
                  -------------
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
              <td>
                <center>
                  -------------
                </center>
              </td>
            </tr>
          </tbody>
        
        </table>
      </form>
    </div>