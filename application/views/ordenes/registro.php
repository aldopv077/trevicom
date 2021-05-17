<?php
  $IdClien = 0;
  $IdEmpr = 0;
  $IdCont = 0;

  if($tipocliente == "Cliente"){
    foreach($cliente as $clie){
      $IdClien = $clie->IdCliente;
    }
    //echo 'IdCliente: '.$Id; exit;
  }elseif($tipocliente == "Empresa"){
    foreach($contacto as $conta){
      $IdEmpr = $conta->IdEmpresa;
      $IdCont = $conta->IdContacto;
    }
  }
?>

<script>
      window.addEventListener('load', function () {
        document.getElementById('DivDomicilio').style.display="none";
        
        document.getElementById('btnCliente').style.display="none";
        document.getElementById('btnEmpresa').style.display="none";
        document.getElementById('cmbContacto').style.display="none";

        document.getElementById('txtClientes').style.display="block";
        document.getElementById('txtEmpresa').style.display="none";
      });
  </script>  


<div class="container box" id="advanced-search-form-1">
  <div class="btn-group" role="group" aria-label="Third group">
    <a href="<?php echo base_url('Ordenes/index')?>" class="btn btn-outline-success float-right">Registrar</a>
  </div>
  <div class="btn-group" role="group" aria-label="Third group">
      <a href="<?php echo base_url('Ordenes/consultar')?>" class="btn btn-outline-primary float-light">Consultar</a>
  </div>
  <?php 
    $Perfil = $perfil;

    if($Perfil == "Administrador"){
  ?>
        <div class="btn-group" role="group" aria-label="Third group">
          <a href="<?php echo base_url('Ordenes/reasignar')?>" class="btn btn-outline-primary float-light">Reasignar</a>
        </div>
  <?php }?>

  <div class="container box col-md-12" id="advanced-search-form"> 
  <form name="FrmBusquedaDatos" Id="FrmBusquedaDatos" method="post" action="<?php echo base_url('Ordenes/datoscliente')?>">
        <div class="container">
          <div class="custom-control custom-radio custom-control-inline ">
            <label>Tipo de cliente: </label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="rbEmpresa" name="TipoCliente" class="custom-control-input" value="1" onchange="empresa();">
            <label class="custom-control-label" for="rbEmpresa">Empresa</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="rbCliente" name="TipoCliente" class="custom-control-input" value="2" onchange="cliente();">
            <label class="custom-control-label" for="rbCliente">Cliente</label>
          </div>
          <div  class="btn-group" role="group" aria-label="Third group" >
            <a href="<?php echo base_url('Clientes/registrar')?>" name="Ingresar" Id="btnCliente" class="btn btn-success">Nuevo Cliente</a>
            <a href="<?php echo base_url('Empresas/registrar')?>" name="Ingresar" Id="btnEmpresa" class="btn btn-success">Nueva Empresa</a>  
          </div>
          <div class="container box col-md-12 form-inline">
                <input class="form-control col-md-8" type="search" placeholder="Nombre de cliente" list="clientes" aria-label="Nombre de cliente" Id="txtClientes" name="txtClientes">
                <datalist id="clientes">
                      <?php
                          foreach ($clientes as $key) {
                            print '<option value="'.$key->IdCliente .' '. $key->Nombre .' '. $key->Paterno .' '. $key->Materno.' '. $key->Telefono .'"></option>';
                          }
                      ?>
                  </datalist>
                  <span class="input-group-btn"></span>
                <input class="form-control col-md-8" type="search" placeholder="Nombre de la empresa" list="cmbempresas" aria-label="Nombre de la empresa" Id="txtEmpresa" name="txtEmpresa" onChange="ComponerLista(document.forms.FrmBusquedaDatos.txtEmpresa.value);">
                  <datalist id="cmbempresas">
                      <?php
                          foreach ($empresas as $emp) {
                            print '<option value="'.$emp->IdEmpresa .' '. $emp->Nombre .' '. $emp->Telefono.'"></option>';
                          }
                      ?>
                  </datalist>
                  <span class="input-group-btn"></span>                
                <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
               <!-- <a href="<?php echo base_url('Ordenes/pdf')?>" class="btn btn-outline-success col-md-2" type="submit">Ver PDF</a>-->
          </div>
          <br>
          <div class="form-group col-md-4" Id="cmbContacto">
            <label for="exampleFormControlSelect1">contacto</label>
            <select class="form-control" id="cmbContactos" name="cmbContactos">
                <option value="0">Seleccione un contacto</option>
            </select>
          </div>
        </div>
        <br>
        </div>
        </div>
        </form>    </div>
    
    <?php if($tipocliente == "Cliente") {?>
        <div class="container box col-md-12" id="advanced-search-form">
            <br>
            <h1 align="center">Datos del cliente</h1>
            <div class="custom-control-inline">
              <?php foreach($cliente as $cli){?>         
                <strong><p> Cliente:</p></strong> <p> <?php echo $cli->Nombre.' '.$cli->Paterno.' '.$cli->Materno ?> </p> 
                <strong><p> Dirección:</p></strong> <p> <?php echo $cli->Direccion.' #'.$cli->NoExterior.' int '.$cli->NoInterior.' '.$cli->Colonia.' '.$cli->CP.' '.$cli->Ciudad ?> </p> 
                <strong><p> Tel:</p></strong> <p> <?php echo $cli->Telefono ?> </p> 
                <strong><p> Cel:</p></strong> <p> <?php echo $cli->Celular ?> </p> 
                <strong><p> Correo:</p></strong> <p> <?php echo $cli->Correo ?> </p> 
              <?php }?>
            </div><br>
            <a href="<?php echo base_url('Clientes/editar/').$cli->IdCliente?>" class="btn btn-outline-success col-md-4" type="submit">Editar cliente</a>
        </div>
    <?php }elseif($tipocliente == "Empresa"){?>
      <div class="container box col-md-12" id="advanced-search-form">
            <br>
            <h1 align="center">Datos de la empresa</h1>
            <div class="custom-control-inline">
              <?php foreach($empresa as $emp){?>
                <strong><p> Nombre:</p></strong> <p> <?php echo $emp->Nombre. '  '?> </p> 
                <strong><p> Teléfono:</p></strong> <p> <?php echo $emp->Telefono. '  ' ?> </p> 
                <strong><p> Dirección:</p></strong> <p> <?php echo $emp->Direccion.' #'.$emp->NoExterior.' int '.$emp->NoInterior.' '.$emp->Colonia.' '.$emp->CodigoPostal.' '.$emp->Ciudad. '  '?> </p> 
                <strong><p> Dependencia:</p></strong> <p> <?php echo $emp->Dependencia?> </p>
              <?php }?>
            </div><br>
            <a href="<?php echo base_url('Empresas/editar/').$emp->IdEmpresa?>" class="btn btn-outline-success col-md-4" type="submit">Editar Empresa</a>
        </div>
        
        <div class="container box col-md-12" id="advanced-search-form">
            <br>
            <h1 align="center">Datos del contacto</h1>
            <div class="custom-control-inline">
            <?php foreach($contacto as $cont){?>
                <strong><p> Nombre:</p></strong> <p> <?php echo '  '.$cont->Nombre.' '.$cont->Paterno.' '.$cont->Materno . '  '?> </p> 
                <strong><p> Teléfono:</p></strong> <p> <?php echo'  '. $cont->Telefono. '  '?> </p> 
                <strong><p> Departamento:</p></strong> <p> <?php echo '  '.$cont->Departamento ?> </p> 
            <?php }?>
            </div><br>
            <a href="<?php echo base_url('Contactos/editar/').$cont->IdContacto?>" class="btn btn-outline-success col-md-4" type="submit">Editar contacto</a>
        </div>
    <?php } ?>
    

    <div class="container box col-md-12" id="advanced-search-form">
        
        <h1 align="center">Registro del equipo</h1>
        <h6 align="center">Los datos marcados con "*" son <strong>obligatorios</strong></h6><br><br>

        <form name="FrmRegistro" Id="FrmRegistro" method="post" action="<?php echo base_url('Ordenes/registrar')?>">
           <div class="form-row">
                <input type="hidden" class="form-control" id="IdCliente" name="IdCliente" value="<?php echo $IdClien?>">
                <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="<?php echo $IdEmpr?>">
                <input type="hidden" class="form-control" id="IdContacto" name="IdContacto" value="<?php echo $IdCont?>">
                <div class="form-group col-md-4">
                  <label for="cmbTipoEquipo">*Tipo de equipo</label>
                  <select class="form-control" id="cmbTipoEquipo" name="cmbTipoEquipo" required>
                    <option value="0"> Seleccione un equipo </option>
                    <?php foreach($tipoequipo as $te){?>
                        <option value="<?php echo $te->IdTipoEquipo?>"><?php echo $te->TipoEquipo?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="NoSerie">*No.Serie</label>
                  <input type="text" class="form-control" id="NoSerie" name="NoSerie" placeholder="No.Serie" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Producto">*No.de producto</label>
                  <input type="" class="form-control" id="Producto" name="Producto" placeholder="No.Producto" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Marca">*Marca</label>
                  <input type="text" class="form-control" id="Marca" name="Marca" placeholder="Marca" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Modelo">*Modelo</label>
                  <input type="text" class="form-control" id="Modelo" name="Modelo" placeholder="Modelo" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="Color">Color</label>
                  <input type="text" class="form-control" id="Color" name="Color" placeholder="Color de equipo">
                </div>
                <div class="form-group col-md-4">
                  <label for="cmbIng">* Asignar A:</label>
                  <select class="form-control" id="cmbIng" name="cmbIng" required>
                      <option value="0"> Seleccione un ingeniero </option>
                      <?php foreach($ing as $Inge){?>
                          <option value="<?php echo $Inge->Iniciales?>"> <?php echo $Inge->Nombre.' '.$Inge->Paterno.' '.$Inge->Iniciales?> </option>
                      <?php }?>
                  </select>
                </div>
              </div>

              <div class="form-row">                
                <div class="form-group col-md-12">
                  <label for="inputFalla">*Falla/Servicio</label>
                  <input type="text" class="form-control" id="Falla" name="Falla" placeholder="Descripcion completa" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputAccesorios">Accesorios</label>
                  <input type="text" class="form-control" id="Telefono" name="Accesorios" placeholder="Accesorios">
                </div>
                <div class="form-group col-md-12">
                  <label for="inputObservacion">*Observación</label>
                  <input type="text" class="form-control" id="Observacion" name="Observacion" placeholder="Observacion" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputContraseña">Contraseña</label>
                  <input type="text" class="form-control" id="Contrasena" name="Contrasena" placeholder="Contraseña del equipo">
                </div>
                  <div class="container">
                    <div class="custom-control custom-radio custom-control-inline ">
                      <label>*Lugar de Revisión</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="rbTaller" name="LugarRevision" value="Taller" class="custom-control-input" onchange="sinprogramar();">
                      <label class="custom-control-label" for="rbTaller">En taller</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="rbDomicilio" name="LugarRevision" value="Domicilio" class="custom-control-input"  onchange="programar();">
                      <label class="custom-control-label" for="rbDomicilio">A Domicilio</label>
                    </div>
                    
                    <div class="custom-control custom-radio custom-control-inline" Id="DivDomicilio">
                      <input type="date" id="dtInicio" name="Fecha" class="form-control">
                      <label for="dtInicio">Fecha Programada</label>
                      
                      <input type="time" id="dtHora" name="Hora" class="form-control">
                      <label for="dtHora">Hora Programada</label>
                    </div>
                    
                   
                  </div>
                <div class="container box col-md-12">
                  <div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Urgente" name="Prioridad" value="1">
                      <label class="custom-control-label" for="Urgente">Urgente</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Garantia" name="Garantia" value="1">
                      <label class="custom-control-label" for="Garantia">Garantia</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Respaldo" name="Respaldo" value="1">
                      <label class="custom-control-label" for="Respaldo">Respaldo de información</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Reincidencia" name="Reincidencia" value="1">
                      <label class="custom-control-label" for="Reincidencia">Reincidencia</label>
                    </div>
                  </div>
                </div>
                <br>               
              </div>  
              <br>            
              <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success" onclick="return AgregarOrden();">Guardar</button>
            </div>
            <br>                                       
        </form>
    </div>

    <script src="<?php echo base_url('public/dist/js/personalizado.js')?>"></script>
    <script src="<?php echo base_url('public/dist/js/validacion.js')?>"></script>
<script>
  function ComponerLista(xPro)
      {
        var Id =  xPro.split(' ');
      
         document.forms.FrmBusquedaDatos.txtEmpresa.disabled = true;
         document.forms.FrmBusquedaDatos.cmbContactos.length = 0;
         CargarPropiedades(Id[0]);
         document.forms.FrmBusquedaDatos.txtEmpresa.disabled = false;
      }
 
      function CargarPropiedades(xCont)
      {
        var o
        document.forms.FrmBusquedaDatos.cmbContactos.disabled=true;

        <?php
           foreach($contactos as $cont) {
        ?>

        if (xCont == <?php echo $cont->IdEmpresa; ?>)
        {
           o = document.createElement("OPTION");
           o.text = '<?php echo $cont->Nombre.' '.$cont->Paterno.' '.$cont->Materno; ?>';
           o.value = <?php echo $cont->IdContacto; ?>;
           document.forms.FrmBusquedaDatos.cmbContactos.options.add (o);
        } 
        <?php
       		}
        ?> 
           document.forms.FrmBusquedaDatos.cmbContactos.disabled=false;
       }
</script>