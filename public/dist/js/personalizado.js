function programar(){
    //alert("Reparación a domicilio");
    document.getElementById('DivDomicilio').style.display="block";
}

function sinprogramar(){
    //alert("Equipo en taller");
    document.getElementById('DivDomicilio').style.display="none";
}

function cliente(){
    //alert("Cliente");
    document.getElementById('txtClientes').style.display="block";
    document.getElementById('btnCliente').style.display="block";    
    document.getElementById('btnEmpresa').style.display="none";;    
    document.getElementById('cmbContacto').style.display="none";
    document.getElementById('txtEmpresa').style.display="none";
    
}
function empresa(){
    //alert("Empresa");
    document.getElementById('txtClientes').style.display="none";
    document.getElementById('btnCliente').style.display="none";    
    document.getElementById('btnEmpresa').style.display="block";   
    document.getElementById('cmbContacto').style.display="block";
    document.getElementById('txtEmpresa').style.display="block";

}

function busquedaorden(){
    //alert('Funcion busqueda de orden');
    var busqueda = document.getElementById('TipoBusqueda').value;

    switch(busqueda){
        case "Orden": 
                document.getElementById('NoOrden').style.display="block";
                document.getElementById('NomCliente').style.display="none";
                document.getElementById('NomEmpresa').style.display="none";
                document.getElementById('NoSerie').style.display="none";
            break;
        case "Cliente":
                document.getElementById('NoOrden').style.display="none";
                document.getElementById('NomCliente').style.display="block"
                document.getElementById('NomEmpresa').style.display="none";
                document.getElementById('NoSerie').style.display="none";
            break;
        case "Serie":
                document.getElementById('NoOrden').style.display="none";
                document.getElementById('NomCliente').style.display="none";
                document.getElementById('NomEmpresa').style.display="none";
                document.getElementById('NoSerie').style.display="block";
            break;        
        case "Empresa":
                document.getElementById('NoOrden').style.display="none";
                document.getElementById('NomCliente').style.display="none";
                document.getElementById('NomEmpresa').style.display="block";
                document.getElementById('NoSerie').style.display="none";
            break;
    }
}

function TipoEquipo(){
    //alert('funcion Tipo de equipo');

    var accesorios = document.getElementById('Accesorios'); 
    var pass = document.getElementById('Contrasena');
    var te = parseInt(document.getElementById('cmbTipoEquipo').value);
    var indpc = document.getElementById('IndicadoresPC');
    var indimp = document.getElementById('IndicadoresImpresoras');
    

    switch(te){
        case 1:
                accesorios.setAttribute('placeholder','Accesorios adicionales al CPU');
                pass.setAttribute('placeholder', 'Proporcionar contraseña en caso de tener');
                accesorios.style.border="1px solid red";  
                pass.style.border="1px solid red";
                indpc.style.display="block";
                indimp.style.display="none";
            break;
        case 2:
                accesorios.setAttribute('placeholder','Adaptador de corriente obligatorio');
                accesorios.style.border="1px solid red"; 
                pass.setAttribute('placeholder', 'Proporcionar contraseña en caso de tener');                  
                pass.style.border="1px solid red"; 
                indpc.style.display="block";
                indimp.style.display="none";
            break;
        
        case 3:
                accesorios.setAttribute('placeholder','Cargador obigatorio, no dejar mochila');
                accesorios.style.border="1px solid red";    
                pass.setAttribute('placeholder', 'Proporcionar contraseña en caso de tener');                  
                pass.style.border="1px solid red";  
                indpc.style.display="block";
                indimp.style.display="none";
            break;
        case 4:
                accesorios.setAttribute('placeholder','Adaptador de corriente y cartuchos obligatorios, no dejar cable de corriente');
                accesorios.style.border="1px solid red";   
                pass.setAttribute('placeholder','Contraseña');
                pass.style.border="1px solid lightgrey"; 
                indpc.style.display="none";
                indimp.style.display="block";
            break;
        case 5:
                accesorios.setAttribute('placeholder','Adaptador de corriente y cartuchos obligatorios, no dejar cable de corriente');
                accesorios.style.border="1px solid red";   
                pass.setAttribute('placeholder','Contraseña');
                pass.style.border="1px solid lightgrey"; 
                indpc.style.display="none";
                indimp.style.display="block";
            break;
        default:
                accesorios.setAttribute('placeholder','Accesorios');
                accesorios.style.border="1px solid lightgrey"; 
                pass.setAttribute('placeholder','Contraseña');
                pass.style.border="1px solid lightgrey"; 
                indpc.style.display="none";
                indimp.style.display="none";
            break;
    }
}

//habilita el tipo de correo del contacto de la empresa
function correo(){
    if(document.getElementById('rbEmpresa').checked){
        document.getElementById('Empresa').style.display="block";
        document.getElementById('Convencional').style.display="none";
        document.getElementById('DominioConvencional').style.display="none";
    }else{
        document.getElementById('Empresa').style.display="none";
        document.getElementById('Convencional').style.display="block";
        document.getElementById('DominioConvencional').style.display="block";
    }
}

//Muestra las fechas de inicio y fin para las cotizaciones
function fechas(){
    //alert('funcion fechas');
    var estatus = document.getElementById('cmbEstatus').value;
    

    if(estatus == "Realizada"){
        document.getElementById('fechas').style.display="block";
    }else{
        document.getElementById('fechas').style.display="none";
    }
}

