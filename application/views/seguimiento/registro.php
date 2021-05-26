<script>
    window.addEventListener('load', function() {
        document.getElementById('Costo').style.display="none";
        document.getElementById('Costo').disabled= true;
    });
</script>
<div class="container box col-md-12" id="advanced-search-form"> 
      <table>
        <nav class="navbar navbar-light bg-light">
          <form class="form-inline" name="FrmBuscarOrden" Id="FrmBuscarOrden" action="<?php echo base_url('Seguimiento/buscaorden')?>" method="post">
            <input class="form-control col-md-8" type="search" Id="IdOrden" name="IdOrden"placeholder="Numero De Orden" aria-label="No. De Orden" requered>
            <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
          </form>
        </nav>
      </table>
    <div class="container box col-md-12" id="advanced-search-form">
        <h1 align="center">Datos de orden</h1>
        <?php foreach($orden as $datos){?>
            <?php if(isset($datos->IdCliente)){?>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre: </label>
                        <p><?php echo $datos->Nombre.' '.$datos->Paterno.' '.$datos->Materno?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Teléfono:</label>
                        <p><?php echo $datos->Telefono?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Celular:</label>
                        <p><?php echo $datos->Celular?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tipo de equipo</label>
                        <p><?php echo $datos->Equipo?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>No. Serie</label>
                        <p><?php echo $datos->Serie?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Marca</label>
                        <p><?php echo $datos->Marca?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Modelo</label>
                        <p><?php echo $datos->Modelo?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Estatus</label>
                        <p><?php echo $datos->Estatus?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lugar</label>
                        <p><?php echo $datos->Lugar?></p>
                    </div>
                </div>
            <?php }else{?>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Empresa: </label>
                        <p><?php echo $datos->Empresa?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tel-Empresa:</label>
                        <p><?php echo $datos->TelEmpresa?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Contacto:</label>
                        <p><?php echo $datos->Nombre.' '.$datos->Paterno.' '.$datos->Materno?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tel-Contacto:</label>
                        <p><?php echo $datos->TelContacto?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tipo de equipo</label>
                        <p><?php echo $datos->Equipo?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Falla</label>
                        <p><?php echo $datos->Falla?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>No. Serie</label>
                        <p><?php echo $datos->Serie?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Marca</label>
                        <p><?php echo $datos->Marca?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Modelo</label>
                        <p><?php echo $datos->Modelo?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Estatus</label>
                        <p><?php echo $datos->Estatus?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lugar</label>
                        <p><?php echo $datos->Lugar?></p>
                    </div>
                </div>
            <?php }?>
        <?php }?>
    </div>
    <br>
        <form name="FrmAgregarComentario" Id="FrmAgregarComentario" action="<?php echo base_url('Seguimiento/registrar')?>" method="post">
        <h1 align="center">Seguimiento del equipo</h1>
        <h6 align="center">Los datos marcados con "*" son <strong>obligatorios</strong></h6><br><br>

            <div class="form-group col-md-4">
            <input type="hidden" name="txtIdOrden" Id="txtIdOrden" value="<?php echo $datos->Orden?>">
            <label for="cmbTComentario">*Tipo de comentario</label>
            <select class="form-control" id="cmbTComentario" name="cmbTComentario">
                <option value="0" selected>Seleccione una opción</option>
                <option value="Información interna" >Información interna</option>
                <option value="Mostrar al cliente">Mostrar al cliente</option>
            </select>
            </div>
            <div class="form-group col-md-8">
            <label for="Comentario">*Comentario</label>
            <input type="" class="form-control" id="Comentario" name="Comentario" placeholder="Comentario" required>
            </div>
            <br> 
            <div class="form-row">
            <div class="container"></div>
            <div class="form-group col-md-4">
                <label for="cmbEstatus">*Estatus del equipo:</label>
                <select class="form-control" id="cmbEstatus" name="cmbEstatus" onchange="costo();">
                    <option value="0" selected> Seleccione una opción</option>
                    <option value="Revisado"> Revisado </option>
                    <option value="En espera de piezas"> En espera de piezas </option>
                    <option value="Terminado"> Terminado </option>
                    <option value="Terminado sin reparar"> Terminado sin reparar </option>
                </select>
            </div>
            
            <div class="form-group col-md-3">
            <label for="Costo"></label>
            <input type="text" class="form-control" id="Costo" name="Costo" placeholder="Costo">
            </div>
            </div>
            <button name="Agregar" Id="Agregar" type="submit" onclick="return Seguimiento();" class="btn btn-success col-md-2">Agregar</button>
        </form>
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
                <tr>
                    <th><center>Tipo de información</center></th>
                    <th><center>Comentario</center></th>
                    <th><center>Estatus</center></th>
                    <th><center>Fecha</center></th>
                    <th><center>Hora</center></th>
                    <th><center>Usuario</center></th>
                </tr>
            </thead>
                <?php foreach($seguimiento as $seg){
                    
                    $formatofecha = strtotime($seg->Fecha);
                    $Anio = date("Y", $formatofecha);
                    $Mes = date("m", $formatofecha);
                    $Dia = date("d", $formatofecha);
                    $Fecha = $Dia ."/". $Mes ."/". $Anio;    
                ?>
                    <tr>
                        <td><center><?php echo $seg->TipoComentario?></center></td>
                        <td><center><?php echo $seg->Comentario?></center></td>
                        <td><center><?php echo $seg->Estatus?></center></td>
                        <td><center><?php echo $Fecha?></center></td>
                        <td><center><?php echo $seg->Hora?></center></td>
                        <td><center><?php echo $seg->Iniciales?></center></td>
                    </tr>
                <?php }?>
            <tbody>
            </tbody>
        
        </table>
      </form>
    </div>

    <script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>