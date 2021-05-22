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

    var TComentario = document.getElementById('cmbTComentario').value;
    var Estatus = document.getElementById('cmbEstatus').value;

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

//Validación de la consulta de reportes
function Reportes(){
    var Estatus = document.getElementById('cmbEstatus').value;

    if(Estatus == 0){
        alert('Debe de elegir por un estatus');
        document.getElementById('cmbEstatus').focus();
        return false;
    }
}

//Valida que estén seleccionados los checkbox
function check(tamanio){
    
    for(x=1;x<=tamanio;x++){
        var nombre = 'No'+x;
        
        if(!document.getElementById(x).checked){
            if(!document.getElementById(nombre).checked){
                alert('Debe de elegir una opción');
                document.getElementById(x).focus();
                return false;
            }
        }
    }
}

function costo(){
    var estatus = document.getElementById('cmbEstatus').value;

    if(estatus == "Terminado"){
        document.getElementById('Costo').style.display = "block";
        document.getElementById('Costo').disabled = false;
    }else{
        document.getElementById('Costo').style.display = "none";
        document.getElementById('Costo').disabled = true;
    }
}

//Verifica que una opción del inventario esté seleccionada
function coninventario(){
    var Id = document.getElementById('IdInventario').value;
    var Fecha = document.getElementById('Fecha').value;

    if(Id == "" && Fecha == ""){
        alert('Debe elegir una opción de busqueda');
        document.getElementById('IdInventario').focus();
        return false;
    }else if(Id != "" && Fecha != ""){
        alert('La busqueda solo es por un criterio de busqueda');
        document.getElementById('IdInventario').focus();
        return false;
    }
}