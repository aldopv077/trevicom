<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden PDF</title>

    <style>
        *{
            margin: 5px;
            padding: 0px;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        header{
            border: 1px solid black;
            height: 100px;
            width: 100%;
            text-align: center;
            
        }
        header img{
            margin-top: 10px;
            margin-left: 10px;
            width: 150px;
            height: 80px;
            float: left;
        }
        header h4{
            line-height: 80px;
            margin-right: 20%;
        }
        .Orden{
            text-align: right;
            margin-right: 20px;
            margin-top: -70px;
            margin-left:85%;
            /*border: 1px solid black;*/
            font-size:15pt;
        }

        .Datos{
            margin-top: 5px;
            width: 100%;
            /*border: 1px solid black;*/
        }

        .Datos .contacto{
            margin-left: 0px;
        }

        .leyenda{
            margin-top: 5px;
            width: 100%;
            /*border: 1px solid black;*/
            font-family: 'Bookman Old Style';
            font-style: italic;
            font-size: 10pt;
        }


        .condiciones ol li{
            margin-top: 0;
            margin-bottom: 0;
            font-size: 8pt;
        }
        .leyenda .firma{
            text-align: right;
            margin-right: 30px;
        }

        .redes{
            float: left;
        }

        .redes img{
            width: 25px;
            height: 25px;
            
        }

        hr{
            color: black;
            border: 2px solid black;
        }

        footer{
            font-size: 10pt;
        }
    </style>

</head>
<body>
    <?php foreach($orden as $ord){?>
    <div id="container">
        <header>
            <img src="<?php echo base_url('public/dist/img/trevicom.png')?>">
            <h4>COMPROBANTE DE RECEPCIÓN DE EQUIPO</h4>
            <div class="Orden">
                <h6>Número de orden</h6>
                <p><?php echo $ord->Orden?></p>
            </div>
        </header>

        <section class="Datos">
            <br>
            <label><strong>Cliente: </strong> <?php echo $ord->Nombre.' '.$ord->Paterno.' '.$ord->Materno?> </label><br><br>
            <label><strong>Dirección: </strong> <?php echo $ord->Calle.' #'. $ord->Exterior.' Int '.$ord->Interior.' Col. '.$ord->Col.' Ciudad de '.$ord->Ciudad?> </label><br><br>
            <div class="contacto">
                <label><strong>Teléfono: </strong> <?php echo $ord->Telefono?> </label>
                <label><strong>Celular: </strong> <?php echo $ord->Celular?> </label>
                <label><strong>Correo: </strong> <?php echo $ord->Correo?> </label>
            </div>
        </section>
        <br>
        <section class="Datos">
            <div class="contacto">
                <label><strong>Equipo: </strong> <?php echo $ord->Equipo?> </label>
                <label><strong>Núm. Producto: </strong> <?php echo $ord->NumeroEquipo?> </label>
                <label><strong>Marca: </strong> <?php echo $ord->Marca?> </label>
                <label><strong>Modelo: </strong> <?php echo $ord->Modelo?> </label>
            </div>
            <br>
            <div class="contacto">
                <label><strong>Núm. Serie: </strong> <?php echo $ord->Serie?> </label>
                <label><strong>Tipo servicio: </strong> <?php if($ord->Garantia == 1){echo 'Garantía';}else{echo 'Servicio';}?> </label>
                <label><strong>Ingeniero: </strong> <?php echo $ord->Asignado?> </label>
            </div>
            <br>
            <label><strong>Falla: </strong> <?php echo $ord->Falla?> </label><br><br>
            <label><strong>Accesorios: </strong> <?php echo $ord->Accesorios?> </label><br><br>
            <label><strong>Observaciones: </strong> <?php echo $ord->Observ?> </label><br><br>
        </section>
        <section class="leyenda">
            <p><strong>En caso de restaurar el equipo, se pierden los programas y solo se incluirá el sistema operativo original.</strong></p>
            <hr>
            <div class="condiciones">
                    <ol>
                        <li>Treviño Computación se reserva el derecho de devolver el equipo sin reparar, en caso de que existan problemas de funcionamiento aleatorio.</li>
                        <li>Treviño Computación realizará un cargo de revisión por cada equipo que ingrese al laboratorio de acuerdo a la tarifa vigente.</li>
                        <li>Treviño Computación no se hace responsable de una garantía o reparación de impresoras cuando el cliente usa consumibles no originales.</li>
                        <li>Treviño Computación no se hace responsable de una buena reparación del equipo cuando se detecte que ya viene intervenido anteriormente y/o presente modificaciones a su arquitectura original.</li>
                        <li>Los servicios de mantenimiento correctivo tienen 30 días de garantía en la mano de obra y las refacciones de acuerdo al fabricante.</li>
                        <li>Es responsabilidad del cliente respaldar los archivos de datos antes de que la computadora sea intervenida por los Ingenieros.</li>
                        <li>Al recoger el equipo, el cliente debe revisar que se encuentre completo conforme a lo especificado en su orden de recepción y firmará de conformidad, no aceptándose posteriores reclamaciones.</li>
                        <li>El cliente deberá recoger su equipo y liquidar el importe adeudado dentro de los 5 días hábiles siguientes a la fecha de notificación.</li>
                        <li>Treviño Computación no se hará responsable del equipo después de 30 días de permanencia en la empresa.</li>
                        <li>Treviño Computación solo entregará equipo cuando el cliente presente la orden de servicio original, en caso de extraviar este documento deberá presentar con copia de identificación oficial del cliente</li>
                    </ol>
                    <p><strong>NOTA: Toda Revisión causa honorarios</strong></p>  
                    
                    <p><strong> No se entregará ningún equipo si no se presenta este recibo en original. _______________________</strong></p>
                    <p class="firma"><strong>Firma del Cliente</strong></p>                                                         
                    
            </div>
        </section>
        
        <div class="redes">
            <img src="<?php echo base_url('public/dist/img/Whatsapp.png')?>"> 22-83-64-77-91 <img src="<?php echo base_url('public/dist/img/Facebook.png')?>"> Trevicom <img src="<?php echo base_url('public/dist/img/Instagram.png')?>">Treviño Computación <img src="<?php echo base_url('public/dist/img/Carrito.png"')?>">Trevicom.mx
        </div>
        <br><br><br><br><br>
        <footer>
            <p><strong>Av. Murillo Vidal N° 98, Fracc. Ensueño; Xalapa, Ver.  E-mail: garantiashp@trevicom.com.mx</strong></p>
            <hr>
            <p><strong>N° Telefónico: 01 (228) 8 17 93 92 ext. 115, 113 y 111</strong></p>
        </footer>
    </div>
    <?php }?>
</body>
</html>