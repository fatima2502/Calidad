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

    <title>Actualizar Historia Clínica</title>

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
                    <h1 class="page-header">Actualizar Historia Clínica</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Buscar Historia Clínica
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" method='post' action="buscar.php">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <label>N° de Historia Clínica:</label>
                                            </div>  
                                            <div class="col-lg-6">
                                                <input class="form-control" name="nhc" type="number" autofocus>
                                            </div>         
                                        </div>                         
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col-lg-3">
                                                <label>N° de DNI:</label>
                                            </div> 
                                            <div class="col-lg-5">
                                                <input class="form-control" name="codigo" type="number" autofocus>
                                            </div> 
                                            <div class="col-lg-4" align="right">
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
            if(isset($_SESSION['hc_codigo'])){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Historia Clínica
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <h3 align="center">Detalles del Paciente</h3>
                                </br>
                                <form role="form" method='post' action="buscar.php">
                                    <fieldset disabled>
                                        <div class="form-group">
                                            <div class="col-lg-2">
                                                <label>N° de DNI:</label>
                                            </div> 
                                            <div class="col-lg-4">
                                                <input class="form-control" name="n_codigo" type="text" value="<?php echo $_SESSION["pa_DNI"];?>" autofocus>
                                            </div> <div class="col-lg-2">
                                            <label>Peso:</label>
                                        </div> 
                                        <div class="col-lg-4">
                                            <input class="form-control" name="peso" type="number" value="<?php echo $_SESSION["hc_peso"];?>" autofocus>
                                        </div>  
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-2">
                                            <label>Nombres:</label>
                                        </div> 
                                        <div class="col-lg-4">
                                            <input class="form-control" name="nomb" type="text" value="<?php echo $_SESSION["p_nombre"];?>" autofocus>
                                        </div> <div class="col-lg-2">
                                        <label>Talla:</label>
                                    </div> 
                                    <div class="col-lg-4">
                                        <input class="form-control" name="talla" type="number" value="<?php echo $_SESSION["hc_talla"];?>" autofocus>
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-2">
                                        <label>Apellidos:</label>
                                    </div> 
                                    <div class="col-lg-4">
                                        <input class="form-control" name="ape" type="text" value="<?php echo $_SESSION["p_apellido"];?>" autofocus>
                                    </div> 
                                    <div class="col-lg-2">
                                        <label>Alergia:</label>
                                    </div> 
                                    <div class="col-lg-4">
                                        <input class="form-control" name="alergia" type="text" value="<?php echo $_SESSION["hc_alergia"];?>" autofocus>
                                    </div>  
                                </div> 
                                <div class="form-group">
                                    <div class="col-lg-2">
                                        <label>Fecha de Nacimien.:</label>
                                    </div> 
                                    <div class="col-lg-4">
                                        <input class="form-control" name="fechnac" type="date" value="<?php echo $_SESSION["p_fech_nac"];?>" autofocus>
                                    </div> 
                                    <div class="col-lg-2">
                                        <label>Grupo Sanguíneo:</label>
                                    </div> 
                                    <div class="col-lg-4">
                                        <input class="form-control" name="gs" type="text" value="<?php echo $_SESSION["hc_tipo_sangre"];?>" autofocus>
                                    </div> 
                                </div> 
                                <div class="form-group">
                                    <div class="col-lg-2">
                                        <label>Género:</label>
                                    </div> 
                                    <div class="col-lg-10">
                                        <div class="col-lg-5 row">
                                            <input class="form-control" name="genero" type="text" value="<?php echo $_SESSION["p_genero"];?>" autofocus>
                                        </div> </div>
                                    </div>  
                                    <div class="form-group">
                                        <div class="col-lg-2">
                                            <label>Adicional:</label>
                                        </div> 
                                        <div class="col-lg-10">
                                            <input class="form-control" name="adicional" type="text" value="<?php echo $_SESSION["hc_adicional"];?>" autofocus>
                                        </div>
                                    </div> 
                                </fieldset>
                            </form>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <h3 align="right">Detalles de Resultados</h3>
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-3">
                                    </br>
                                    <!-- Button to trigger modal -->
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modalForm">
                                        + Nuevo Resultado
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalForm" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel" align="center">Nuevo Resultado</h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <form role="form">
                                                    <div class="modal-body">
                                                        <p class="statusMsg"></p>
                                                        <div class="form-group">
                                                            <div class="col-lg-3">
                                                                <label for="inputEmail">Síntomas:</label>
                                                            </div> 
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" id="inputEmail"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-lg-3">
                                                                <label for="inputMessage">Diagnóstico:</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <textarea class="form-control" id="inputMessage" ></textarea>
                                                            </div> 
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-lg-12">
                                                                <button type="button" class="btn btn-success openBtn pull-right">+ Añadir Receta</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary submitBtn" onclick="submitContactForm()">Guardar</button>
                                                        <button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div> </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="table-responsive">
                                    <table width="automatic" class="table table-hover table-striped table-bordered table-hover" id="myTable">
                                        <thead>
                                            <tr class="header">
                                                <th>N°</th>
                                                <th>Fecha</th>
                                                <th>Diagnóstico</th>
                                                <th>Receta</th>
                                                <th>Detalles</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'historial.php';

                                            $i=listar_resultados($_SESSION["hc_codigo"]);
                                            $cont=0;
                                            while($cont < $i ){
                                                $log4 = buscar_receta($_SESSION["res_cod_res"][$cont]);
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
                                                echo "<td><button class='btn btn-success' data-toggle='modal' data-target='#detalle_resultado'>Ver</button></td>";
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
                            <div class="text-center">
                                <button type="submit" class="btn btn-large btn-primary">Actualizar</button>
                                <button type="reset" class="btn btn-large btn-primary">Cancelar</button>  
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