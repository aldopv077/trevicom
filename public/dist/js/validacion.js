function AgregarOrden(){
    var Equipo = document.getElementById('cmbTipoEquipo').value;
    var Ing = document.getElementById('cmbIng').value;

    var Cliente = document.getElementById('IdCliente').value;
    var Empresa = document.getElementsById('IdEmpresa').value;

    if(Cliente == "" || Empresa == ""){
        alert('No se ha seleccionado los datos del cliente');
        document.FrmBusquedaDatos.rbEmpresa.focus();
        return false;
    }

    if(document.getElementById('rbTaller').checked){
        if(Equipo == 0){
            document.FrmRegistro.cmbTipoEquipo.focus();
            return false;
        }else if(Ing == 0){
            document.FrmRegistro.cmbIng.focus();
            return false;
        }
    }else if(document.getElementById('rbDomicilio').checked){
        if(Equipo == 0){
            document.FrmRegistro.cmbTipoEquipo.focus();
            return false;
        }else if(Ing == 0){
            document.FrmRegistro.cmbIng.focus();
            return false;
        }
    }else{
        alert('Debe elegir el lugar de revisión');
        document.FrmRegistro.rbTaller.focus();
        return false;
    }
}