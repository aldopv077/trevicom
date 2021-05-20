<div class="container box" id="advanced-search-form">

        <h1 align="center">Reportes</h1>
        <div class="table-responsive">          
          <form name="FrmReporte" Id="FrmReporte" action="<?php echo base_url('Reportes/reporte')?>" method="post">
            <div class="form-row">
              <div class="container"></div>           
              <?php 
                  if($perfil == "Administrador"){
              ?>
              <div class="form-group col-md-6">
                <label for="cmbIng">Nombre de tecnico:</label>
                <select class="form-control" id="cmbIng" name="cmbIng">
                  <option value="0">Selecciones a un ingeniero</option>
                  <?php foreach($ing as $Ing){?>
                      <option value="<?php echo $Ing->Iniciales?>"><?php echo $Ing->Nombre.' '.$Ing->Iniciales?></option>
                  <?php }?>
                </select>
              </div>
              <?php }?>
              <div class="form-group col-md-6">
                <label for="cmbEstatus">Tipo de reporte:</label>
                <select class="form-control" id="cmbEstatus" name="cmbEstatus">
                  <option value="0">Selecciones un estatus</option>
                  <option value="Sin revisar">Sin revisar</option>
                  <option value="En reparación">En Reparación</option>
                  <option value="Revisado">Revisado</option>
                  <option value="Terminado">Terminado</option>
                  <option value="En espera de piezas">En espera de piezas</option>
                  <option value="Terminado sin reparar">Terminado sin reparar</option>
                  <option value="Urgente">Urgente</option>
                  <option value="Garantía">Garantía</option>
                  <option value="Reincidencia">Reincidencia</option>
                </select>
              </div>
            <button name="Ingresar" Id="Ingresar" type="submit" onclick="return Reportes();" class="btn btn-danger col-md-6">Generar Reporte</button>
            </div>
            </form>
          <br>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th><center>No. de orden</center></th>
                <th><center>Cliente</center></th>
                <th><center>Tipo de equipo</center></th>
                <th><center>Marca</center></th>
                <th><center>Modelo</center></th>
                <th><center>Falla</center></th>
                <th><center>Estatus</center></th>
              </tr>
            </thead>
            

        <tbody>
          
        </tbody>
      </table>
    </div>
    <script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>