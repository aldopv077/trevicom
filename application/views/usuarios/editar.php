
  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Usuarios/registrar')?>" type="button" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Usuarios/index')?>" type="button" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>


 <div class="container box" id="advanced-search-form">          
        <h1 align="center">Editar</h1>
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
                    <label for="inputDomicilio">Domicilio</label>
                    <input type="text" class="form-control" id="Domicilio" name="Domicilio" placeholder="Domicilio completo">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputTelefono">Telefono</label>
                    <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleFormControlSelect1">Puesto</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputUsuario">Iniciales</label>
                    <input type="text" class="form-control" id="Usuario" name="Usuario" placeholder="Iniciales">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail">Email</label>
                    <input type="text" class="form-control" id="Email" name="Email" placeholder="Email">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputPassword">Contraseña</label>
                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Contraseña">
                  </div>
                <br>
              <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-primary">Actualizar</button> 
            <br>                                       
        </form>
    </div>