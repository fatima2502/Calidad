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
	if(isset($_POST['actualizar_hc']) && !empty($_POST['actualizar_hc'])){
		$HC = $_POST['nhc'];
		$dni = $_POST['codigo'];
		$rpta=0;
		if($dni == ""){
			$rpta=buscar_historia($HC);	
			$rpta1 = buscar_paciente($_SESSION['hc_cod_pac']);
		}
		else{
			$rpta1=buscar_paciente_by_dni($dni);
			$rpta=buscar_historia_by_codpac($_SESSION['pa_codigo']);	
		}
		if($rpta > 0){
			if($rpta1>0){
				$rpta2 = buscar_persona($_SESSION['pa_DNI']);
				if($rpta2>0){
					echo '<script> alert("Historial Encontrado");</script>';
					echo '<script> window.location="actualizar_hc.php";</script>';	
				}else{
					echo '<script> alert("Persona No encontrada");</script>';
					echo '<script> window.location="actualizar_hc.php";</script>';
				}
			}else{
				echo '<script> alert("Paciente No encontrado");</script>';
				echo '<script> window.location="actualizar_hc.php";</script>';
			}
		}else{
			echo '<script> alert("Historial No encontrado");</script>';
			echo '<script> window.location="actualizar_hc.php";</script>';
		}
	}
	?>
</body>

</html>