  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Clientes/registrar')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Clientes/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>

    <div class="container box col-md-12" id="advanced-search-form">
      <h1 align="center">Registro</h1>
      <form name="FrmRegistro" Id="FrmRegistro" method="post" action="">
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
        </div>

        <div class="form-row">
          <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">

          <div class="form-group col-md-4">
            <label for="inputDireccion">Direccion</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direccion completa">
          </div>
          <div class="form-group col-md-4">
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
            <label for="inputCiudad">Ciudad</label>
            <input type="text" class="form-control" id="Ciudad" name="Ciudad" placeholder="Ciudad">
          </div>
          <div class="form-group col-md-4">
            <label for="inputCodigopostal">Codigo Postal</label>
            <input type="text" class="form-control" id="Codigopostal" name="Codigopostal" placeholder="Codigo Postal">
          </div>
          <div class="form-group col-md-4">
            <label for="inputCorreo">Correo</label>
            <input type="text" class="form-control" id="Correo" name="Correo" placeholder="Correo">
          </div>
          <div class="form-group col-md-4">
            <label for="inputTelefono">Telefono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
          </div>
          <div class="form-group col-md-4">
            <label for="inputCelular">Celular</label>
            <input type="text" class="form-control" id="Celular" name="Celular" placeholder="Celular">
          </div>
          <div class="form-group col-md-4">
            <label for="inputClienteMacro">Cliente Macro</label>
            <input type="text" class="form-control" id="ClienteMacro" name="ClienteMacro" placeholder="Cliente MACRO">
          </div>
        </div>
        <br>
        <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success">Agregar</button>
    </div>
    <br>
    </form>
    </div>