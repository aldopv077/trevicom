  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Empresas/registrar')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Empresas/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>

    <div class="container box" id="advanced-search-form">
      <h1 align="center">Editar Datos de la empresa</h1>
      <h4 align="center">Los campos marcados con * son obligatorios</h4>
      <br>
      <form name="FrmEditarEmpr" Id="FrmEditarEmpr" method="post" action="<?php echo base_url('Empresas/actualizar')?>">
        <?php foreach($empresa as $empr){?>
          <div class="form-row">
                <input type="hidden" name="Id" id="Id" value="<?php echo $empr->IdEmpresa?>">
                <div class="form-group col-md-4">
                  <label for="Nombre">* Nombre</label>
                  <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" value="<?php echo $empr->Nombre?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Direccion">* Dirección</label>
                  <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Calle/Privada/Callejón/Avenida" value="<?php echo $empr->Direccion?>" required>
                </div><div class="form-group col-md-4">
                  <label for="NoExterior">* No.Exterior</label>
                  <input type="text" class="form-control" id="NoExterior" name="NoExterior" placeholder="No.Exterior" value="<?php echo $empr->NoExterior?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="NoInterior">No.Interior</label>
                  <input type="text" class="form-control" id="NoInterior" name="NoInterior" placeholder="No.Interior" value="<?php echo $empr->NoInterior?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Colonia">* Colonia</label>
                  <input type="text" class="form-control" id="Colonia" name="Colonia" placeholder="Colonia" value="<?php echo $empr->Colonia?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="CodigoPostal">Código Postal</label>
                  <input type="text" class="form-control" id="CodigoPostal" name="CodigoPostal" placeholder="Código Postal" value="<?php echo $empr->CodigoPostal?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Ciudad">* Ciudad</label>
                  <input type="text" class="form-control" id="Ciudad" name="Ciudad" placeholder="Ciudad" value="<?php echo $empr->Ciudad?>" required>
                </div>                
                <div class="form-group col-md-4">
                  <label for="Telefono">* Teléfono</label>
                  <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Télefono" value="<?php echo $empr->Telefono?>" required>
                </div>                
                <div class="form-group col-md-4">
                  <label for="Dependencia">Dependencia</label>
                  <input type="text" class="form-control" id="Dependencia" name="Dependencia" placeholder="Dependencia" value="<?php echo $empr->Dependencia?>">
                </div>                                
                <div class="form-group col-md-4">
                  <label for="Macro">* Macro</label>
                  <input type="text" class="form-control" id="Macro" name="Macro" placeholder="Macro" value="<?php echo $empr->Macro?>" required>
                </div>
              </div>
        <br>
        <?php }?>
        <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>