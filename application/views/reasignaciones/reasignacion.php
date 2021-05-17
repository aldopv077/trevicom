<div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Ordenes/index')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Ordenes/consultar')?>" class="btn btn-outline-primary float-light">Consultar</a>
    </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Ordenes/reasignar')?>" class="btn btn-outline-primary float-light">Reasignar</a>
    </div>
  </div>


 <div class="container box" id="advanced-search-form">
      <h1 align="center">Reasignación</h1>
      <div class="table-responsive">
        <div class="form-row">
            <form class="form-inline" Id="FrmBuscarOrden" name="FrmBuscarOrden" action="<?php echo base_url('Ordenes/busquedareasignacion')?>" method="post">
              <input class="form-control col-md-8" type="search" placeholder="Número de orden" id="IdOrden" name="IdOrden" aria-label="Usuario">
              <button class="btn btn-outline-success col-md-4" type="submit">Buscar</button>
            </form>
        </div>
        <div class="form-row">
            <form class="form-inline"  Id="FrmAsignar" name="FrmAsignar" action="<?php echo base_url('Ordenes/asignar')?>" method="post">                
                <?php foreach($orden as $ord){
                    $IdOrden = $ord->Orden;
                    $iniciales = $ord->Asignado;
                }?>
                
                <input type="hidden" class="form-control" id="txtOrden" name="txtOrden" value="<?php echo $IdOrden?>">
                <input type="hidden" class="form-control" id="txtAsignado" name="txtAsignado" value="<?php echo $iniciales?>">
                
                <div class="form-group col-md-6">
                  <label for="cmbIng">Reasignar A:</label>
                  <select class="form-control" id="cmbIng" name="cmbIng">
                    <option value="0">Seleccione un ingeniero</option>
                    <?php foreach($ing as $Ing){?>
                        <option value="<?php echo $Ing->Iniciales?>"> <?php echo $Ing->Nombre.' '.$Ing->Iniciales ?> </option>
                    <?php }?>
                  </select>
                </div>
                
                <button class="btn btn-outline-success col-md-4" type="submit" onclick="return asignaciones();">Reasignar</button>
            </form>
        </div>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th><center>Cliente</center></th>
                            <th><center>Tipo de equipo</center></th>
                            <th><center>Marca</center></th>
                            <th><center>No.serie</center></th>
                            <th><center>Falla</center></th>
                        </tr>
                    </thead>
                    <tbody>    
                    <?php foreach($orden as $datos){?>
                        <tr>
                            <td><center><?php echo $datos->Nombre.' '.$datos->Paterno.' '.$datos->Materno?></center></td>
                            <td><center><?php echo $datos->Equipo?></center></td>
                            <td><center><?php echo $datos->Marca?></center></td>
                            <td><center><?php echo $datos->Serie?></center></td>
                            <td><center><?php echo $datos->Falla?></center></td>
                        </tr>
                    <?php }?>
                    </tbody>
            </table>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th><center>No. Orden</center></th>
                <th><center>Reasignó</center></th>
                <th><center>Ing. Reasignado</center></th>
              </tr>
            </thead>
        <tbody>
            <?php foreach($asignaciones as $asig){?>
                <tr>
                    <td><center><?php echo $asig->Orden?></center></td>
                    <td><center><?php echo $asig->Iniciales?></center></td>
                    <td><center><?php echo $asig->Asignado?></center></td>
                </tr>
            <?php }?>
        </tbody>
      </table>
    </div>
    
    </div>
    <br>
 </div>

 <script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>