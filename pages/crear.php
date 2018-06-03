<?php
session_start();
include 'historial.php';
include 'serv.php';
if(isset($_POST['crear_hc']) && !empty($_POST['crear_hc'])){
	$DNI = $_POST['dni'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$fecha = $_POST['fecha'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$genero = $_POST['genero'];
	$rpta=crear_historia($DNI, $nombre, $apellidos, $genero, $fecha, $direccion, $telefono);
	if($rpta>0){
		echo '<script> alert("HC Creada con éxito");</script>';
	}else{
		echo '<script> alert("No se creo el HC");</script>';
	}
	echo '<script> window.location="crear_hc.html";</script>';	
}
?>
