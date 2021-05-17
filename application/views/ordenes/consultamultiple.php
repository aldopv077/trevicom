<script>
    window.addEventListener('load', function () {
        document.getElementById('NoOrden').style.display="block";
        document.getElementById('NomCliente').style.display="none";
        document.getElementById('NomEmpresa').style.display="none";
        document.getElementById('NoSerie').style.display="none";

      });
</script>

<div class="container box" id="advanced-search-form-1">
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

<div class="container box" id="advanced-search-form">
    <h1 align="center">Consultar</h1>
    <div class="table-responsive">
        <form class="form-inline" Id="FrmBuscaOrden" name="FrmBuscaOrden" action="<?php echo base_url('Ordenes/busquedas')?>" method="POST">
            <div class="form-group col-md-4">
                <label for="TipoBusqueda">Buscar por:</label>
                <select class="form-control" id="TipoBusqueda" name="TipoBusqueda" onchange="busquedaorden();">
                    <option value="Orden">No.Orden</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Telefono">Telefono</option>
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
                        <th><center>Fecha</center></th>
                        <th><center>Hora</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orden as $datos){?>
                        <tr>
                            <td><center><a href="<?php echo base_url('Ordenes/buscar/').$datos->Orden?>"> <?php echo $datos->Orden?> </a></center></td>
                            <td><center><?php echo $datos->Nombre?></center></td>
                            <td><center><?php echo $datos->Equipo?></center></td>
                            <td><center><?php echo $datos->Telefono?></center></td>
                            <td><center><?php echo $datos->Serie?></center></td>
                            <td><center><?php echo $datos->Marca?></center></td>
                            <td><center><?php echo $datos->Modelo?></center></td>
                            <td><center><?php echo $datos->Estatus?></center></td>
                            <td><center><?php echo $datos->Fecha?></center></td>
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
                        <p><?php echo $datos->Telefono?></p>
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
                </div>
            <?php }?>
        <?php }?>
    </div>
    <?php }?>
    <br>

    <?php if($perfil == "Administrador"){?>
        <div class="container box col-md-12" id="advanced-search-form">
            <form name="FrmComentario" Id="FrmComentario" method="post" action="" class="form-inline">
                <div class="form-group col-md-4">
                    <label for="cmbTipoComentario">Tipo de comentario</label>
                    <select class="form-control" id="cmbTipoComentario" name="cmbTipoComentario">
                        <option value="0" selected>Seleccione una opción</option>
                        <option value="Información interna" >Información interna</option>
                        <option value="Mostrar al cliente">Mostrar al cliente</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                    <label for="inputNo.Serie"></label>
                    <input type="" class="form-control" id="comentario" name="comentario" placeholder="Comentario">
                </div>
                <br> 
                <div class="form-row">
                    <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
                    <div class="container"></div>
                        <div class="form-group col-md-4">
                            <label for="cmbEstado">Estatus del equipo:</label>
                            <select class="form-control" id="cmbEstado" name="cmbEstado">
                                <option value="0" selected> Seleccione una opción</option>
                                <option value="En reparación"> En reparación </option>
                                <option value="En espera de piezas"> En espera de piezas </option>
                                <option value="Listo para entregar"> Listo para entrega </option>
                                <option value="Terminado sin reparar"> Terminado sin reparar </option>
                            </select>
                        </div>
                    </div>
                    <button name="Agregar" Id="Agregar" type="submit" class="btn btn-success col-md-2">Agregar</button>
                    <br>
                </div>
            </form>
        </div>
    <?php }?>

    
    <div class="container box col-md-12" id="advanced-search-form">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
            <h1 align="center">Comentarios</h1>
                <tr>
                    <th>
                        <center>Tipo de comentario</center>
                    </th>
                    <th>
                        <center>comentario</center>
                    </th>
                    <th>
                        <center>Usuario</center>
                    </th>
                    <th>
                        <center>Fecha</center>
                    </th>
                    <th>
                        <center>Hora</center>
                    </th>
                </tr>
            </thead>
            <tbody>
          
            </tbody> 
        </table>
    </div>
</div>

<script src="<?php echo base_url('public/dist/js/personalizado.js')?>"></script>