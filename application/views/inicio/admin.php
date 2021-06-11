<h1 align="center">Estadística de equipos</h1>
        <div class="container box" id="advanced-search-form">
            <div class="table-responsive">
        
            <?php
            $SinRevisar = 0;
			$Revisado = 0;
			$EsperaPzas = 0;
			$Terminado = 0;
			$TerminadoSR = 0;
            $Detenido = 0;
            $Total = 0;

            $usuarios = $Usuarios;
            $ordenes = $Ordenes;
            
            for($z=0;$z < sizeof($usuarios); $z++){
				for($y=0; $y < sizeof($ordenes); $y++){
					if($ordenes[$y]->Asignado == $usuarios[$z]->Iniciales){
						switch($ordenes[$y]->Estatus){
							case "Sin revisar":
									$SinRevisar = $SinRevisar + 1; 
								break;
							case "En reparación":
									$Revisado = $Revisado + 1;
								break;    
							case "Detenido":
                                $Detenido = $Detenido + 1;
                            break;
							case "En espera de piezas":
									$EsperaPzas = $EsperaPzas +1;
								break;
							case "Terminado":
									$Terminado = $Terminado +1;
								break;
							case "Terminado sin reparar":
									$TerminadoSR = $TerminadoSR +1;
								break;
						}
					}
				}
                $Total = $SinRevisar + $Revisado + $EsperaPzas + $Terminado + $TerminadoSR + $Detenido;

				//echo 'Sin revisar: '.$SinRevisar. ' Revisado: '.$Revisado.' En espera de piezas: '.$EsperaPzas.' Terminado: '.$Terminado.' Terminado sin reparar: '.$TerminadoSR;
			?>
                <h3 align="center"><?php echo $usuarios[$z]->Nombre.' '.$usuarios[$z]->Paterno.' '.$usuarios[$z]->Iniciales?></h3>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th><center><strong>Estado de equipos</strong></center></th>
                            <th><center>Cantidad</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><center><strong> <a href="<?php echo base_url('Reportes/ereporte/').$usuarios[$z]->Iniciales.'/SinRevisar';?>">Sin revisar</a></strong></center></td>
                            <td><center><?php echo $SinRevisar?></center></td>
                        </tr> 
                        <tr>
                            <td><center><strong> <a href="<?php echo base_url('Reportes/ereporte/').$usuarios[$z]->Iniciales.'/EnReparacion';?>">En reparación</a></strong></center></td>
                            <td><center><?php echo $Revisado?></center></td>
                        </tr> 
                        <tr>
                            <td><center><strong><a href="<?php echo base_url('Reportes/ereporte/').$usuarios[$z]->Iniciales.'/Detenido';?>">Detenidos</a></strong></center></td>
                            <td><center><?php echo $Detenido?></center></td>
                        </tr> 
                        <tr>
                            <td><center><strong><a href="<?php echo base_url('Reportes/ereporte/').$usuarios[$z]->Iniciales.'/EsperaPzas';?>">En espera de piezas</a></strong></center></td>
                            <td><center><?php echo $EsperaPzas?></center></td>
                        </tr> 
                        <tr>
                            <td><center><strong><a href="<?php echo base_url('Reportes/ereporte/').$usuarios[$z]->Iniciales.'/Terminado';?>">Terminado</a></strong></center></td>
                            <td><center><?php echo $Terminado?></center></td>
                        </tr> 
                        <tr>
                            <td><center><strong><a href="<?php echo base_url('Reportes/ereporte/').$usuarios[$z]->Iniciales.'/TerminadoSR';?>">Terminado sin reparar</a></strong></center></td>
                            <td><center><?php echo $TerminadoSR?></center></td>
                        </tr>
                        
                        <tr>
                            <td><center><strong>TOTAL DE EQUIPOS</strong></center></td>
                            <td><center><?php echo $Total?></center></td>
                        </tr>  
                    </tbody>
                </table>
            <?php	
				$SinRevisar = 0;
				$Revisado = 0;
                $Detenido = 0;
				$EsperaPzas = 0;
				$Terminado = 0;
				$TerminadoSR = 0;
                $Total;
			}?>
            </div>
        </div>