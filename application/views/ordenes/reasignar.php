<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" type="text/css" href="../dist/css/registro.css">
</head>
<body>

  <div class="container box" id="advanced-search-form-1">
    <div class="btn-group" role="group" aria-label="Third group">
    <button type="button" class="btn btn-outline-success float-right">Registrar</button>
  </div>
    <div class="btn-group" role="group" aria-label="Third group">
      <button type="button" class="btn btn-outline-primary float-light">Consultar</button>
    </div>
  </div>


 <div class="container box" id="advanced-search-form">

        <h1 align="center">Reasignacion</h1>
        <div class="table-responsive">          
          <div class="form-row">
            <input type="hidden" class="form-control" id="Usuario" name="Usuario" value="">
            <div class="form-group col-md-4">
              <label for="inputNo.Serie">No.Serie</label>
              <input type="" class="form-control" id="No.Serie" name="No.Serie" placeholder="No.Serie">
            </div>
            <div class="form-group col-md-4">
              <label for="exampleFormControlSelect1">Reasignar A:</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Antonio</option>
                <option>Ana</option>
                <option>Aldo</option>
                <option>Gabi</option>
                <option>Pablo</option>
              </select>
            </div>
          </div>
          <table><nav class="navbar navbar-light bg-light">
            <form class="form-inline">
              <input class="form-control col-md-8" type="search" placeholder="" aria-label="Usuario">
              <button class="btn btn-outline-success col-md-2" type="submit">Buscar</button>
            </form>
          </nav></table>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
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
                  <center>No.serie</center>
                </th>
                <th>
                  <center>Falla</center>
                </th>
              </tr>
            </thead>
            

        <tbody>
          <tr>
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
                2282515305
              </center>
            </td>
            <td>
              <center>
                no prende
              </center>
            </td>
          </tr>

          <tr>
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
                2282515305
              </center>
            </td>
            <td>
              <center>
                no prende
              </center>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <br>
    <button name="Ingresar" Id="Ingresar" type="submit" class="btn btn-success">Reasignar</button>
</body>
</html>