
  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Empresas/registrar')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Empresas/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>


 <div class="container box" id="advanced-search-form"> 
  <h1 align="center">Registrar</h1>
        <h1 align="center">Datos de la empresa</h1>
        <br>
        <form name="FrmRegistro" Id="FrmRegistro" method="post" action="">
           <div class="form-row">
                <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
                <div class="form-group col-md-4">
                  <label for="inputNombre">Nombre</label>
                  <input type="Nombre" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputDireccion">Direccion</label>
                  <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direccion completo">
                </div><div class="form-group col-md-4">
                  <label for="inputNo.Exterior">No.Exterior</label>
                  <input type="text" class="form-control" id="No.Exterior" name="No.Exterior" placeholder="No.Exterior">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNo.Interior">No.Interior</label>
                  <input type="text" class="form-control" id="No.Interior" name="No.Interior" placeholder="No.Interior">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputColonia">Colonia</label>
                  <input type="text" class="form-control" id="Colonia" name="Colonia" placeholder="Colonia">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCodigopostal">Codigo Postal</label>
                  <input type="text" class="form-control" id="Codigopostal" name="Codigopostal" placeholder="Codigo Postal">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCiudad">Ciudad</label>
                  <input type="text" class="form-control" id="Ciudad" name="Ciudad" placeholder="Ciudad">
                </div>                
                <div class="form-group col-md-4">
                  <label for="inputTelefono">Telefono</label>
                  <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
                </div>                
                <div class="form-group col-md-4">
                  <label for="inputDependencia">Dependencia</label>
                  <input type="text" class="form-control" id="Dependencia" name="Dependencia" placeholder="Dependencia">
                </div>                                
                <div class="form-group col-md-4">
                  <label for="inputMacro">Macro</label>
                  <input type="text" class="form-control" id="Macro" name="Macro" placeholder="Macro">
                </div>
              </div>
              <h1 align="center">Datos del contacto</h1>
              <br>
              <div class="form-row">
                <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
                <div class="form-group col-md-4">
                  <label for="inputNombre">Nombre</label>
                  <input type="Nombre" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputParterno">Apellido Parterno</label>
                  <input type="text" class="form-control" id="Parterno" name="Parterno" placeholder="Apellido Parterno">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputMaterno">Apellido Materno</label>
                  <input type="Nombre" class="form-control" id="Materno" name="Materno" placeholder="Materno">
                </div>
                <div class="form-group col-md-4">
                  <label for="Departamento">Departamento</label>
                  <select class="form-control" id="Departamento">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTelefono">Telefono</label>
                  <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
                </div>  
                <div class="form-group col-md-4">
                  <label for="inputCorreo">Correo</label>
                  <input type="text" class="form-control" id="Correo" name="Correo" placeholder="Correo">
                </div>
              </div>   
              <br>
              <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success">Agregar</button> 
        </form>
    </div>