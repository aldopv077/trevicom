  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Clientes/registrar')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Clientes/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>

<div class="container box" id="advanced-search-form">
  <h1 align="center">Editar</h1>
  <form name="FrmEditarCli" Id="FrmEditarCli" method="post" action="<?php echo base_url('Clientes/actualizar')?>">
    <?php foreach($cliente as $cli){?>
    <div class="form-row">
      <input type="hidden" class="form-control" id="Id" name="Id" value="<?php echo $cli->IdCliente?>">
      <div class="form-group col-md-4">
        <label for="Nombre">Nombre</label>
        <input type="Nombre" class="form-control" id="Nombre" name="Nombre"  value="<?php echo $cli->Nombre?>">
      </div>
      <div class="form-group col-md-4">
        <label for="Paterno">Primer Apellido</label>
        <input type="text" class="form-control" id="Paterno" name="Paterno"  value="<?php echo $cli->Paterno?>">
      </div>
      <div class="form-group col-md-4">
        <label for="Materno">Segundo Apellido</label>
        <input type="Nombre" class="form-control" id="Materno" name="Materno" value="<?php echo $cli->Materno?>">
      </div>
      </div>
      
      <div class="form-row">      
        <div class="form-group col-md-4">
          <label for="Direccion">Direccion</label>
          <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?php echo $cli->Direccion?>">
        </div>
        <div class="form-group col-md-4">
          <label for="No.Exterior">No.Exterior</label>
          <input type="text" class="form-control" id="Exterior" name="Exterior" value="<?php echo $cli->NoExterior?>">
        </div>
        <div class="form-group col-md-4">
          <label for=tNo.Interior">No.Interior</label>
          <input type="text" class="form-control" id="Interior" name="Interior" value="<?php echo $cli->NoInterior?>">
        </div>
        <div class="form-group col-md-4">
          <label for="Colonia">Colonia</label>
          <input type="text" class="form-control" id="Colonia" name="Colonia" value="<?php echo $cli->Colonia?>">
        </div>
        <div class="form-group col-md-4">
          <label for="Ciudad">Ciudad</label>
          <input type="text" class="form-control" id="Ciudad" name="Ciudad" value="<?php echo $cli->Ciudad?>">
        </div>
        <div class="form-group col-md-4">
          <label for="Codigopostal">Código Postal</label>
          <input type="text" class="form-control" id="CodigoPostal" name="CodigoPostal" value="<?php echo $cli->CP?>">
        </div>
        <div class="form-group col-md-4">
          <label for="Correo">Correo</label>
          <input type="text" class="form-control" id="Correo" name="Correo" value="<?php echo $cli->Correo?>">
        </div>
        <div class="form-group col-md-4">
          <label for="Telefono">Teléfono</label>
          <input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo $cli->Telefono?>">
        </div>
        <div class="form-group col-md-4">
          <label for="Celular">Celular</label>
          <input type="text" class="form-control" id="Celular" name="Celular" value="<?php echo $cli->Celular?>">
        </div>
        <div class="form-group col-md-4">
          <label for="ClienteMacro">Cliente Macro</label>
          <input type="text" class="form-control" id="Macro" name="Macro" value="<?php echo $cli->Macro?>">
        </div>
      </div>
      <?php }?>
    <br>
    <button name="Guardar" Id="Guardar" type="submit" class="btn btn-primary">Actualizar</button>
    <br>
  </form>
</div>