<div class="container box" id="advanced-search-form-1">
  <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Cotizaciones/index')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
  <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Cotizaciones/consultar')?>" class="btn btn-outline-primary float-light">Consultar</a>
  </div>

<div class="container box" id="advanced-search-form">

        <h1 align="center">Cotizaciones</h1>
        <div class="table-responsive">          
          <form name="FrmReporte" Id="FrmReporte" action="<?php echo base_url('Cotizaciones/reporte')?>" method="post">
            <div class="form-row">
              <div class="container"></div>           
              <?php 
                  if($perfil == "Administrador"){
              ?>
              <div class="form-group col-md-6">
                <label for="cmbIng">Nombre de ingeniero:</label>
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
                  <option value="Solicitud">En solicitud</option>
                  <option value="Realizada">Realizada</option>
                </select>
              </div>
            <button name="Ingresar" Id="Ingresar" type="submit" onclick="return Reportes();" class="btn btn-danger col-md-6">Generar Reporte</button>
            </div>
            </form>
          <br>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th><center>No. de cotizacion</center></th>
                <th><center>No. de orden</center></th>
                <th><center>Estatus</center></th>
              </tr>
            </thead>
            

            <tbody>
                  
            </tbody>
          </table>
    </div>
    <script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>