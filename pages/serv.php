<?php
	$conect = mysqli_connect("localhost", "root","","dbSGC") or die("No se encontró el servidor");
	mysqli_select_db($conect,"dbSGC") or die("No se encontró la Base de Datos");
?> 