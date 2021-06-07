  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Usuarios/registrar')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Usuarios/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>


 <div class="container box col-md-12" id="advanced-search-form">          
        <h1 align="center">Registro</h1>
        <h3> Todos los campos son obligatorios </h3><br><br>
        <form name="FrmRegistro" Id="FrmRegistro" method="post" action="<?php echo base_url('Usuarios/ingresar')?>">
           <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="Nombre">Nombre</label>
                  <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Parterno">Apellido Parterno</label>
                  <input type="text" class="form-control" id="Paterno" name="Paterno" placeholder="Primer Parterno" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Materno">Apellido Materno</label>
                  <input type="text" class="form-control" id="Materno" name="Materno" placeholder="Segundo Materno" required>
                </div>
              </div>
              
              <div class="form-row">  
                <div class="form-group col-md-4">
                  <label for="Direccion">Dirección</label>
                  <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Dirección" required>
                </div>

                <div class="form-group col-md-4">
                  <label for="Telefono">Teléfono</label>
                  <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono" required>
                </div>
                
                <div class="form-group col-md-4">
                  <label for="TelefonoEme">Teléfono de emergenca</label>
                  <input type="text" class="form-control" id="TelefonoEme" name="TelefonoEme" placeholder="Teléfono de emergenca" required>
                </div>
              </div>

              <div class="form-row">               
                
                <div class="form-group col-md-4">
                  <label for="Puesto">Puesto</label>
                  <select name="Puesto" class="form-control" id="Puesto" required>
                    <option value="0">Seleccione el puesto a desempeñar</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Técnico"> Técnico</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="Usuario">Iniciales</label>
                  <input type="text" class="form-control" id="Usuario" name="Usuario" placeholder="Iniciales" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Password">Contraseña</label>
                  <input type="password" class="form-control" id="Password" name="Password" placeholder="Contraseña" required>
                </div>

                <div class="form-group col-md-4">
                  <label for="Correo">Correo</label>
                  <input type="text" class="form-control" id="Correo" name="Correo" placeholder="Correo" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="dominio" style="color: white"> ----- </label>
                  <select class="form-control" name="cmbDominio" id="cmbDominio">
                    <option value="@hotmail.com">@hotmail.com</option>
                    <option value="@gmail.com">@gmail.com</option>
                    <option value="@outlook.com">@outlook.com</option>
                    <option value="@outlook.es">@outlook.es</option>
                    <option value="@yahoo.com">@yahoo.com</option>
                  </select>
                </div>
              </div>  
              <br>            
              <button name="Ingresar" Id="Ingresar" type="submit" onclick="return usuarios();" class="btn btn-success">Agregar</button>
            </div>
            <br>                                       
        </form>
    </div>

<script src="<?php echo base_url('public/dist/js/validacion.js');?>"></script>