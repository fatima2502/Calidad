<?php
session_start();
include 'historial.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Buscar Historial Clínico</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	include 'serv.php';
	if(isset($_POST['cita']) && !empty($_POST['cita'])){
		$dni = $_POST['dni'];
		$estado = $_POST['estado'];
		if ($dni!="" && $estado!="Seleccionar"){
			$rpta=listar_citas($dni,$estado);
		}
		elseif($dni!=""){
			$rpta=listar_citas_by_dni($dni);
		}
		elseif($estado!="Seleccionar"){
			$rpta=listar_citas_by_estado($estado);
		}
		$_SESSION["nro_citas"]=0;
		if($rpta > 0){
			$_SESSION["nro_citas"]= $rpta;
			echo '<script> window.location="consultar_cita.php";</script>';	
		}else{
			session_destroy();
			echo '<script> alert("Cita No encontrada");</script>';
			echo '<script> window.location="consultar_cita.php";</script>';
		}
	}
	?>
</body>

</html>