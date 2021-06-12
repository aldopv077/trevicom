<script>
      window.addEventListener('load', function () {
        document.getElementById('fechas').style.display="none";
      });
  </script>  
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
              <div class="form-group col-md-6">
                <label for="cmbEstatus">Estatus:</label>
                <select class="form-control" id="cmbEstatus" name="cmbEstatus" onchange="fechas();">
                  <option value="0">Selecciones un estatus</option>
                  <option value="Solicitud">En solicitud</option>
                  <option value="Realizada">Realizada</option>
                </select>
              </div>
            </div>
            
              <div class="form-row" id="fechas">
                <div class="form-group col-md-6">
                  <label for="FechaInicio">Fecha Inicio:</label>
                  <input type="date" class="form-control" name="dtInicio" id="dtInicio">
                </div>
                <div class="form-group col-md-6">
                  <label for="FechaFin">Fecha Fin:</label>
                  <input type="date" class="form-control" name="dtFin" id="dtFin">
                </div>
              </div>
              <div class="col-md-12">
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
          <?php if(isset($cotizacionReal) || isset($cotizacionPend)){?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-light">
                <tr>
                  <th><center>No. de cotizacion</center></th>
                  <th><center>No. de orden</center></th>
                  <th><center>Estatus</center></th>
                </tr>
              </thead>
              <tbody>
                  <?php if(isset($cotizacionPend)){?>
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
                  <?php }?>
                  <?php if(isset($cotizacionReal)){?>
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
                  <?php }?>
              </tbody>
            </table>
          <?php }?>
    </div>
    <script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>
    <script src="<?php echo base_url('public/dist/js/personalizado.js')?>"></script>