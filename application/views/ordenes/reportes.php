<?php
    $perfil = $perfil2;
?>
<div class="container box" id="advanced-search-form">

        <h1 align="center">Reportes</h1>
        <div class="table-responsive">          
          <div class="form-row">
            <input type="hidden" class="form-control" id="Usuario" name="Usuario" value=""> 
            <div class="container"></div>           
            <?php 
                if($perfil == "Administrador"){
            ?>
            <div class="form-group col-md-6">
              <label for="exampleFormControlSelect1">Nombre de tecnico:</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option></option>
                <option>Antonio</option>
                <option>Aldo</option>
                <option>Gabi</option>
                <option>Pablo</option>
              </select>
            </div>
            <?php }?>
            <div class="form-group col-md-6">
              <label for="exampleFormControlSelect1">Tipo de reporte:</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option></option>
                <option>Sin revisar</option>
                <option>Revisado</option>
                <option>Terminado</option>
                <option>En espera de piezas</option>
                <option>Garantía</option>
                <option>Terminado sin reparar</option>
              </select>
            </div>
          <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-danger col-md-6">Generar Reporte</button>
          </div>
          <br>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th>
                  <center>No. de orden</center>
                </th>
                <th>
                  <center>Cliente</center>
                </th>
                <th>
                  <center>Tipo de equipo</center>
                </th>
                <th>
                  <center>Marca</center>
                </th>
                <th>
                  <center>Modelo</center>
                </th>
                <th>
                  <center>Falla</center>
                </th>
                <th>
                  <center>Estatus</center>
                </th>
              </tr>
            </thead>
            

        <tbody>
          <tr>
            <td>
              <center>
                228
              </center>
            </td>
            <td>
              <center>
                Alberto
              </center>
            </td>
            <td>
              <center>
                PC
              </center>
            </td>
            <td>
              <center>
                soni
              </center>
            </td>
            <td>
              <center>
                50a3s
              </center>
            </td>
            <td>
              <center>
                no prende
              </center>
            </td>
            <td>
              <center>
                Pendiente
              </center>
            </td>
          </tr>

          <tr>
            <td>
              <center>
                228
              </center>
            </td>
            <td>
              <center>
                Alberto
              </center>
            </td>
            <td>
              <center>
                PC
              </center>
            </td>
            <td>
              <center>
                soni
              </center>
            </td>
            <td>
              <center>
                50a3s
              </center>
            </td>
            <td>
              <center>
                no prende
              </center>
            </td>
            <td>
              <center>
                Pendiente
              </center>
            </td>
          </tr>
        </tbody>
      </table>
    </div>