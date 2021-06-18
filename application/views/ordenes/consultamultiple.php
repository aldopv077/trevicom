<script>
    window.addEventListener('load', function () {
        document.getElementById('NoOrden').style.display="block";
        document.getElementById('NomCliente').style.display="none";
        document.getElementById('NomEmpresa').style.display="none";
        document.getElementById('NoSerie').style.display="none";
      });
</script>
<?php 
    if($orden == null){
        echo '<script> alert("No se han encotrado resultados para la consulta");</script>';
        redirect('Ordenes/consultar', 'refresh');
    }
    foreach($orden as $datos){
    $formatofecha = strtotime($datos->Fecha);
    $Anio = date("Y", $formatofecha);
    $Mes = date("m", $formatofecha);
    $Dia = date("d", $formatofecha);
    $Fecha = $Dia ."/". $Mes ."/". $Anio; 
}?>


    <?php if($conteo == 1 || $conteo == null){?>    
        <div class="container box barra" Id="barra">
                <?php foreach($orden as $relevantes){
                    if(isset($relevantes->IdCliente)){
                        echo $relevantes->Nombre.' '.$relevantes->Paterno.' '.$relevantes->Materno.' <strong>Macro: </strong>'.$relevantes->Macro.'<br>';
                        echo '<strong>Fecha de recepción:</strong> '.$Fecha.' <strong>Tiempo de estancia: </strong>'.$dias.' días <strong> No. Orden: </strong>'. $relevantes->Orden.'<br>';
                        echo '<strong>Equipo: </strong>'.$relevantes->Equipo.' <strong>Falla: </strong>'.$relevantes->Falla.'<br>';
                        echo '<strong>Asignado: </strong>'.$relevantes->Asignado;
                    }else{
                        echo $relevantes->Empresa.' '.$relevantes->Nombre.' '.$relevantes->Paterno.' '.$relevantes->Materno.' <strong>Macro: </strong>'.$relevantes->Macro.'<br>';
                        echo '<strong>Fecha de recepción:</strong> '.$Fecha.' <strong>Tiempo de estancia: </strong>'.$dias.' días <strong> No. Orden: </strong>'. $relevantes->Orden.'<br>';
                        echo '<strong>Equipo: </strong>'.$relevantes->Equipo.' <strong>Falla: </strong>'.$relevantes->Falla.'<br>';
                        echo '<strong>Asignado: </strong>'.$relevantes->Asignado;
                    }
                }?>
        </div>
        <script>
            var dias = <?php echo $dias?>;
            
            if(dias <= 7){
                document.getElementById('barra').style.background="#d3d3d3";
            }else if(dias > 7 && dias <= 14){
                document.getElementById('barra').style.background="#dbdf23";
            }else if(dias > 14){
                document.getElementById('barra').style.background="#6b0404";
                document.getElementById('barra').style.color="white";
            }
    
        </script>

    <?php }?>

    <br><br><br>

