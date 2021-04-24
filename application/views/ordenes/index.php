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
  


 <div class="container box col-md-12" id="advanced-search-form"> 
  <form name="FrmRegistro" Id="FrmRegistro" method="post" action="">
        <div class="container">
          <div class="custom-control custom-radio custom-control-inline ">
            <label>Tipo de cliente</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="Empresa" name="1" class="custom-control-input">
            <label class="custom-control-label" for="Empresa">Empresa</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="Particular" name="1" class="custom-control-input">
            <label class="custom-control-label" for="Particular">Particular</label>
          </div>
          <div  class="btn-group" role="group" aria-label="Third group">
            <a href="<?php echo base_url('Clientes/registrar')?>" name="Ingresar" Id="Ingresar" class="btn btn-success">Nuevo Cliente</a>            
          </div>
        </div>
        </form>
        <div class="container box col-md-12" id="advanced-search-form">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="Telefono" name="2" class="custom-control-input">
            <label class="custom-control-label" for="Telefono">Telefono</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="nombrecliente" name="2" class="custom-control-input">
            <label class="custom-control-label" for="nombrecliente">Nombre de cliente</label>
          </div>
          <table>
            <nav class="navbar navbar-light bg-light">
              <form class="form-inline">
                <input class="form-control col-md-8" type="search" placeholder="Nombre de cliente" aria-label="Nombre de cliente">
                <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
                <div class="btn-group" role="group" aria-label="Third group">
                  <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-primary">Editar Cliente</button>
                </div>
              </form>
            </nav>
          </table>
          <div class="form-group col-md-4">
            <label for="exampleFormControlSelect1">contacto</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>Antonio</option>
              <option>Ana</option>
              <option>Aldo</option>
              <option>Gabi</option>
              <option>Pablo</option>
            </select>
          </div>
        </div>
        <br>
        <form name="FrmRegistro" Id="FrmRegistro" method="post" action="">
           <div class="form-row">
                <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
                <div class="form-group col-md-4">
                  <label for="exampleFormControlSelect1">Tipo de equipo</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Lapto</option>
                    <option>PC</option>
                    <option>Impresora</option>
                    <option>Monitor</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNo.Serie">No.Serie</label>
                  <input type="" class="form-control" id="No.Serie" name="No.Serie" placeholder="No.Serie">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNo.Serie">No.de producto</label>
                  <input type="" class="form-control" id="Producto" name="Producto" placeholder="No.Producto">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputParterno">Marca</label>
                  <input type="text" class="form-control" id="Marca" name="Marca" placeholder="Marca">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputMaterno">Modelo</label>
                  <input type="Nombre" class="form-control" id="Modelo" name="Modelo" placeholder="Modelo">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputMaterno">Color</label>
                  <input type="Nombre" class="form-control" id="Color" name="Color" placeholder="Color de equipo">
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleFormControlSelect1">Asignar A:</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Antonio</option>
                    <option>Ana</option>
                    <option>Aldo</option>
                    <option>Gabi</option>
                    <option>Pablo</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
                
                <div class="form-group col-md-12">
                  <label for="inputFalla">Falla</label>
                  <input type="text" class="form-control" id="Falla" name="Falla" placeholder="Descripcion completa">
                </div>
                <div class="form-group col-md-12">
                  <label for="inputAccesorios">Accesorios</label>
                  <input type="text" class="form-control" id="Telefono" name="Accesorios" placeholder="Accesorios">
                </div>
                <div class="form-group col-md-12">
                  <label for="inputObservacion">Observacion</label>
                  <input type="text" class="form-control" id="Observacion" name="Observacion" placeholder="Observacion">
                </div>
                <div class="form-group col-md-12">
                  <label for="inputContraseña">Contraseña</label>
                  <input type="text" class="form-control" id="Contraseña" name="Contraseña" placeholder="Contraseña del equipo">
                </div>
                  <div class="container">
                    <div class="custom-control custom-radio custom-control-inline ">
                      <label>Lugar de Revision</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="taller" name="3" class="custom-control-input">
                      <label class="custom-control-label" for="taller">En taller</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="Domicilio" name="3" class="custom-control-input">
                      <label class="custom-control-label" for="Domicilio">A Domicilio</label>
                    </div>
                  </div>
                </form>
                <div class="container box col-md-12">
                  <div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Urgente">
                      <label class="custom-control-label" for="Urgente">Urgente</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Garantia">
                      <label class="custom-control-label" for="Garantia">Garantia</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Respaldo">
                      <label class="custom-control-label" for="Respaldo">Respaldo de informacion</label>
                    </div>
                  </div>
                </div>
                <br>               
              </div>  
              <br>            
              <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success">Guardar</button>
            </div>
            <br>                                       
        </form>
    </div>