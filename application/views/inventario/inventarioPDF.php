<head>
    <link rel="stylesheet" href="<?php echo base_url('public/dist/css/inventariopdf.css');?>">
</head>
<body>
    <?php foreach($inventario as $inv){?>
        <?php
            $formatofecha = strtotime($inv->FechaInicio);
            $Anio = date("Y", $formatofecha);
            $Mes = date("m", $formatofecha);
            $Dia = date("d", $formatofecha);
            $Fecha = $Dia ."/". $Mes ."/". $Anio;
        ?>
    <div id="container">
        <header>
            <table>
                <tr>
                    <td><img src="<?php echo base_url('public/dist/img/trevicom.png')?>" width="150" height="70"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><center><h3>INVENTARIO DE EQUIPOS</h3></center></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <center>
                            <h6>Número de inventario</h6>
                            <p><?php echo $inv->IdInventario?></p>
                        </center>
                    </td>
                </tr>
            </table>
            <p><strong>Supervisor: </strong> <?php echo $inv->NombreSupervisor?> <strong>Jefe de departamento: </strong> <?php echo $inv->NombreEncargado?> <strong>Fecha: </strong><?php echo $Fecha?></p>
        </header>
        <br>
        <section class="inventario">
            <table width="100%" cellspacing="0">
                <thead class="tencabezado">
                <tr>
                    <th><center>Tipo de equipo</center></th>
                    <th><center>No. de orden</center></th>
                    <th><center>Marca</center></th>
                    <th><center>Modelo</center></th>
                    <th><center>No. de serie</center></th>
                    <th><center>Lugar de servicio</center></th>
                    <th><center>Existente</center></th>
                    <th><center>No encontrado</center></th>
                </tr>
                </thead>
                <tbody class="tcuerpo">
                <?php foreach($ordenes as $ord){?>
                    <tr>
                        <td><center><?php echo $ord->TipoEquipo?></center></td>
                        <td><center><?php echo $ord->Orden?></center></td>
                        <td><center><?php echo $ord->Marca?></center></td>
                        <td><center><?php echo $ord->Modelo?></center></td>
                        <td><center><?php echo $ord->Serie?></center></td>
                        <td><center><?php echo $ord->Lugar?></center></td>
                        <td>
                        <center>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox">
                      
                            </div>
                        </center>
                        </td><td>
                        <center>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox">
                            </div>
                        </center>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </section>
    </div>
    <?php }?>
</body>