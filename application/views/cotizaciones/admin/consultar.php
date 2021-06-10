<div class="container box" id="advanced-search-form-1">
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
            <form Id="FrmConOrden" name="FrmConOrden" action="<?php echo base_url('Cotizaciones/conCotizacion')?>" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="cmbIng">Numero de cotización:</label>
                  <input class="form-control col-md-6" type="text" name="Cotizacion" id="Cotizacion">
                </div>
                
                <div class="form-group col-md-6">
                  <label></label>
                  <button name="Buscar" Id="Buscar" type="submit" class="btn btn-success col-md-4"> Buscar </button>
                </div>
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
              <tr>
                <td colspan="8"> <h6><center>En solicitud</center></h6> </td>
              </tr>
              <?php foreach($cotizacionPend as $Pend){?>
                <tr>
                  <td><center><a href="<?php echo base_url('Cotizaciones/econCotizacion/').$Pend->IdCotizacion?>"> <?php echo $Pend->IdCotizacion?> </center></td>
                  <td><center> <?php echo $Pend->IdOrden?> </center></td>
                  <td><center> <?php echo $Pend->Estatus?> </center></td>
                </tr>
              <?php }?>
              <tr>
                <td colspan="8"> <h6><center>Realizadas</center></h6> </td>
              </tr>
              
              <?php foreach($cotizacionReal as $Real){?>
                <tr>
                  <td><center> <?php echo $Real->IdCotizacion?> </center></td>
                  <td><center> <?php echo $Real->IdOrden?> </center></td>
                  <td><center> <?php echo $Real->Estatus?> </center></td>
                </tr>
              <?php }?>

            </tbody>
          </table>
        </div>
    <script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>