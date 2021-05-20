
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
    <div class="container box col-md-12" id="advanced-search-form">
      <h1 align="center">Datos del inventario</h1>
        <div class="form-row">
            <?php foreach($inventario as $inv){?>
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
                    <p><?php echo $inv->FechaInicio?></p>
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
    <br>
        
    <br>
    <h1 align="center">Equipos faltantes del inventario</h1>
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
                <?php foreach($desaparecidas as $noex){?>
                    <tr>
                        <td><center><?php echo $noex->Orden?></center></td>
                        <td><center><?php echo $noex->TipoEquipo?></center></td>
                        <td><center><?php echo $noex->Marca?></center></td>
                        <td><center><?php echo $noex->Modelo?></center></td>
                        <td><center><?php echo $noex->Serie?></center></td>
                        <td><center><?php echo $noex->Lugar?></center></td>
                    </tr>
                <?php }?>
            </tbody>
          </table>
</div>

<script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>