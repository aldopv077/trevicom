        <h1 align="center">Estadística de equipos</h1>
        <div class="container box" id="advanced-search-form">
        
            <h3 align="center">Mis equipos</h3>
            <div class="table-responsive">
        
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th><center><strong>Estado de equipos</strong></center></th>
                            <th><center>Cantidad</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $SinRevisar = 0;
                            $Revisado = 0;
                            $Detenido = 0;
                            $EsperaPzas = 0;
                            $Terminado = 0;
                            $TerminadoSR = 0;
                            $Total = 0;

                            $ordenes = $ordenes;

                            for($x=0; $x < sizeof($ordenes); $x++){
                                switch($ordenes[$x]->Estatus){
                                    case "Sin revisar":
                                            $SinRevisar = $SinRevisar + 1; 
                                        break;
                                    case "Revisado":
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

                            $Total = $SinRevisar + $Revisado + $EsperaPzas + $Terminado + $TerminadoSR;
                            
                            ?>
                            <tr>
                                <td><center><strong><a href="<?php echo base_url('Reportes/ereporte/').$this->session->userdata('Iniciales').'/SinRevisar'?>">Sin revisar</a></strong></center></td>
                                <td><center><?php echo $SinRevisar?></center></td>
                            </tr> 
                            <tr>
                                <td><center><strong><a href="<?php echo base_url('Reportes/ereporte/').$this->session->userdata('Iniciales').'/EnReparación'?>">En reparación</a></strong></center></td>
                                <td><center><?php echo $Revisado?></center></td>
                            </tr>  
                            <tr>
                                <td><center><strong><a href="<?php echo base_url('Reportes/ereporte/').$this->session->userdata('Iniciales').'/Detendio'?>">Detenido</a></strong></center></td>
                                <td><center><?php echo $Detenido?></center></td>
                            </tr> 
                            <tr>
                                <td><center><strong><a href="<?php echo base_url('Reportes/ereporte/').$this->session->userdata('Iniciales').'/EsperaPzas'?>">En espera de piezas</a></strong></center></td>
                                <td><center><?php echo $EsperaPzas?></center></td>
                            </tr> 
                            <tr>
                                <td><center><strong><a href="<?php echo base_url('Reportes/ereporte/').$this->session->userdata('Iniciales').'/Terminado'?>">Terminado</a></strong></center></td>
                                <td><center><?php echo $Terminado?></center></td>
                            </tr> 
                            <tr>
                                <td><center><strong><a href="<?php echo base_url('Reportes/ereporte/').$this->session->userdata('Iniciales').'/TerminadoSR'?>">Terminado sin reparar</a></strong></center></td>
                                <td><center><?php echo $TerminadoSR?></center></td>
                            </tr> 
                            <tr>
                                <td><center><strong>TOTAL DE EQUIPOS</strong></center></td>
                                <td><center><?php echo $Total?></center></td>
                            </tr> 
                    </tbody>
                </table>
            </div>
        </div>