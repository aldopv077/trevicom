<script>
      window.addEventListener('load', function () {
        document.getElementById('fechas').style.display="none";

        document.getElementById('NoOrden').style.display="none";
        document.getElementById('NomCliente').style.display="none";
        document.getElementById('NomEmpresa').style.display="none";
        document.getElementById('NoSerie').style.display="none";
      });
  </script>  

<div class="container box" id="advanced-search-form-1">
  <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Cotizaciones/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
  </div>
</div>
<div class="container box col-md-12" id="advanced-search-form">

        <h1 align="center">Cotizaciones</h1>
        <div class="table-responsive">          
          <form name="FrmReporte" Id="FrmReporte" action="<?php echo base_url('Cotizaciones/reporte')?>" method="post">
            <div class="form-row">        
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


            <form Id="FrmConOrden" name="FrmConOrden" action="<?php echo base_url('Cotizaciones/conCotizacionClie')?>" method="post">
              <div class="form-row">
                <!--<div class="form-group col-md-3">
                  <label for="cmbIng">Numero de cotización:</label>
                  <input class="form-control col-md-6" type="text" name="Cotizacion" id="Cotizacion">
                </div>-->
                <div class="form-group col-md-4">
                <label for="TipoBusqueda">Buscar por:</label>
                <select class="form-control" id="TipoBusqueda" name="TipoBusqueda" onchange="busquedaorden();">
                    <option value="0">Seleccione una opción</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Empresa">Empresa</option>
                </select>
            </div>
            <table>
                <nav class="navbar navbar-light bg-light">
                    <input class="form-control col-md-8" type="search" id="NomCliente" name="NomCliente" list="clientes" placeholder="Nombre del cliente" aria-label="Usuario">
                        <datalist id="clientes">
                            <?php
                                foreach ($clientes as $key) {
                                    print '<option value="'.$key->IdCliente .' '. $key->Nombre .' '. $key->Paterno .' '. $key->Materno.' '. $key->Telefono .'"></option>';
                                }
                            ?>
                        </datalist>
                        <span class="input-group-btn"></span>
                    <input class="form-control col-md-8" type="search" id="NoSerie" name="NoSerie" placeholder="Número de serie del equipo" aria-label="Usuario">
                    <input class="form-control col-md-8" type="search" id="NomEmpresa" name="NomEmpresa" list="empresas" placeholder="Nombre de la empresa" aria-label="Usuario">
                        <datalist id="empresas">
                        <?php
                            foreach ($empresas as $key) {
                                print '<option value="'.$key->IdEmpresa .' '. $key->Nombre .' '. $key->Telefono .'"></option>';
                            }
                        ?>
                        </datalist>
                        <span class="input-group-btn"></span>
                    <input class="form-control col-md-8" type="text" id="NoOrden" name="NoOrden"  placeholder="Número de orden" aria-label="Usuario">
                </nav>
            </table>
            </div>
                
                <div class="form-group col-md-6">
                  <label></label>
                  <button name="Buscar" Id="Buscar" type="submit" class="btn btn-success col-md-4"> Buscar </button>
                </div>
              </div>
            </form>
          <br>
          
          <?php if(isset($cotreal) || isset($cotpend)){?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th><center>No. de cotizacion</center></th>
                <th><center>No. de orden</center></th>
                <th><center>Estatus</center></th>
                <th><center>Fecha</center></th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if(isset($cotreal)){
                  foreach($cotreal as $cot){
                    $formatofecha = strtotime($cot->Fecha);
                        $Anio = date("Y", $formatofecha);
                        $Mes = date("m", $formatofecha);
                        $Dia = date("d", $formatofecha);
                        $Fecha = $Dia ."/". $Mes ."/". $Anio;
              ?>
                  <tr>
                    <td><center><a href="<?php echo base_url('Cotizaciones/VerCotizacion/').$cot->IdCotizacion?>" target="_blank"><?php echo $cot->IdCotizacion?></center></td>
                    <td><center><?php echo $cot->IdOrden?></center></td>
                    <td><center><?php echo $cot->Estatus?></center></td>
                    <td><center><?php echo $Fecha?></center></td>
                  </tr>
              <?php 
                  }
                }else{
                  foreach($cotpend as $cot){
              ?>
                  <tr>
                    <td><center><a href="<?php echo base_url('Cotizaciones/econCotizacion/').$cot->IdCotizacion?>"><?php echo $cot->IdCotizacion?></center></td>
                    <td><center><?php echo $cot->IdOrden?></center></td>
                    <td><center><?php echo $cot->Estatus?></center></td>
                    <td><center>-----</center></td>
                  </tr>
              <?php 
                  }
                }
              ?>
            </tbody>
          </table>
          <?php }?>
        </div>
    <script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>
    <script src="<?php echo base_url('public/dist/js/personalizado.js')?>"></script>