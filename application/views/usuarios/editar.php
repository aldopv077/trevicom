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
        <form name="FrmRegistro" Id="FrmRegistro" method="post" action="<?php echo base_url('Usuarios/actualizar')?>">
          <?php foreach($empleado as $value){?>
           <div class="form-row">
                <input type="hidden" id="Id" name="Id" value="<?php echo $value->IdEmpleado?>">
                <div class="form-group col-md-4">
                  <label for="Nombre">Nombre</label>
                  <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $value->Nombre ?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Parterno">Apellido Parterno</label>
                  <input type="text" class="form-control" id="Paterno" name="Paterno" value="<?php echo $value->Paterno ?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Materno">Apellido Materno</label>
                  <input type="text" class="form-control" id="Materno" name="Materno" value="<?php echo $value->Materno ?>" required>
                </div>
              </div>

              <div class="form-row">               
                <div class="form-group col-md-4">
                  <label for="Telefono">Telefono</label>
                  <input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo $value->Telefono ?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Puesto">Puesto</label>
                  <select name="Puesto" class="form-control" id="Puesto" required>
                    <option value="0">Seleccione el puesto a desempeñar</option>
                    <option value="Administrador" <?php if($value->Puesto === "Administrador"){echo 'selected';}?>>Administrador</option>
                    <option value="Técnico" <?php if($value->Puesto === "Técnico"){echo 'selected';}?>> Técnico</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="Usuario">Iniciales</label>
                  <input type="text" class="form-control" id="Usuario" name="Usuario" value="<?php echo $value->Iniciales ?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Correo">Correo</label>
                  <input type="text" class="form-control" id="Correo" name="Correo" value="<?php echo $value->Correo ?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Password">Contraseña</label>
                  <input type="password" class="form-control" id="Password" name="Password" placeholder="Contraseña" required>
                </div>
              </div>  
              <br> 
          <?php }?>           
              <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <br>                                       
        </form>
    </div>