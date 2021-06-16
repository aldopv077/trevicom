
  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Inventario/index')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Inventario/consultar')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>

<div class="container box" id="advanced-search-form">
        <h1 align="center">Inventario</h1>
        <h6 align="center">Los datos marcados con "*" son <strong>obligatorios</strong></h6><br><br>

        <div class="table-responsive">   
        <form name="FrmInventario" Id="FrmInventario" action="<?php echo base_url('Inventario/inventariar')?>" method="post">       
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="Supervisor">*Nombre de supervisor</label>
              <input type="text" class="form-control" id="Supervisor" name="Supervisor" placeholder="Nombre del supervisor" required>
            </div>
            <div class="form-group col-md-4">
              <label for="JefeDepartamento">*Jefe de departamento</label>
              <input type="text" class="form-control" id="JefeDepartamento" name="JefeDepartamento" placeholder="Nombre de Jefe de departamento" required>
            </div>
            <div class="form-group col-md-4">
              <label for="Inicio">*Fecha inicio</label>
              <input type="date" class="form-control" id="Inicio" name="Inicio" placeholder="Fecha inicio" required>
            </div>
          </div>
            <div class="form-group col-md-8">
              <div class="form-row">
                <a href="<?php echo base_url('Inventario/pdf/').$Inventario;?>" name="Imprimir" Id="Imprimir" class="btn btn-primary col-md-4" target="_blank">Imprimir</a>
                <button name="Enviar" Id="Enviar" type="submit" class="btn btn-success col-md-4">Generar Inventario</button>
              </div>
            </div>
        </form> 
        <form name="FrmInventariado" Id="FrmInventariado" action="<?php echo base_url('Inventario/inventario')?>" method="post">
                     
          <input type="hidden" class="form-control" id="IdInventario" name="IdInventario" value="<?php echo $Inventario?>">
       
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th><center>No. de orden</center></th>
                <th><center>Tipo de equipo</center></th>
                <th><center>Marca</center></th>
                <th><center>Modelo</center></th>
                <th><center>No. de serie</center></th>
                <th><center>Lugar de servicio</center></th>
                <th><center>Existente</center></th>
                <th><center>No encontrado</center></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($ordenes as $ord){?>
                  <tr>
                    <td><center><?php echo $ord->Orden?></center></td>
                    <td><center><?php echo $ord->TipoEquipo?></center></td>
                    <td><center><?php echo $ord->Marca?></center></td>
                    <td><center><?php echo $ord->Modelo?></center></td>
                    <td><center><?php echo $ord->Serie?></center></td>
                    <td><center><?php echo $ord->Lugar?></center></td>
                    <td>
                      <center>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="chbInventario[]" id="<?php echo $ord->Orden?>" value="<?php echo $ord->Orden?>">
                          <label class="custom-control-label" for="<?php echo $ord->Orden?>"></label>
                        </div>
                      </center>
                    </td><td>
                      <center>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="chbNoEncontrado[]" id="<?php echo 'No'. $ord->Orden?>" value="<?php echo $ord->Orden?>">
                          <label class="custom-control-label" for="<?php echo 'No'.$ord->Orden?>"></label>
                        </div>
                      </center>
                    </td>
                  </tr>
              <?php }?>
            </tbody>
          </table>
    </div>
    <br>
    <div class="container box">
      <button type="submit" onclick="return check(<?php echo sizeof($ordenes)?>);" class="btn btn-success float-right">Guardar Inventario</button>
    </div>
  </form>
    <br>
<script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>