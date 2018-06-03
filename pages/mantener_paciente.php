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

    <title>Mantener Paciente</title>

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
                    <h1 class="page-header">Mantener Paciente</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Buscar Paciente
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" method='post' action="buscar.php">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-lg-2">
                                                <label>N° de Historia Clínica:</label>
                                            </div>  
                                            <div class="col-lg-2">
                                                <input class="form-control" name="nhc" type="number" autofocus>
                                            </div> 
                                            <div class="col-lg-2" align="center">
                                                <label>N° de DNI:</label>
                                            </div> 
                                            <div class="col-lg-2" >
                                                <input class="form-control" name="codigo" type="number" autofocus>
                                            </div>
                                            <div class="col-lg-1">
                                                <label>Nombres:</label>
                                            </div>  
                                            <div class="col-lg-2">
                                                <input class="form-control" name="nombre" type="text" autofocus>
                                            </div>
                                            <div class="col-lg-1" align="right">
                                                <input name="actualizar_hc" class="btn btn-large btn-primary" id="btn_aceptar" type="submit" value="Buscar">
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
            if(isset($_SESSION['hc_nrohistoria'])){
                ?>
                <div class="row">
                    <div class="col-lg-12 ">
                                <div class="table-responsive">
                                    <table width="automatic" class="table table-hover table-striped table-bordered table-hover" id="myTable">
                                        <thead>
                                            <tr class="header">
                                                <th>N° de HC</th>
                                                <th>N° de DNI</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'historial.php';
                                            $i=listar_resultados($_SESSION["hc_nrohistoria"]);
                                            $cont=0;
                                            while($cont < $i ){
                                                $log4 = buscar_paciente($_SESSION["res_cod_res"][$cont]);
                                                echo "<tr class='even gradeC'>";
                                                echo "<td>$i</td>";
                                                echo "<td>$cont</td>";
                                                $diagnostico=$_SESSION["res_diagnostico"][$cont];
                                                echo "<td>$diagnostico</td>";
                                                if($log4>0){
                                                    echo "<td>Si</td>";   
                                                }
                                                else{
                                                    echo "<td>No</td>";
                                                }
                                                echo "<td><button class='btn btn-success' data-toggle='modal' data-target='#detalle_resultado'>Ver Detalles</button></td>";
                                                echo "</tr>";

                                                $cont++;
                                            }
                                            ?>
                                            <div class="modal fade" id="detalle_resultado" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel" align="center">Detalle de Resultado</h4>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <form role="form">
                                                            <div class="modal-body">
                                                                <p class="statusMsg"></p>
                                                                <div class="form-group">
                                                                    <div class="col-lg-3">
                                                                        <label>Síntomas:</label>
                                                                    </div> 
                                                                    <div class="col-lg-9">
                                                                        <?php $sintomas = $_SESSION["r_sintomas"][$cont]; ?>
                                                                        <input type="text" class="form-control" value="<?php echo $sintomas;?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-lg-3">
                                                                        <label>Diagnóstico:</label>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <textarea class="form-control" id="diagnostico" value="<?php echo $_SESSION["p_DNI"];?>"></textarea>
                                                                    </div> 
                                                                </div>
                                                            </div>

                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer">
                                                                <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </tbody>
                                    </table>   
                                    
                                </div>
                            </div>
                </div>
                <?php
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
  $("#menu").load("menu_recepcionista.html"); 
});
</script>
</body>

</html>