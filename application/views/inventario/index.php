
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
            <button name="Enviar" Id="Enviar" type="submit" class="btn btn-success">Generar Inventario</button>
          </div>
        </form> 
        <form>             
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th><center>No. de orden</center></th>
                <th><center>Tipo de equipo</center></th>
                <th><center>Marca</center></th>
                <th><center>Modelo</center></th>
                <th><center>No. de serie</center></th>
                <th><center>Lugar de servicio</center></th>
                <th><center>Inventario</center></th>
              </tr>
            </thead>
          
          
            <tbody>
            </tbody>
          </table>
    </div>
    <br>
    <div class="container box">
      <button type="button" class="btn btn-success float-right">Guardar Inventario</button>
    </div>
  </form>
    <br>