<div class="container box" id="advanced-search-form">
    <div class="container box" id="advanced-search-form-1" style="margin-top: 40px;">
        <div class="btn-group" role="group" aria-label="Third group">
            <a href="<?php echo base_url('Ordenes/index')?>" class="btn btn-outline-success float-right">Registrar</a>
        </div>
        <div class="btn-group" role="group" aria-label="Third group">
            <a href="<?php echo base_url('Ordenes/consultar')?>" class="btn btn-outline-primary float-light">Consultar</a>
        </div>
        <?php if($perfil == "Administrador"){?>
            <div class="btn-group" role="group" aria-label="Third group">
                <a href="<?php echo base_url('Ordenes/reasignar')?>" class="btn btn-outline-primary float-light">Reasignar</a>
            </div>
        <?php }?>
    </div>
    <h1 align="center" style="margin-top: 10px;">Consultar</h1>
    <div class="table-responsive">
        <form class="form-inline" Id="FrmBuscaOrden" name="FrmBuscaOrden" action="<?php echo base_url('Ordenes/busquedas')?>" method="POST">
            <div class="form-group col-md-4">
                <label for="TipoBusqueda">Buscar por:</label>
                <select class="form-control" id="TipoBusqueda" name="TipoBusqueda" onchange="busquedaorden();">
                    <option value="Orden">No.Orden</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Serie">No.Serie</option>
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

                    <button class="btn btn-outline-success col-md-4" type="submit">Buscar</button>
                </nav>
            </table>
        </form>
    </div>
        
    <?php if( $conteo > 1){ ?>
        <div class="container box col-md-12" id="advanced-search-form">
            <table class="table table-bordered" id="tblOrdenes" name="tblOrdenes" width="100%" cellspacing="0">
                <thead class="thead-light">
                <h1 align="center">Ordenes encontradas</h1>
                    <tr>
                        <th><center>No. Orden</center></th>
                        <th><center>Nombre</center></th>
                        <th><center>Teléfono</center></th>
                        <th><center>Tipo de equipo</center></th>
                        <th><center>No. Serie</center></th>
                        <th><center>Marca</center></th>
                        <th><center>Modelo</center></th>
                        <th><center>Estatus</center></th>
                        <th><center>Lugar</center></th>
                        <th><center>Fecha</center></th>
                        <th><center>Hora</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orden as $datos){?>
                        <tr>
                            <td><center><a href="<?php echo base_url('Ordenes/buscar/').$datos->Orden?>"> <?php echo $datos->Orden?> </a></center></td>
                            <td><center><?php echo $datos->Nombre?></center></td>
                            <td><center><?php echo $datos->Telefono?></center></td>
                            <td><center><?php echo $datos->Equipo?></center></td>
                            <td><center><?php echo $datos->Serie?></center></td>
                            <td><center><?php echo $datos->Marca?></center></td>
                            <td><center><?php echo $datos->Modelo?></center></td>
                            <td><center><?php echo $datos->Estatus?></center></td>
                            <td><center><?php echo $datos->Lugar?></center></td>
                            <td><center><?php echo $Fecha?></center></td>
                            <td><center><?php echo $datos->Hora?></center></td>
                        </tr>
                    <?php }?>
                </tbody> 
            </table>
        </div>
    <?php }else{?>
    
    <div class="container box col-md-12" id="advanced-search-form">
        <h1 align="center">Datos de orden</h1>
        
        <?php foreach($orden as $datos){?>
            <?php if(isset($datos->IdCliente)){?>
                <div class="form-row">
                    <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
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
                        <label>Urgente</label>
                        <p><?php if($datos->Prioridad == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Garantia</label>
                        <p><?php if($datos->Garantia == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Reincidencia</label>
                        <p><?php if($datos->Reincidencia == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Equipo Intervenido</label>
                        <p><?php if($datos->Intervenido == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Respaldo de información</label>
                        <p><?php if($datos->Respaldo == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                    </div>

                    <?php if($datos->Equipo == 'PC-Escritoio' || $datos->Equipo == 'Todo en uno' || $datos->Equipo == 'Laptop'){?>
                        <div class="form-group col-md-4">
                            <label>Respaldo</label>
                            <p><?php if($datos->Respaldo == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                        </div>
                    <?php }?>

                    <?php if($datos->Equipo == 'Impresora' || $datos->Equipo == 'Copiadora'){?>
                        <div class="form-group col-md-4">
                            <label>Tinta regada</label>
                            <p><?php if($datos->Tinta == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Toner disperso</label>
                            <p><?php if($datos->Toner == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Cartuchos faltantes</label>
                            <p><?php if($datos->Cartuchos == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                        </div>
                    <?php }?>

                    <div class="form-group col-md-4">
                        <label>Contraseña</label>
                        <p><?php echo $datos->Pass?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Estatus</label>
                        <p><?php echo $datos->Estatus?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lugar</label>
                        <p><?php echo $datos->Lugar?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Costo</label>
                        <p><?php echo $datos->Costo?></p>
                    </div>
                </div>
            <?php }else{?>
                <div class="form-row">
                    <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
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
                        <label>Urgente</label>
                        <p><?php if($datos->Prioridad == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Garantia</label>
                        <p><?php if($datos->Garantia == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Reincidencia</label>
                        <p><?php if($datos->Reincidencia == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                    </div>

                    <?php if($datos->Equipo == "PC-Escritorio" || $datos->Equipo == "Todo en uno" || $datos->Equipo == "Laptop"){?>
                        <div class="form-group col-md-4">
                            <label>Respaldo</label>
                            <p><?php if($datos->Respaldo == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                        </div>
                    <?php }?>

                    <?php if($datos->Equipo == "Impresora" || $datos->Equipo == "Copiadora"){?>
                        <div class="form-group col-md-4">
                            <label>Tinta regada</label>
                            <p><?php if($datos->Tinta == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Toner disperso</label>
                            <p><?php if($datos->Toner == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Cartuchos faltantes</label>
                            <p><?php if($datos->Cartuchos == 1 ){echo 'Sí';}else{echo 'No';}?></p>
                        </div>
                    <?php }?>

                    <div class="form-group col-md-4">
                        <label>Contraseña</label>
                        <p><?php echo $datos->Pass?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Estatus</label>
                        <p><?php echo $datos->Estatus?></p>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label>Lugar</label>
                        <p><?php echo $datos->Lugar?></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Costo</label>
                        <p><?php echo $datos->Costo?></p>
                    </div>
                </div>
            <?php }?>
                <div class="btn-group" role="group" aria-label="Third group">
                    <a href="<?php echo base_url('Ordenes/verorden/').$datos->Orden?>" target="_blank" class="btn btn-outline-primary float-light">Imprimir Orden</a>
                </div>
        <?php }?>
    </div>
    <?php }?>
    <br>

    <?php if($perfil == "Administrador"){?>
        <div class="container box col-md-12" id="advanced-search-form">
            <form name="FrmAgregarComentario" Id="FrmAgregarComentario" method="post" action="<?php echo base_url('Seguimiento/registrar')?>" method="post">
                <div class="form-group col-md-4">
                    <input type="hidden" name="txtIdOrden" Id="txtIdOrden" value="<?php echo $datos->Orden?>">
                    <label for="cmbTComentario">Tipo de comentario</label>
                    <select class="form-control" id="cmbTComentario" name="cmbTComentario">
                        <option value="0" selected>Seleccione una opción</option>
                        <option value="Información interna" >Información interna</option>
                        <option value="Mostrar al cliente">Mostrar al cliente</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                    <label for="Comentario">Comentario</label>
                    <input type="text" class="form-control" id="Comentario" name="Comentario" placeholder="Comentario" required>
                </div>
                <br> 

                <div class="form-row">
                    <?php if($perfil == "Técnico"){?>
                        <div class="container"></div>
                            <div class="form-group col-md-4">
                                <label for="cmbEstatus">Estatus del equipo:</label>
                                <select class="form-control" id="cmbEstatus" name="cmbEstatus">
                                    <option value="0" selected> Seleccione una opción</option>
                                    <option value="Revisado"> Revisado </option>
                                    <option value="En espera de piezas"> En espera de piezas </option>
                                    <option value="Terminado"> Terminado</option>
                                    <option value="Terminado sin reparar"> Terminado sin reparar </option>
                                </select>
                            </div>
                        </div>
                    <?php } else{ echo '<input type="hidden" name ="cmbEstatus" Id="cmbEstatus" value="'.$datos->Estatus.'">';}?>
                    

                    <button name="Agregar" Id="Agregar" type="submit" onclick="return Seguimiento();" class="btn btn-success col-md-2">Agregar</button>
                    <br>
                </div>
            </form>
        </div>
    <?php }?>

    <?php if($conteo < 2){?>
        <div class="container box col-md-12" id="advanced-search-form">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                <h1 align="center">Comentarios</h1>
                    <tr>
                        <th><center>Tipo de comentario</center></th>
                        <th><center>comentario</center></th>
                        <th><center>Estatus</center></th>
                        <th><center>Usuario</center></th>
                        <th><center>Fecha</center></th>
                        <th><center>Hora</center></th>
                    </tr>
                </thead>
                <tbody>
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
                            <td><center><?php echo $seg->Iniciales?></center></td>
                            <td><center><?php echo $Fecha?></center></td>
                            <td><center><?php echo $seg->Hora?></center></td>
                        </tr>
                    <?php }?>
                </tbody> 
            </table>
            <?php if($perfil == "Administrador"){?>
                <a href="<?php echo base_url('Ordenes/entregar/').$datos->Orden?>"  class="btn btn-success col-md-4">Entregar equipo</a>
            <?php }?>
        </div>
    <?php }?>
</div>

<script src="<?php echo base_url('public/dist/js/personalizado.js')?>"></script>
<script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>