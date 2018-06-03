<?php
session_start();
include 'serv.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Consultar Cita</title>

    <!-- Bootstrap Core CSS -->

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">
        <div id="menu"></div>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Consultar Cita</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Buscar Cita
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" method='post' action="buscar_cita.php">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <label>N° de DNI:</label>
                                            </div>  
                                            <div class="col-lg-6">
                                                <input class="form-control" name="dni" type="number" autofocus>
                                            </div>         
                                        </div>                         
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col-lg-3">
                                                <label for="disabledSelect">Estado</label>
                                            </div>  
                                            <div class="col-lg-5">
                                                <select id="disabledSelect" class="form-control" name="estado">
                                                    <option>Seleccionar </option>
                                                    <option>Pendiente </option>
                                                    <option>Finalizado </option>
                                                </select>
                                            </div> 
                                            <div class="col-lg-4" align="right">
                                                <input name="cita" class="btn btn-large btn-primary" id="btn_aceptar" type="submit" value="Buscar">
                                            </div>                          
                                        </div>                        
                                    </div>
                                </form>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php
            if(isset($_SESSION["nro_citas"])){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Cita
                            </div>
                            <div class="panel-body">

                                <!-- /.row (nested) -->
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="table-responsive">
                                            <table width="automatic" class="table table-hover table-striped table-bordered table-hover" id="myTable">
                                                <thead>
                                                    <tr class="header">
                                                        <th>N° de DNI</th>
                                                        <th>N° de HC</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Fecha</th>
                                                        <th>Hora</th>
                                                        <th>Estado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include 'historial.php';
                                                    $i=0;
                                                    while($i < $_SESSION['nro_citas']){
                                                        $dni=$_SESSION["pa_dni"][$i];
                                                        $hc=$_SESSION["hc_codigo"][$i];
                                                        $nombre=$_SESSION["p_nombre"][$i];
                                                        $apellido=$_SESSION['p_apellido'][$i];
                                                        $fecha=$_SESSION['c_fecha'][$i];
                                                        $hora=$_SESSION['c_hora'][$i];
                                                        $estado=$_SESSION['c_estado'][$i];
                                                        echo "<tr class='even gradeC'>";
                                                        echo "<td>$dni</td>";
                                                        echo "<td>$hc</td>";
                                                        echo "<td>$nombre</td>";
                                                        echo "<td>$apellido</td>";
                                                        echo "<td>$fecha</td>";
                                                        echo "<td>$hora</td>";
                                                        echo "<td>$estado</td>";
                                                        echo "</tr>";
                                                        $i++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>   

                                        </div>
                                    </div>
                                </div> 
                                <!-- /.row (nested) -->
                            </div>  
                        </div>
                        <?php         
                        session_destroy();
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script> 
    $(function(){
      $("#menu").load("menu_medico.html"); 
  });
    </script>
</body>

</html>