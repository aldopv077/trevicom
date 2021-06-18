
    <body>
        <htmlpageheader name="MyHeader1">
            <header>
                <?php foreach($orden as $ord){?>
                    <?php if(isset($ord->IdEmpresa)){?>
                        <div class="datos">
                            <p><strong>Cliente: </strong> <?php echo $ord->Empresa?> </p>
                            <!--<p><strong>At´n</strong> <?php //echo $ord->Nombre.' '.$ord->Paterno.' '.$ord->Materno?> </p>-->
                            <p><strong>presente</strong></p>
                            
                            <p><strong>E-mail</strong> <?php echo $ord->Correo?> </p>
                            <p><strong>Tel. Empresa: </strong> <?php echo $ord->TelEmpresa?> </p>
                            <p><strong>Tel: </strong> <?php echo $ord->TelContacto?> </p>
                        </div>
                        <div class="imagenes1">
                            <img Id="Logo" src="<?php echo base_url('public/dist/img/trevicom.png')?>" alt="">
                            <img Id="Miercoles" src="<?php echo base_url('public/dist/img/Miercoles.png')?>" alt="">
                            <img Id="Aplify" src="<?php echo base_url('public/dist/img/Aplify.png')?>" alt="">
                        </div>
                        <div class="Datoscot">
                            <p><strong>O.S:</strong><?php echo $ord->Orden?></p>
                            <p><strong>Fecha: </strong> <?php echo $fecha?> </p>
                            <p><strong>Cotización: </strong> I-<?php echo $Id?></p>
                        </div>
                        <div class="imagenes2">
                            <img Id="HP" src="<?php echo base_url('public/dist/img/HP.png')?>" alt="">
                        </div>
                        <div class="imagenes3">
                            <img Id="Tienda" src="<?php echo base_url('public/dist/img/Tienda.png')?>" alt="">
                        </div>
                    <?php }else{?>
                        <div class="datos">
                            <p><strong>Cliente: </strong> <?php echo $ord->Nombre.' '.$ord->Paterno.' '.$ord->Materno?> </p>
                            <!--<p><strong>At´n</strong> ------- </p>-->
                            <p><strong>presente</strong></p>
                            
                            <p><strong>E-mail</strong> <?php echo $ord->Correo?> </p>
                            <p><strong>Tel: </strong> <?php echo $ord->Telefono?> </p>
                        </div>
                        <div class="imagenes1">
                            <img Id="Logo" src="<?php echo base_url('public/dist/img/trevicom.png')?>" alt="">
                            <img Id="Miercoles" src="<?php echo base_url('public/dist/img/Miercoles.png')?>" alt="">
                            <img Id="Aplify" src="<?php echo base_url('public/dist/img/Aplify.png')?>" alt="">
                        </div>
                        <div class="Datoscot">
                            <p><strong>O.S:</strong><?php echo $ord->Orden?></p>
                            <p><strong>Fecha: </strong> <?php echo $fecha?></p>
                            <p><strong>Cotización: </strong> I-<?php echo $Id?></p>
                        </div>
                        <div class="imagenes2">
                            <img Id="HP" src="<?php echo base_url('public/dist/img/HP.png')?>" alt="">
                        </div>
                        <div class="imagenes3">
                            <img Id="Tienda" src="<?php echo base_url('public/dist/img/Tienda.png')?>" alt="">
                        </div>
                    <?php }?>
                <?php }?>
            </header>
            <div class="separador"></div>
            <div>
                <p>EN RESPUESTA A SU SOLICITUD DE COTIZACIÓN Y CONSIDERANDO SATISFACER SUS NECESIDADES DE CALIDAD Y PRECIO HEMOS
                SELECCIONADO LOS SIGUIENTES EQUIPOS ESPERANDO SEAN DE SU AGRADO.</p>
            </div>
        
        </htmlpageheader>
        <htmlpagefooter name="MyFooter1">
            
            <section class="Totales">
                <table>
                    <thead class="tencabezado">
                        <tr>
                            <td><strong>Importe sin Iva</strong></td>
                            <td><strong>Total con Iva</strong></td>
                        </tr>
                    </thead>
                    <tbody class="tcuerpo">
                        <?php foreach($cotizacion as $cot){?>
                            <tr>
                                <td><?php echo '$'.$cot->SubTotal?></td>
                                <td><?php echo '$'.$cot->Total?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </section>     
            <footer>
                <div class="condiciones">
                    <ol>
                        <li>1.Tipo de Moneda: Moneda Nacional</li>
                        <li><strong>2. Vifencia de precios:</strong> Sujeta a cambios sin previo aviso</li>
                        <li>3. Forma de pago: 80% anticipo y el resto a la entrega.</li>
                        <li>4. NO hay CANCELACIONES, CAMBIOS NI DEVOILUONES</li>
                        <li>5. En software <b>NO</b> ahy devoluciones <b>NI </b> cancelaciones</li>
                        <li>6. No incluye instalación/configuración en los equipos y/o componentes cotizados</li>
                        <li><strong>7. Es importante nos notifique en caso de realizar su pago, de ser medenate transferencia electrónica por favor haga rederencla al N°</strong></li>
                        <li><string>8. Imagenes para fines ilustrativos, pueden varial del producto real. </string></li>
                    </ol>
                </div>
                <div class="banca">
                    <table>
                        <thead class="tencabezado">
                            <tr>
                                <td colspan="2"><strong>Datos Bancarios</strong></td>
                            </tr>
                        </thead>
                        <tr>
                            <td><strong>Nombre:</strong></td>
                            <td>Treviño Computación S.A de C.V</td>
                        </tr>
                        <tr>
                            <td><strong>RFC:</strong></td>
                            <td>TCO 970528 7E4</td>
                        </tr>
                        <tr>
                            <td><strong>Banco:</strong></td>
                            <td>Banamex</td>
                        </tr>
                        <tr>
                            <td><strong>N° de sucursal</strong></td>
                            <td>7012</td>
                        </tr>
                        <tr>
                            <td><strong>N° de cuenta</strong></td>
                            <td>5454354</td>
                        </tr>
                        <tr>
                            <td><strong>Clabe</strong></td>
                            <td>002840701254543540</td>
                        </tr>
                    </table>
                </div>
    
                <div class="firma">
                    <p><strong>A T E N T A M E N T E</strong></p>
                    <p><strong>Ing. <?php echo $cot->Nombre.' '.$cot->Paterno.' '.$cot->Materno?></strong></p>
                    <p>228 817 93 92 Ext 113</p>
                </div>
            </footer>
        </htmlpagefooter>
        <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
        <sethtmlpagefooter name="MyFooter1" value="on" />

        
        <div>
            <section class="partidas">
                <table>
                    <thead class="tencabezado">
                        <td><strong>No.</strong></td>
                        <td><strong>Cant</strong></td>
                        <td><strong>Descripción</strong></td>
                        <td><strong>U. de Medida</strong></td>
                        <td><strong>Precio Unit. sin IVA</strong></td>
                        <td><strong>Importe sin IVA</strong></td>
                        <td><strong>Total con IVA</strong></td>
                    </thead>
                    <tbody class="tcuerpo">
                        <?php 
                            $No=1;
                            foreach($partidas as $part){?>
                            <tr>
                                <td><center><?php echo $No?></center></td>
                                <td><center><?php echo $part->Cantidad?></center></td>
                                <td><strong><?php echo $part->Descripcion?></strong></td>
                                <td><center>PZA</center></td>
                                <td><center><?php echo '$'.$part->PrecioUnitario?></center></td>
                                <td><center><?php echo '$'.$part->PrecioSinIva?></center></td>
                                <td><center><?php echo '$'.$part->PrecioIva?></center></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="4"><?php echo $part->Comentario.'<br>'?></td>
                            </tr>
                        <?php 
                            $No++; 
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>  
                    </tfoot>
                </table>
            </section>
        <!--<div>Start of the document ... and all the rest</div>-->
        </div>
    </body>
