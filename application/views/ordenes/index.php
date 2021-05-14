  <script>
      window.addEventListener('load', function () {
        document.getElementById('DivDomicilio').style.display="none";
        
        document.getElementById('btnCliente').style.display="none";
        document.getElementById('btnEmpresa').style.display="none";
        document.getElementById('cmbContacto').style.display="none";

        document.getElementById('txtClientes').style.display="block";
        document.getElementById('txtTelefonoCl').style.display="none";
        document.getElementById('txtEmpresa').style.display="none";
        document.getElementById('txtTelefonoEm').style.display="none";
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


          <div class="container box col-md-12">
            
          <div class="custom-control custom-radio custom-control-inline ">
            <label>Buscar por: </label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="rbTelefono" name="TipoBusqueda" class="custom-control-input" value="1" onchange="habilitatel();">
            <label class="custom-control-label" for="rbTelefono">Teléfono</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="rbNombre" name="TipoBusqueda" class="custom-control-input" value="2" onchange="habilitanom();">
            <label class="custom-control-label" for="rbNombre">Nombre</label>
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
                <input class="form-control col-md-8" type="search" placeholder="Teléfono de cliente" aria-label="Teléfono de cliente" Id="txtTelefonoCl" name="txtTelefonoCl">
                <select class="form-control col-md-8"  aria-label="Nombre de la empresa" Id="txtEmpresa" name="txtEmpresa" onChange="ComponerLista(document.forms.FrmBusquedaDatos.txtEmpresa[selectedIndex].value);">
                  <option value="0">Seleccione una empresa</option>
                    <?php foreach($empresas as $emp){?>
                      <option value="<?php echo $emp->IdEmpresa?>"><?php echo $emp->Nombre?></option>
                    <?php  }?>
                </select>

                <input class="form-control col-md-8" type="search" placeholder="Teléfono de la empresa" list="EmpresasTel" aria-label="Teléfono de la empresa" Id="txtTelefonoEm" name="txtTelefonoEm">
                
                <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
               <!-- <a href="<?php echo base_url('Ordenes/pdf')?>" class="btn btn-outline-success col-md-2" type="submit">Ver PDF</a>-->
                
                <div class="btn-group" role="group" aria-label="Third group">
                  <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-primary">Editar Cliente</button>
                </div>
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
        </form>
    </div>

    <div class="container box col-md-12" id="advanced-search-form">
        <br>
        <h1 align="center">Datos del cliente</h1>
        <div class="custom-control-inline">
            <strong><p> Cliente:</p></strong> <p> ----- </p>  
            <strong><p> Dirección:</p></strong> <p> ----- </p> 
            <strong><p> Teléfono:</p></strong> <p> ----- </p>
            <strong><p> Celular:</p></strong> <p> ----- </p> 
            <strong><p> Correo:</p></strong> <p> ----- </p>
        </div><br>
    </div>
    

    <div class="container box col-md-12" id="advanced-search-form">
        
        <h1 align="center">Registro del equipo</h1>
        <h4 align="center">Los datos marcados con "*" son <strong>obligatorios</strong></h4><br><br>

        <form name="FrmRegistro" Id="FrmRegistro" method="post" action="">
           <div class="form-row">
                <input type="hidden" class="form-control" id="IdCliente" name="IdCliente" value="">
                <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="">
                <div class="form-group col-md-4">
                  <label for="exampleFormControlSelect1">Tipo de equipo</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Lapto</option>
                    <option>PC</option>
                    <option>Impresora</option>
                    <option>Monitor</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNo.Serie">No.Serie</label>
                  <input type="" class="form-control" id="No.Serie" name="No.Serie" placeholder="No.Serie">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNo.Serie">No.de producto</label>
                  <input type="" class="form-control" id="Producto" name="Producto" placeholder="No.Producto">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputParterno">Marca</label>
                  <input type="text" class="form-control" id="Marca" name="Marca" placeholder="Marca">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputMaterno">Modelo</label>
                  <input type="Nombre" class="form-control" id="Modelo" name="Modelo" placeholder="Modelo">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputMaterno">Color</label>
                  <input type="Nombre" class="form-control" id="Color" name="Color" placeholder="Color de equipo">
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleFormControlSelect1">Asignar A:</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Antonio</option>
                    <option>Ana</option>
                    <option>Aldo</option>
                    <option>Gabi</option>
                    <option>Pablo</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
                
                <div class="form-group col-md-12">
                  <label for="inputFalla">Falla/Servicio</label>
                  <input type="text" class="form-control" id="Falla" name="Falla" placeholder="Descripcion completa">
                </div>
                <div class="form-group col-md-12">
                  <label for="inputAccesorios">Accesorios</label>
                  <input type="text" class="form-control" id="Telefono" name="Accesorios" placeholder="Accesorios">
                </div>
                <div class="form-group col-md-12">
                  <label for="inputObservacion">Observación</label>
                  <input type="text" class="form-control" id="Observacion" name="Observacion" placeholder="Observacion">
                </div>
                <div class="form-group col-md-12">
                  <label for="inputContraseña">Contraseña</label>
                  <input type="text" class="form-control" id="Contraseña" name="Contraseña" placeholder="Contraseña del equipo">
                </div>
                  <div class="container">
                    <div class="custom-control custom-radio custom-control-inline ">
                      <label>Lugar de Revisión</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="taller" name="3" class="custom-control-input" onchange="sinprogramar();">
                      <label class="custom-control-label" for="taller">En taller</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="Domicilio" name="3" class="custom-control-input"  onchange="programar();">
                      <label class="custom-control-label" for="Domicilio">A Domicilio</label>
                    </div>
                    
                    <div class="custom-control custom-radio custom-control-inline" Id="DivDomicilio">
                      <input type="date" id="dtInicio" name="FechaInicio" class="form-control">
                      <label for="dtInicio">Fecha Programada</label>
                      
                      <input type="time" id="dtHora" name="Hora" class="form-control">
                      <label for="dtHora">Hora Programada</label>
                    </div>
                    
                   
                  </div>
                </form>
                <div class="container box col-md-12">
                  <div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Urgente">
                      <label class="custom-control-label" for="Urgente">Urgente</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Garantia">
                      <label class="custom-control-label" for="Garantia">Garantia</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="Respaldo">
                      <label class="custom-control-label" for="Respaldo">Respaldo de informacion</label>
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
         document.forms.FrmBusquedaDatos.txtEmpresa.disabled = true;
         document.forms.FrmBusquedaDatos.cmbContactos.length = 0;
         CargarPropiedades(xPro);
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
 