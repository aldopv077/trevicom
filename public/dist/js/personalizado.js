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