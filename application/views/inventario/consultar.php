
  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Inventario/index')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Inventario/consultar')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
  </div>

<div class="container box col-md-12" id="advanced-search-form"> 
      <table>
        <nav class="navbar navbar-light bg-light">
          <form class="form-inline" name="FrmBuscarInventario" Id="FrmBuscarInventario" action="<?php echo base_url('Inventario/buscainv')?>" method="post">
            <input class="form-control col-md-4" type="search" Id="IdInventario" name="IdInventario"placeholder="Número de inventario" aria-label="No. De Inventario">
            <input class="form-control col-md-4" type="date" Id="Fecha" name="Fecha" placeholder="Fecha de inventario" aria-label="No. De Inventario">
            <button class="btn btn-outline-success col-md-2" type="submit" onclick="return coninventario();">Buscar</button>
          </form>
        </nav>
      </table>
    <?php if(!isset($inventario) || $inventario == null){?>
      <div class="container box col-md-12" id="advanced-search-form">
        <h1 align="center">Datos del inventario</h1>
          <div class="form-row">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                  <tr>
                    <th><center>No. de Inventario</center></th>
                    <th><center>Supervisor</center></th>
                    <th><center>Jefe de departamento</center></th>
                    <th><center>Número de ordenes</center></th>
                    <th><center>Fecha</center></th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach($lista as $list){
                      $formatofecha = strtotime($list->FechaInicio);
                      $Anio = date("Y", $formatofecha);
                      $Mes = date("m", $formatofecha);
                      $Dia = date("d", $formatofecha);
                      $Fecha = $Dia.'/'.$Mes.'/'.$Anio;
                  ?>
                      <tr>
                        <td><center><a href="<?php echo base_url('Inventario/econsultainv/').$list->IdInventario?>"><?php echo $list->IdInventario?></a></center></td>
                        <td><center><?php echo $list->NombreSupervisor?></center></td>
                        <td><center><?php echo $list->NombreEncargado?></center></td>
                        <td><center><?php echo $list->TotalOrdenes?></center></td>
                        <td><center><?php echo $Fecha?></center></td>
                      </tr>
                  <?php }?>
                </tbody>
              </table>
          </div>
      </div>
    <?php }else{?>
      <div class="container box col-md-12" id="advanced-search-form">
        <h1 align="center">Datos del inventario</h1>
          <div class="form-row">
              <?php foreach($inventario as $inv){
                    $formatofecha = strtotime($inv->FechaInicio);
                    $Anio = date("Y", $formatofecha);
                    $Mes = date("m", $formatofecha);
                    $Dia = date("d", $formatofecha);
                    $Fecha = $Dia.'/'.$Mes.'/'.$Anio;
              ?>

                <div class="form-group col-md-4">
                    <label>Nombre del supervior: </label>
                    <p><?php echo $inv->NombreSupervisor?></p>
                </div>
                <div class="form-group col-md-4">
                    <label>Responsable del departamento</label>
                    <p><?php echo $inv->NombreEncargado?></p>
                </div>
                <div class="form-group col-md-4">
                    <label>Fecha de realización </label>
                    <p><?php echo $Fecha?></p>
                </div>
                <div class="form-group col-md-4">
                    <label>Total de ordenes: </label>
                    <p><?php echo $inv->TotalOrdenes?></p>
                </div>
                <div class="form-group col-md-4">
                    <label>Equipos existentes: </label>
                    <p><?php echo $contexistentes?></p>
                </div>
                <div class="form-group col-md-4">
                    <label>Equipos faltantes: </label>
                    <p><?php echo sizeof($desaparecidas)?></p>
                </div>
              <?php }?>
          </div>
      </div>
    <?php }?>
    <br>
        
    <br>
    <?php if(isset($encontradas) || isset($desaparecidas)){?>
      <h2 align="center">Equipos inventariados</h2>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th><center>No. de orden</center></th>
              <th><center>Tipo de equipo</center></th>
              <th><center>Marca</center></th>
              <th><center>Modelo</center></th>
              <th><center>No. de serie</center></th>
              <th><center>Lugar de servicio</center></th>
            </tr>
          </thead>

          <tbody>
            <tr>
                <td colspan="8" style="background: #5ff06b;"><center><strong>ORDENES EXISTENTES</strong></center></td>
                <?php foreach($encontradas as $ex){?>
                      <tr>
                          <td><center><?php echo $ex->Orden?></center></td>
                          <td><center><?php echo $ex->TipoEquipo?></center></td>
                          <td><center><?php echo $ex->Marca?></center></td>
                          <td><center><?php echo $ex->Modelo?></center></td>
                          <td><center><?php echo $ex->Serie?></center></td>
                          <td><center><?php echo $ex->Lugar?></center></td>
                      </tr>
                <?php }?>
            </tr>
          </tbody>
      </table>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th><center>No. de orden</center></th>
              <th><center>Tipo de equipo</center></th>
              <th><center>Marca</center></th>
              <th><center>Modelo</center></th>
              <th><center>Lugar de servicio</center></th>
              <th><center>No. de serie</center></th>
              <th><center>Encontrada</center></th>
              <th><center>Comentario</center></th>
              <th><center>Fecha de actualización</center></th>
            </tr>
          </thead>

          <tbody>
              <tr>
                  <td colspan="9" style="background: #bb0505; color:#fff"><center><strong>ORDENES NO ENCONTRADAS</strong></center></td>
                  <?php foreach($desaparecidas as $noex){
                      $FechaComentario = '';
                      if($noex->FechaComentario != null){
                          $formatofecha = strtotime($noex->FechaComentario);
                          $Anio = date("Y", $formatofecha);
                          $Mes = date("m", $formatofecha);
                          $Dia = date("d", $formatofecha);
                          $FechaComentario = $Dia.'/'.$Mes.'/'.$Anio;
                      }
                  ?>
                          <tr>
                              <td><center><?php echo $noex->Orden?></center></td>
                              <td><center><?php echo $noex->TipoEquipo?></center></td>
                              <td><center><?php echo $noex->Marca?></center></td>
                              <td><center><?php echo $noex->Modelo?></center></td>
                              <td><center><?php echo $noex->Serie?></center></td>
                              <td><center><?php echo $noex->Lugar?></center></td>
                              <td><center><?php if($noex->Encontrada == 1){echo 'Si';}?></center></td>
                              <td><center><?php if($noex->Comentario != null){echo $noex->Comentario;}?></center></td>
                              <td><center><?php echo $FechaComentario;?></center></td>
                          </tr>
                      <?php }?>
                </tr>
          </tbody>
      </table>

      <div class="container box" id="advanced-search-form-1">
        <div class="btn-group" role="group" aria-label="Third group">
            <a href="<?php echo base_url('Inventario/ebuscainv/').$inv->IdInventario?>" class="btn btn-outline-success float-right">Actualizar no encontradas</a>
        </div>
      </div>
    <?php }else{?>
      <h2 align="center">Equipos inventariados</h2>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th><center>No. de orden</center></th>
              <th><center>Tipo de equipo</center></th>
              <th><center>Marca</center></th>
              <th><center>Modelo</center></th>
              <th><center>No. de serie</center></th>
              <th><center>Lugar de servicio</center></th>
            </tr>
          </thead>
      </table>
    <?php }?>
</div>

<script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>