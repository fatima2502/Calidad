<?php
session_start();
include 'serv.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Consultar Historia Clínica</title>
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
                    <h1 class="page-header">Consultar Historia Clínica</h1>
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
            if(isset($_SESSION['hc_nrohistoria'])){
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
                                                <input class="form-control" name="n_codigo" type="text" value="<?php echo $_SESSION["p_DNI"];?>" autofocus>
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
  $("#menu").load("menu_medico.html"); 
});
</script>
</body>

</html>