<div class="container box" id="advanced-search-form">
    <h1 align="center">Reportes</h1>
        <form name="FrmReporte" Id="FrmReporte" action="<?php echo base_url('Reportes/reporte')?>" method="post">
        <?php foreach($partidas as $part){ $Idcot = $part->IdCotizacion;}?>
            <div class="form-row">
                <input type="hidden" class="form-control" id="Cotizacion" name="Cotizacion" value="<?php echo $Idcot;?>">
                <div class="container"></div>           
                    <?php if($perfil == "Administrador"){?>
                        <div class="form-group col-md-6">
                            <label for="cmbIng">Nombre de tecnico:</label>
                            <select class="form-control" id="cmbIng" name="cmbIng">
                                <option value="0">Selecciones a un ingeniero</option>
                                <?php foreach($ing as $Ing){?>
                                    <option value="<?php echo $Ing->Iniciales?>"><?php echo $Ing->Nombre.' '.$Ing->Iniciales?></option>
                                <?php }?>
                            </select>
                        </div>
                    <?php }?>
                    <div class="form-group col-md-6">
                        <label for="cmbEstatus">Tipo de reporte:</label>
                        <select class="form-control" id="cmbEstatus" name="cmbEstatus">
                            <option value="0">Selecciones un estatus</option>
                            <option value="Sin revisar">Sin revisar</option>
                            <option value="En reparación">En Reparación</option>
                            <option value="Revisado">Revisado</option>
                            <option value="Terminado">Terminado</option>
                            <option value="En espera de piezas">En espera de piezas</option>
                            <option value="Terminado sin reparar">Terminado sin reparar</option>
                            <option value="Urgente">Urgente</option>
                            <option value="Garantía">Garantía</option>
                            <option value="Reincidencia">Reincidencia</option>
                        </select>
                    </div>
                    <button name="Ingresar" Id="Ingresar" type="submit" onclick="return Reportes();" class="btn btn-danger col-md-6">Generar Reporte</button>
                </div>
            </div>
        </form>
</div>

<br>
<div style="width: 97%; margin-left:100px;">
    <div class="table-responsive">
        <form Id="FrmCalcularCotizacion" name="FrmCalcularCotizacion" action="<?php echo base_url('Cotizaciones/Calcular')?>" method="post">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th><center>No.</center></th>
                        <th><center>Cantidad</center></th>
                        <th><center>Descripción</center></th>
                        <th><center>Precio en US</center></th>
                        <th><center>Tipo de cambio</center></th>
                        <th><center>Costo en MN</center></th>
                        <th><center>% de Margen</center></th>
                        <th><center>Flete</center></th>
                        <th><center>Utilidad</center></th>
                        <th><center>Proveedor</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $No=1;
                        foreach($partidas as $par){ ?>

                        <tr>
                            <td><center><?php echo $No?></center></td>
                            <td><center><?php echo $par->Cantidad?></center></td>
                            <td><center><?php echo $par->Descripcion?></center></td>
                            <td><center><input type="text" id="PrecioUS-<?php echo $No;?>" name="PrecioUS[]" class="form-control" placeholder="Precio Us"></center></td>
                            <td><center><input type="text" id="TipoCambio-<?php echo $No;?>" name="TipoCambio[]" class="form-control" placeholder="Tipo de Cambio"></center></td>
                            <td><center><input type="text" onfocus="costomx();" id="CostoMN-<?php echo $No;?>" name="CostoMN[]" class="form-control" placeholder="Costo MN"></center></td>

                            <td><center><input type="text" id="Margen-<?php echo $No;?>" name="Margen[]" class="form-control" placeholder="% Margen"></center></td>
                            <td><center><input type="text" id="Flete-<?php echo $No;?>" name="Flete[]" class="form-control" placeholder="Flete"></center></td>
                            <td><center><input type="text" onfocus="utilidad();" id="Utilidad-<?php echo $No;?>" name="Utilidad[]" class="form-control" placeholder="Utilidad"></center></td>
                            <td><center><input type="text" id="Proveedor-<?php echo $No;?>" name="Proveedor[]" class="form-control" placeholder="Proveedor"></center></td>
                        
                            <td>
                                <center>
                                    <div class="btn-group" role="group" aria-label="Third group">
                                        <a onclick="if(confirma() === false) return false" href="<?php echo base_url('Cotizaciones/eliminar/').$par->IdPartida.'/'.$par->IdCotizacion?>" class="btn btn-outline-danger">Eliminar</a>
                                    </div>
                                </center>
                            </td>
                            <td>
                                <input type="hidden" name="Cantidad[]" value="<?php echo $par->Cantidad?>">
                                <input type="hidden" name="IdPartida[]" value="<?php echo $par->IdPartida?>">
                            </td>
                            
                        </tr>
                        <tr> 
                            <td colspan="10"><textarea class="form-control" name="Comentario[]" id="Comentario-<?php echo $No;?>" cols="30" rows="3"></textarea></td>
                        </tr>
                            
                    <?php $No++; }?>
                </tbody>
            </table>
            
            <div class="container box">
                <input type="hidden" name="tamanio" value="<?php echo $No?>">
                <input type="hidden" name="IdCotizacion" value="<?php echo $par->IdCotizacion?>">
                <button type="submit" name="agrCot" Id="agrCot" onclick="return calcular(<?php echo $No?>);" class="btn btn-success col-md-3 float-right">Guardar</button>
            </div>
        </div>
    </form>
    </div>
</div>
<script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>
<script src="<?php echo base_url('public/dist/js/personalizado.js')?>"></script>
