  <?php foreach($contacto as $cont){?>
  
  <div class="container box" id="advanced-search-form-1">
  <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Contactos/registrar/').$cont->IdEmpresa?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
  <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Contactos/index/').$cont->IdEmpresa?>" class="btn btn-outline-primary float-light">Consultar</a>
  </div>
  </div>
    <div class="container box col-md-12" id="advanced-search-form">
      <h1 align="center">Editar</h1>
      <form name="FrmActualizar" Id="FrmActualizar" method="post" action="<?php echo base_url('Contactos/actualizar')?>">
        <div class="form-row">
            <div class="form-group col-md-4">
                  <input type="hidden" Id="IdEmpresa" name="IdEmpresa" value="<?php echo $cont->IdEmpresa?>">
                  <input type="hidden" Id="Principal" name="Principal" value="<?php echo $cont->Principal?>" >
                  <input type="hidden" Id="Id" name="Id" value="<?php echo $cont->IdContacto?>" >
                  <label for="NombreCont">* Nombre</label>
                  <input type="text" class="form-control" id="NombreCont" name="NombreCont" placeholder="Nombre" value="<?php echo $cont->Nombre?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="PaternoCont">* Primer Apellido</label>
                  <input type="text" class="form-control" id="PaternoCont" name="PaternoCont" placeholder="Primer Apellido" value="<?php echo $cont->Paterno?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="MaternoCont">Segundo Apellido</label>
                  <input type="text" class="form-control" id="MaternoCont" name="MaternoCont" placeholder="Segundo Apellido" value="<?php echo $cont->Materno?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="DepartamentoCont">* Departamento</label>
                  <input type="text" class="form-control" id="DepartamentoCont" name="DepartamentoCont" placeholder="Departamento" value="<?php echo $cont->Departamento?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="TelefonoCont">* Teléfono</label>
                  <input type="text" class="form-control" id="TelefonoCont" name="TelefonoCont" placeholder="Télefono"  value="<?php echo $cont->Telefono?>" required>
                </div>  
                <div class="form-group col-md-4">
                  <label for="CorreoCont">Correo</label>
                  <input type="email" class="form-control" id="CorreoCont" name="CorreoCont" placeholder="Correo electrónico" value="<?php echo $cont->Correo?>" >
                </div> 
                <div class="form-group col-md-4">
                  <label for="Activar">Activar nuevamente</label>
                  <input type="checkbox" name="Activar" id="Activar" class="form-control" <?php if($cont->Activo == 1){ echo 'checked';}?>>
                </div>
              </div>
        <br>
        <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success">Guardar</button>
    </div>
    <br>
    </form>
    </div>
    <?php }?>