//calcula el precio en pesos mexicanos
function costomx(){
    if(document.activeElement.id){
        var id = document.activeElement.id; 
        var Id =  id.split('-');

        var precious = 'PrecioUS-'+Id[1];
        var preciomx = 'CostoMN-'+Id[1];
        var cambio = 'TipoCambio-'+Id[1];
        var margen = 'Margen-'+Id[1];

        var CostoUS = parseFloat(document.getElementById(precious).value);
        var Cambio = parseFloat(document.getElementById(cambio).value);
        
        if(!isNaN(CostoUS) && !isNaN(Cambio)){
            var CostoMX = CostoUS * Cambio;
            document.getElementById(preciomx).value = CostoMX;
            document.getElementById(margen).focus();
        }else if(!isNaN(CostoUS) && isNaN(Cambio)){ 
            alert('Debe de proporcionar el tipo de cambio para realizar el cálculo');
            document.getElementById(cambio).focus();
        }else if(isNaN(CostoUS) && !isNaN(Cambio)){
            alert('Debe de proporcionar precio en US para realizar el cálculo');
            document.getElementById(precious).focus();
        }
    }    
}


//Calcula la utilidad de la partida
function utilidad(){
    if(document.activeElement.id){
        var id = document.activeElement.id; 
        var Id =  id.split('-');

        var cantidad = 'Cantidad-'+Id[1];
        var proveedor = 'Proveedor-'+Id[1];
        var costomx = 'CostoMN-'+Id[1];
        var flete = 'Flete-'+Id[1];
        var utilidad = 'Utilidad-'+Id[1];
        var margen = 'Margen-'+Id[1];
        var subtotal = 'SubTotal-'+Id[1];
        var total = 'Total-'+Id[1];
        var preciounitario = 'PrecioUnitario-'+Id[1];
        
        var Cantidad = parseInt(document.getElementById(cantidad).value);
        var CostoMX = parseFloat(document.getElementById(costomx).value);
        var porcentaje = parseInt(document.getElementById(margen).value);

        if(porcentaje < 10){
            var Margen = '0.0'+document.getElementById(margen).value;
        }else{
            var Margen = '0.'+document.getElementById(margen).value; 
        }

        var Flete = parseFloat(document.getElementById(flete).value);
        var CientoGanancia = parseFloat(Margen);

        if(!isNaN(Flete) && CientoGanancia != 0){
            var PrecioUnitario = (CostoMX/(1-CientoGanancia))+Flete;
            var Utilidad = parseFloat((PrecioUnitario - CostoMX) - Flete).toFixed(2);
            var SubTotal = parseFloat(PrecioUnitario * Cantidad).toFixed(2);
            var Total = parseFloat(SubTotal * 1.16).toFixed(2);

            document.getElementById(subtotal).value = SubTotal;
            document.getElementById(total).value = Total;

            document.getElementById(subtotal).disabled=true;
            document.getElementById(total).disabled=true;

            document.getElementById(utilidad).value = Utilidad;
            document.getElementById(preciounitario).value = parseFloat(PrecioUnitario).toFixed(2);
            document.getElementById(proveedor).focus();
        }else if(isNaN(Flete) && CientoGanancia == 0){
            alert('Es necesario llenar los campos de Margen y Flete para realizar el cálculo');
            document.getElementById(margen).focus();   
        }else if(!isNaN(Flete) && CientoGanancia == 0){
            alert('Es necesario llenar el campo Margen para realizar el cálculo');
            document.getElementById(margen).focus();
        }else if(isNaN(Flete) && CientoGanancia != 0){
            alert('Es necesario llenar el campo Flete para realizar el cálculo');
            document.getElementById(flete).focus();
        }

        //document.getElementById(proveedor).focus();
        
    }
}

//Calcula el total de la cotización
function totales(tam){
    
    var SubTotal = 0;
    var Total = 0;

    for(x=1; x <= tam; x++){
        var Subtotalpartida = 'SubTotal-'+x;
        var Totalpartida = 'Total-'+ x;

        var SubPart = parseFloat(document.getElementById(Subtotalpartida).value);
        var TotPart = parseFloat(document.getElementById(Totalpartida).value);

        if(isNaN(SubPart)){
            SubPart = 0;
        }
        if(isNaN(TotPart)){
            TotPart = 0;
        }

        //alert("SubTotal Partida"+x+" = " + SubPart);
        //alert("Total Partida"+x+" = " + TotPart);

        Total = Total + TotPart;
        SubTotal = SubTotal + SubPart;

        document.getElementById('SubTotal').value = SubTotal;
        document.getElementById('Total').value = Total;
    }
    //alert('Tamaño del arreglo: '+ tam);
    document.getElementById('agrCot').focus();
}

//Habilita el comentario de la orden no encontrada en el inventario
function habilitaComentario(){
    if(document.activeElement.id){
        var id = document.activeElement.id; 
        var Id =  id.split('-');
        var comentario = 'Comentario-'+Id[1];
        var encontrado = 'Encontrado-'+Id[1];
        var Encontrado = document.getElementById(encontrado);
        
        if(Encontrado.checked){
            document.getElementById(comentario).disabled=false;
            document.getElementById(comentario).focus();
        }else{
            document.getElementById(comentario).disabled=true;           
        }

    }
}