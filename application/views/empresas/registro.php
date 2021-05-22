
  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Empresas/registrar')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Empresas/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>


 <div class="container box" id="advanced-search-form"> 
  <h1 align="center">Registrar datos de la empresa</h1>
        <h2 align="center"></h2>
        <h6 align="center">Los campos marcados con * son obligatorios</h6>
        <br>
        <form name="FrmRegistro" Id="FrmRegistro" method="post" action="<?php echo base_url('Empresas/ingresar')?>">
           <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="Nombre">* Nombre</label>
                  <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" required required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Direccion">* Dirección</label>
                  <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Calle/Privada/Callejón/Avenida" required>
                </div><div class="form-group col-md-4">
                  <label for="NoExterior">* No.Exterior</label>
                  <input type="text" class="form-control" id="NoExterior" name="NoExterior" placeholder="No.Exterior" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="NoInterior">No.Interior</label>
                  <input type="text" class="form-control" id="NoInterior" name="NoInterior" placeholder="No.Interior">
                </div>
                <div class="form-group col-md-4">
                  <label for="Colonia">* Colonia</label>
                  <input type="text" class="form-control" id="Colonia" name="Colonia" placeholder="Colonia" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="CodigoPostal">Código Postal</label>
                  <input type="text" class="form-control" id="CodigoPostal" name="CodigoPostal" placeholder="Código Postal">
                </div>
                <div class="form-group col-md-4">
                  <label for="Ciudad">* Ciudad</label>
                  <input type="text" class="form-control" id="Ciudad" name="Ciudad" placeholder="Ciudad" required>
                </div>                
                <div class="form-group col-md-4">
                  <label for="Telefono">* Teléfono</label>
                  <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Télefono" required>
                </div>                
                <div class="form-group col-md-4">
                  <label for="Extencion"> Extención</label>
                  <input type="text" class="form-control" id="Extencion" name="Extencion" placeholder="Extención">
                </div>               
                <div class="form-group col-md-4">
                  <label for="Dependencia">Dependencia</label>
                  <input type="text" class="form-control" id="Dependencia" name="Dependencia" placeholder="Dependencia">
                </div>                                
                <div class="form-group col-md-4">
                  <label for="Macro">* Macro</label>
                  <input type="text" class="form-control" id="Macro" name="Macro" placeholder="Macro" required>
                </div>
              </div>
              <h1 align="center">Datos del contacto</h1>
              <br>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <input type="hidden" name="Principal" Id="Principal" value="1">
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
        </form>
    </div>