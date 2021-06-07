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
      <h6 align="center">Los campos marcados con "*" son obligatorios</h6>
      <br><br>
      <form name="FrmRegistro" Id="FrmRegistro" method="post" action="<?php echo base_url('Clientes/agregar')?>">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="Nombre">*Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" required>
          </div>
          <div class="form-group col-md-4">
            <label for="Paterno">*Primer Apellido</label>
            <input type="text" class="form-control" id="Parterno" name="Paterno" placeholder="Primer Apellido" required>
          </div>
          <div class="form-group col-md-4">
            <label for="Materno">Segundo Apellido</label>
            <input type="text" class="form-control" id="Materno" name="Materno" placeholder="Segundo Apellido">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="Direccion">*Dirección</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder=" Nombre de Calle/Avenida/Callejón/privada" required>
          </div>
          <div class="form-group col-md-4">
            <label for="No.Exterior">*No.Exterior</label>
            <input type="text" class="form-control" id="Exterior" name="Exterior" placeholder="No.Exterior" required>
          </div>
          <div class="form-group col-md-4">
            <label for="No.Interior">No.Interior</label>
            <input type="text" class="form-control" id="Interior" name="Interior" placeholder="No.Interior">
          </div>
          <div class="form-group col-md-4">
            <label for="Colonia">*Colonia</label>
            <input type="text" class="form-control" id="Colonia" name="Colonia" placeholder="Colonia" required>
          </div>
          <div class="form-group col-md-4">
            <label for="Ciudad">*Ciudad</label>
            <input type="text" class="form-control" id="Ciudad" name="Ciudad" placeholder="Ciudad" required>
          </div>
          <div class="form-group col-md-4">
            <label for="Codigopostal">*Codigo Postal</label>
            <input type="text" class="form-control" id="CodigoPostal" name="CodigoPostal" placeholder="Codigo Postal" required>
          </div>
            <div class="form-group col-md-4">
              <label for="Correo">Correo</label>
              <input type="text" class="form-control" id="Correo" name="Correo" placeholder="Correo">
            </div>
            <div class="form-group col-md-3">
                  <label for="dominio" style="color: white"> ----- </label>
                  <select class="form-control" name="cmbDominio" id="cmbDominio">
                    <option value="@hotmail.com">@hotmail.com</option>
                    <option value="@gmail.com">@gmail.com</option>
                    <option value="@outlook.com">@outlook.com</option>
                    <option value="@outlook.es">@outlook.es</option>
                    <option value="@live.com.mx">@live.com.mx</option>
                    <option value="@yahoo.com.mx">@yahoo.com.mx</option>
                    <option value="@yahoo.com">@yahoo.com</option>
                  </select>
                </div>

          <div class="form-group col-md-4">
            <label for="Telefono">*Telefono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono" required>
          </div>
          <div class="form-group col-md-4">
            <label for="Celular">*Celular</label>
            <input type="text" class="form-control" id="Celular" name="Celular" placeholder="Celular" required>
          </div>
          <div class="form-group col-md-4">
            <label for="Macro">Cliente Macro</label>
            <input type="text" class="form-control" id="Macro" name="Macro" placeholder="Cliente MACRO">
          </div>
        </div>
        <br>
        <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success">Agregar</button>
    </div>
    <br>
    </form>
    </div>