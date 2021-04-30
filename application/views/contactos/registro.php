  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Contactos/registrar/').$IdEmpresa?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Contactos/index/').$IdEmpresa?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>

    <div class="container box col-md-12" id="advanced-search-form">
      <h1 align="center">Registro</h1>
      <form name="FrmRegistro" Id="FrmRegistro" method="post" action="<?php echo base_url('Contactos/ingresar')?>">
        <div class="form-row">
            <div class="form-group col-md-4">
                  <input type="hidden" Id="IdEmpresa" name="IdEmpresa" value="<?php echo $IdEmpresa?>">
                  <input type="hidden" Id="Principal" name="Principal" value="0">
                  <label for="NombreCont">* Nombre</label>
                  <input type="text" class="form-control" id="NombreCont" name="NombreCont" placeholder="Nombre" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="PaternoCont">* Primer Apellido</label>
                  <input type="text" class="form-control" id="PaternoCont" name="PaternoCont" placeholder="Primer Apellido" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="MaternoCont">Segundo Apellido</label>
                  <input type="text" class="form-control" id="MaternoCont" name="MaternoCont" placeholder="Segundo Apellido">
                </div>
                <div class="form-group col-md-4">
                  <label for="DepartamentoCont">* Departamento</label>
                  <input type="text" class="form-control" id="DepartamentoCont" name="DepartamentoCont" placeholder="Departamento" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="TelefonoCont">* Teléfono</label>
                  <input type="text" class="form-control" id="TelefonoCont" name="TelefonoCont" placeholder="Télefono" required>
                </div>  
                <div class="form-group col-md-4">
                  <label for="CorreoCont">Correo</label>
                  <input type="email" class="form-control" id="CorreoCont" name="CorreoCont" placeholder="Correo electrónico">
                </div>
              </div>
        <br>
        <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success">Agregar</button>
    </div>
    <br>
    </form>
    </div>