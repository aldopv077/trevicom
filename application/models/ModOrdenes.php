<?php

class ModOrdenes extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    //Lista de los tipos de equipos
    public function listaequipos(){
        $this->db->select('*');
        $this->db->from('TblTipoEquipo');
        
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Ingresa los datos de la orden a la BD y devuelve el IdOrden asignado
    public function registrar($equipo){
        $insertar=$this->db->insert('TblOrdenes', $equipo);

        if($insertar){
            $this->db->select_max('IdOrden');
            $this->db->from('TblOrdenes');
            $consulta = $this->db->get();

            return $consulta->result();
        }else{
            return false;
        }
    }

    //Consulta si existe una asignación de la orden seleccionada
    public function consultarAsignacion($IdOrden){
        $this->db->select('*');
        $this->db->from('TblAsignaciones');
        $this->db->where('IdOrden',$IdOrden);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Actualiza a quien se le asignó a orden
    public function actualizaorden($Id,$asignado){
       $actualiza = $this->db->query('UPDATE TblOrdenes SET Asignado = "'.$asignado.'" WHERE IdOrden = '.$Id);

    }

    //Ingresa a que ingeniero se le asignó el equipo ingresado
    public function asignar($asignacion){
        $insertar = $this->db->insert('TblAsignaciones', $asignacion);

        return true;
    }

    //Busca las ordenes por número de orden o por número de serie de Clientes
    public function buscarordenCliente($Id){
        //echo $Id; exit;
        $this->db->select('ord.IdOrden As Orden, cli.IdCliente As IdCliente, cli.Nombre As Nombre, cli.Paterno As Paterno, cli.Materno As Materno, cli.Direccion As Calle, cli.NoExterior As Exterior, cli.NoInterior As Interior, cli.Colonia As Col, cli.Ciudad As Ciudad, cli.Telefono As Telefono, cli.Celular As Celular, cli.Correo As Correo,te.TipoEquipo As Equipo, ord.NumeroSerie AS Serie, ord.NumeroEquipo As NumeroEquipo,ord.Marca As Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Accesorios As Accesorios, ord.Observaciones AS Observ, ord.Estatus AS Estatus, usu.Nombre AS RecibeN, usu.Paterno As RecibeP, usu.Materno AS RecibeM, ord.Asignado as Asignado, ord.Fecha AS Fecha, ord.Hora As Hora, ord.Prioridad As Prioridad, ord.Garantia As Garantia, ord.Reincidencia As Reincidencia, ord.Respaldo as Respaldo, ord.Contrasena AS Pass, ord.Costo As Costo, ord.LugarRevision As Lugar, ord.Intervenido, ord.Tinta, ord.Cartuchos, ord.Toner,cli.Macro AS Macro');
        $this->db->from('TblOrdenes as ord');
        $this->db->join('TblClientes as cli','ord.IdCliente=cli.IdCliente');
        $this->db->join('TblTipoEquipo As te','ord.IdTipoEquipo=te.IdTipoEquipo');
        $this->db->join('TblEmpleados as usu','ord.IdEmpleado = usu.IdEmpleado');
        $this->db->where('IdOrden',$Id);
        $this->db->or_where('NumeroSerie',$Id);
        //$this->db->where('Estatus <>', 'Entregado');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busqueda de ordenes por número de orden o por número de serie de Empresas
    public function buscarordenEmpresa($Id){
        $this->db->select('ord.IdOrden As Orden, emp.IdEmpresa As IdEmpresa, emp.Nombre As Empresa, cnt.Nombre As Nombre, cnt.Paterno As Paterno, cnt.Materno As Materno, cnt.Correo As Correo, emp.Direccion As Calle, emp.NoExterior As Exterior, emp.NoInterior As Interior, emp.Colonia As Col, emp.Ciudad As Ciudad, emp.Telefono as TelEmpresa, emp.Extencion AS Extencion, cnt.Telefono AS TelContacto, te.TipoEquipo As Equipo, ord.NumeroSerie AS Serie, ord.NumeroEquipo AS NumeroEquipo, ord.Marca As Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Accesorios AS Accesorios, ord.Observaciones AS Observ, ord.Estatus AS Estatus, usu.Nombre AS RecibeN, usu.Paterno As RecibeP, usu.Materno AS RecibeM, ord.Asignado as Asignado, ord.Fecha AS Fecha, ord.Hora As Hora,ord.Prioridad As Prioridad, ord.Garantia As Garantia, ord.Reincidencia As Reincidencia, ord.Respaldo as Respaldo, ord.Contrasena AS Pass, ord.Costo As Costo, ord.LugarRevision As Lugar,  ord.Intervenido, ord.Tinta, ord.Cartuchos, ord.Toner, emp.Macro AS Macro');
        $this->db->from('TblOrdenes as ord');
        $this->db->join('TblEmpresas as emp','ord.IdEmpresa=emp.IdEmpresa');        
        $this->db->join('TblContactoEmpresa as cnt','ord.IdContactoEmpresa=cnt.IdContacto');    
        $this->db->join('TblTipoEquipo As te','ord.IdTipoEquipo=te.IdTipoEquipo');    
        $this->db->join('TblEmpleados as usu','ord.IdEmpleado = usu.IdEmpleado');
        $this->db->where('IdOrden',$Id);
        $this->db->or_where('NumeroSerie',$Id);
        //$this->db->where('Estatus <>', 'Entregado');
        
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busca las ordenes por IdClientes
    public function buscarordenIdCliente($Id){
        //echo $Id; exit;
        $this->db->select('ord.IdOrden As Orden, cli.IdCliente AS IdCliente, cli.Nombre As Nombre, cli.Paterno As Paterno, cli.Materno As Materno, cli.Telefono, cli.Celular, te.TipoEquipo As Equipo, ord.NumeroSerie AS Serie, ord.Marca As Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Observaciones AS Observ, ord.Estatus AS Estatus, usu.Iniciales AS Recibe, ord.Asignado as Asignado, ord.Fecha As Fecha, ord.Hora AS Hora, ord.Prioridad As Prioridad, ord.Garantia As Garantia, ord.Reincidencia As Reincidencia, ord.Respaldo as Respaldo, ord.Contrasena AS Pass, ord.Costo As Costo, ord.LugarRevision As Lugar, ord.Intervenido, ord.Tinta, ord.Cartuchos, ord.Toner,cli.Macro AS Macro');
        $this->db->from('TblOrdenes as ord');
        $this->db->join('TblClientes as cli','ord.IdCliente=cli.IdCliente');
        $this->db->join('TblTipoEquipo As te','ord.IdTipoEquipo=te.IdTipoEquipo');
        $this->db->join('TblEmpleados as usu','ord.IdEmpleado = usu.IdEmpleado');
        $this->db->where('ord.IdCliente',$Id);
        $this->db->where('Estatus <>', 'Entregado');

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Busqueda de ordenes por IdEmpresas
    public function buscarordenIdEmpresa($Id){
        $this->db->select('ord.IdOrden As Orden, emp.IdEmpresa As IdEmpresa, emp.Nombre As Empresa, cnt.Nombre As Nombre, cnt.Paterno As Paterno, cnt.Materno As Materno, emp.Telefono as Telefono, cnt.Telefono AS TelContacto, te.TipoEquipo As Equipo, ord.NumeroSerie AS Serie, ord.Marca As Marca, ord.Modelo As Modelo, ord.Falla AS Falla, ord.Observaciones AS Observ, ord.Estatus AS Estatus, usu.Iniciales AS Recibe, ord.Asignado as Asignado, ord.Fecha As Fecha, ord.Hora AS Hora, ord.Prioridad As Prioridad, ord.Garantia As Garantia, ord.Reincidencia As Reincidencia, ord.Respaldo as Respaldo, , ord.Contrasena AS Pass, ord.Costo As Costo, ord.LugarRevision As Lugar, ord.Intervenido, ord.Tinta, ord.Cartuchos, ord.Toner,emp.Macro AS Macro');
        $this->db->from('TblOrdenes as ord');
        $this->db->join('TblEmpresas as emp','ord.IdEmpresa=emp.IdEmpresa');        
        $this->db->join('TblContactoEmpresa as cnt','ord.IdContactoEmpresa=cnt.IdContacto');    
        $this->db->join('TblTipoEquipo As te','ord.IdTipoEquipo=te.IdTipoEquipo');    
        $this->db->join('TblEmpleados as usu','ord.IdEmpleado = usu.IdEmpleado');
        $this->db->where('ord.IdEmpresa',$Id);
        $this->db->where('Estatus <>', 'Entregado');
        
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Realiza el conteo de las ordenes registradas al IdCliente 
    public function conteocliente($Id){
        $consulta = $this->db->query('SELECT count(IdOrden) AS conteo FROM TblOrdenes WHERE IdCliente='.$Id.' AND Estatus<> "Entregado"' );
        
        return $consulta->result();
    }

    //Realiza el conteo de las ordenes registradas al IdEmpresa
    public function conteoempresa($Id){
        $consulta = $this->db->query('SELECT count(IdOrden) AS conteo FROM TblOrdenes WHERE IdEmpresa='.$Id.' AND Estatus<> "Entregado"' );
        
        return $consulta->result();
    }

    //Busqueda de asignaciones de la orden seleccionada
    public function asignaciones($Id){
        $this->db->select('asg.IdOrden As Orden, usu.Iniciales As Iniciales, asg.AsignadoA AS Asignado');
        $this->db->from('TblAsignaciones AS asg');
        $this->db->join('TblEmpleados as usu','asg.IdEmpleado = usu.IdEmpleado');
        $this->db->where('asg.IdOrden',$Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Actualiza el costo de la orden y el estatus de la orden
    public function costo($Id, $Costo, $Estatus){
        
        $this->db->query("UPDATE TblOrdenes SET Costo =". $Costo .", Estatus = '".$Estatus."' WHERE IdOrden = ". $Id);

        return true;
    }

    //Actualiza solo el estatus de la orden
    public function estatus($Id, $Estatus){
       
        $this->db->query("UPDATE TblOrdenes SET Estatus = '".$Estatus."' WHERE IdOrden = ". $Id);

        return true;
    }

    //Marca como entregado el equipo
    public function entregar($Id){
        $actualiza = $this->db->query("UPDATE TblOrdenes SET Estatus = 'Entregado' WHERE IdOrden = ". $Id);
        if($actualiza){
            return true;
        }else{
            return false;
        }
    }

    //Consulta el último comentario
    public function verificaestatus($Id){
        $this->db->select('Estatus');
        $this->db->from('TblOrdenes');
        $this->db->where('IdOrden', $Id);

        $consulta = $this->db->get();
        return $consulta->result();
    }
}