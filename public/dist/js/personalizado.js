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
    document.getElementById('btnCliente').style.display="block";    
    document.getElementById('btnEmpresa').style.display="none";;    
    document.getElementById('cmbContacto').style.display="none";
    document.getElementById('rbTelefono').checked=false;
    document.getElementById('rb.Nombre').checked=false;
}
function empresa(){
    //alert("Empresa");
    document.getElementById('btnCliente').style.display="none";    
    document.getElementById('btnEmpresa').style.display="block";   
    document.getElementById('cmbContacto').style.display="block";
    document.getElementById('rbTelefono').checked=false;
    document.getElementById('rb.Nombre').checked=false;

}

function habilitatel(){
    //alert('Entró a la funcion habilitatel');
    
    if(document.getElementById('rbCliente').checked){
        document.getElementById('txtTelefonoCl').style.display="block";
        document.getElementById('txtClientes').style.display="none";
        document.getElementById('txtEmpresa').style.display="none";
        document.getElementById('txtTelefonoEm').style.display="none";
    }else{
        if(document.getElementById('rbEmpresa').checked){
            document.getElementById('txtTelefonoEm').style.display="block";
            document.getElementById('txtTelefonoCl').style.display="none";
            document.getElementById('txtClientes').style.display="none";
            document.getElementById('txtEmpresa').style.display="none";
        }
    }
}

function habilitanom(){
    if(document.getElementById('rbCliente').checked){
        
        document.getElementById('txtClientes').style.display="block";
        document.getElementById('txtTelefonoCl').style.display="none";
        document.getElementById('txtEmpresa').style.display="none";
        document.getElementById('txtTelefonoEm').style.display="none";
    }else{
        if(document.getElementById('rbEmpresa').checked){
            
            document.getElementById('txtEmpresa').style.display="block";
            document.getElementById('txtTelefonoEm').style.display="none";
            document.getElementById('txtTelefonoCl').style.display="none";
            document.getElementById('txtClientes').style.display="none";
        }
    }
}


function busquedaorden(){
    alert('Funcion busqueda de orden');
    //var busqueda = document.getElementById('TipoBusqueda').value;
}