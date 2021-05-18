//Validaciones de los campos obligatorios que no estén vacios
//Solo combobox, checkbox y radiobutton

//Validacion antes de agregar la orden a la BD
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

//Validación de las asignaciones antes de guardarlas en al BD
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

//Validación de los comentarios/seguimiento antes de guardarlos en la BD
function Seguimiento(){
    alert('Funcion seguimiento');
    //return false;

    var TComentario = document.getElementById('cmbTComentario').value;
    var Estatus = document.getElementById('cmbEstatus').value;

    alert('Tipo de comentario = '+TComentario+' Estatus = '+Estatus);

    

    if(TComentario == 0){
        alert('Es necesario elegir un tipo de comentario');
        document.getElementById('cmbTComentario').focus();
        return false;
    }else if(Estatus == 0){
        alert('Es necesario elegir un estatus del equipo');
        document.getElementById('cmbEstatus').focus();
        return false;
    }
}