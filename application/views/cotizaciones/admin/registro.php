<div class="container box" id="advanced-search-form-1">
  <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Cotizaciones/index')?>" class="btn btn-outline-primary float-light">Consultar</a>
  </div>
</div>

<div class="container box" id="advanced-search-form">
    <?php foreach($orden as $relevantes){
        if(isset($relevantes->IdCliente)){
            echo '<h2 align="center"> Cotización de la orden: '. $relevantes->Orden.'</h2>';
            echo $relevantes->Nombre.' '.$relevantes->Paterno.' '.$relevantes->Materno.' <strong>Macro: </strong>'.$relevantes->Macro.'<br>';
            echo '<strong>Equipo: </strong>'.$relevantes->Equipo.' <strong>Marca: </strong>'.$relevantes->Marca.'<strong> Modelo: </strong>'.$relevantes->Modelo.' <strong>Falla: </strong>'.$relevantes->Falla.'<br>';
            echo '<strong>Asignado: </strong>'.$relevantes->Asignado;
        }else{
            echo '<h2 align="center"> Cotización de la orden: '. $relevantes->Orden.'</h2>';
            echo $relevantes->Empresa.' '.$relevantes->Nombre.' '.$relevantes->Paterno.' '.$relevantes->Materno.' <strong>Macro: </strong>'.$relevantes->Macro.'<br>';
            echo '<strong>Equipo: </strong>'.$relevantes->Equipo.' <strong>Marca: </strong>'.$relevantes->Marca.'<strong> Modelo: </strong>'.$relevantes->Modelo.' <strong>Falla: </strong>'.$relevantes->Falla.'<br>';
            echo '<strong>Asignado: </strong>'.$relevantes->Asignado;
        }
    }?>
        
    
</div>

<br>
<div style="width: 97%; margin-left:100px;">
    <div class="table-responsive">
        <form Id="FrmCalcularCotizacion" name="FrmCalcularCotizacion" action="<?php echo base_url('Cotizaciones/agrCostos')?>" method="post">
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
                        <th colspan="3"><center>Acciones</center></th>
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
                                <input type="hidden" name="Cantidad[]" id="Cantidad-<?php echo $No?>" value="<?php echo $par->Cantidad?>">
                                <input type="hidden" name="IdPartida[]" value="<?php echo $par->IdPartida?>">
                                <input type="hidden" name="PrecioUnitario[]" Id="PrecioUnitario-<?php echo $No?>">
                            </td>
                            
                        </tr>
                        <tr style="background: #d3d3d3d3;">
                            <td colspan="7"><center><strong>Comentario</strong></center></td>
                            <td colspan="2"><center><strong>Importe sin IVA</strong> </center></td>
                            <td><center><strong>Total con IVA</strong></center></td>
                        </tr>
                        <tr> 
                            <td colspan="7">
                                <textarea class="form-control" name="Comentario[]" id="Comentario-<?php echo $No;?>" cols="30" rows="3"></textarea>
                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control" name="SubTotalPart[]" Id="SubTotal-<?php echo $No;?>"placeholder="Importe sin IVA">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="TotalPart[]" Id="Total-<?php echo $No;?>"placeholder="Total con IVA">
                            </td>
                        </tr>
                    <?php $No++; }?>
                    <tr style="background: #d3d3d3;">
                        <td colspan="7"></td>
                        <td colspan="2"><strong>Importe Total sin IVA</strong></td>
                        <td><strong>Importe Total con IVA</strong></td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                        <td colspan="2"><input type="text" class="form-control" name="SubTotal" id="SubTotal" placeholder="Importe sin IVA"></td>
                        <td><input type="text" class="form-control" name="Total" id="Total" placeholder="Total con IVA"></td>
                        <td>
                                <center>
                                    <div class="btn-group" role="group" aria-label="Third group">
                                        <buttom onclick="totales(<?php echo sizeof($partidas)?>);" href="" class="btn btn-success" Id="btnCalcular">Cálcular</buttom>
                                    </div>
                                </center>
                            </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="container box">
                <input type="hidden" name="tamanio" value="<?php echo $No?>">
                <input type="hidden" name="IdCotizacion" value="<?php echo $par->IdCotizacion?>">
                <button type="submit" name="agrCot" Id="agrCot" onclick="return habilitaTotales(<?php echo $No?>);" class="btn btn-success col-md-3 float-right" target="_blank">Guardar</button>
            </div>
        </div>
    </form>
    </div>
</div>
<script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>
<script src="<?php echo base_url('public/dist/js/personalizado.js')?>"></script>
