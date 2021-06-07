<script>
     window.addEventListener('load', function () {
        document.getElementById('Empresa').style.display="none";
        document.getElementById('Convencional').style.display="none";
        document.getElementById('DominioConvencional').style.display="none";
     });
</script>  
  
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
      <h6 align="center"> Los campos marcados con * son obligatorios</h6>
      <br><br><br>
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

                <div class="container">
                    <div class="custom-control custom-radio custom-control-inline ">
                      <label>Tipo de correo</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="rbconvencional" name="rbCorreo" value="convencional" class="custom-control-input" onchange="correo();">
                      <label class="custom-control-label" for="rbconvencional">Dominio convencional (hotmail, gmail, etc)</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="rbEmpresa" name="rbCorreo" value="empresa" class="custom-control-input"  onchange="correo();">
                      <label class="custom-control-label" for="rbEmpresa">Dominio de la empresa</label>
                    </div>
                    
                    <div class="form-group col-md-4" Id="Empresa">
                        <label for="CorreoCont">Correo</label>
                        <input type="email" class="form-control" id="CorreoCont" name="CorreoCont" placeholder="Correo electrónico">
                    </div>
                   
                  </div>
                
                    <div class="form-group col-md-4" Id="Convencional">
                      <label for="Correo">Correo</label>
                      <input type="text" class="form-control" id="Correo" name="Correo" placeholder="Correo">
                    </div>
                    <div class="form-group col-md-3" Id="DominioConvencional">
                        <label for="dominio" style="color: white"> ----- </label>
                          <select class="form-control" name="cmbDominio" id="cmbDominio">
                            <option value="0">Seleccione un dominio</option>
                            <option value="@hotmail.com">@hotmail.com</option>
                            <option value="@gmail.com">@gmail.com</option>
                            <option value="@outlook.com">@outlook.com</option>
                            <option value="@outlook.es">@outlook.es</option>
                            <option value="@live.com.mx">@live.com.mx</option>
                            <option value="@yahoo.com.mx">@yahoo.com.mx</option>
                            <option value="@yahoo.com">@yahoo.com</option>
                          </select> 
                    </div>
            </div>
        <br>
        <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success">Agregar</button>
    </div>
    <br>
    </form>
    </div>
<script src="<?php echo base_url('public/dist/js/personalizado.js')?>"></script>