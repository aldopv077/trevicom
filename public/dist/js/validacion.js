function AgregarOrden(){
    //alert('funcion agregar orden');

    var Equipo = document.getElementById('cmbTipoEquipo').value;
    var Ing = document.getElementById('cmbIng').value;

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

function asignaciones(){
    var IngInicial = document.getElementById('txtAsignado').value;
    var IngReasignado = document.getElementById('cmbIng').value;

    if(IngReasignado != 0){
        if(IngInicial == IngReasignado){
            alert('No puede elegir al mismo ingeniero');
            document.getElementById('cmbIng').focus();
            return false;
        }
    }else{
        alert('Debe elegir a un ingeniero para realizar el cambio');
        document.getElementById('cmbIng').focus();
        return false;
    }
}