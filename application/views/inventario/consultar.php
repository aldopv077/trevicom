
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
            <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
            <div class="form-group col-md-4">
                <label>Nombre del supervior: </label>
                <label>-----</label>
            </div>
            <div class="form-group col-md-4">
              <label>Responsable del departamento</label>
              <label>-----</label>
            </div>
            <div class="form-group col-md-4">
              <label>Fecha de realización </label>
              <label>-----</label>
            </div>
            <div class="form-group col-md-4">
              <label>Total de ordenes: </label>
              <label>-----</label>
            </div>
            <div class="form-group col-md-4">
              <label>Equipos existentes: </label>
              <label>-----</label>
            </div>
            <div class="form-group col-md-4">
              <label>Equipos faltantes: </label>
              <label>-----</label>
            </div>
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
            </tbody>
          </table>
</div>

<script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>