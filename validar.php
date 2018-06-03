<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
		<title>Validando</title>
		<meta charset="utf-8">
</head>
<body>
	<?php
		include 'serv.php';
		if(isset($_POST['login']) && !empty($_POST['login'])){
			$usuario = $_POST['user'];
			$pw = $_POST['pw'];
			$log = mysqli_query($conect,"SELECT * FROM usuario WHERE u_username='$usuario' AND u_password='$pw'");
			if(mysqli_num_rows($log)>0){
				$row = mysqli_fetch_array($log);
				$_SESSION["u_username"] = $row['u_username'];
				$_SESSION["u_tipo"] = $row['u_tipo'];
				switch($_SESSION["u_tipo"]){
					case 1: $_SESSION["u_menu"]="menu_administrador.html";
							break;
					case 2: $_SESSION["u_menu"]="menu_medico.html";
							break;
					case 3: $_SESSION["u_menu"]="menu_recepcionista.html";
							break;
				}
				echo '<script> window.location="pages/panel.php";</script>';
			}else{
				echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
				echo '<script> window.location="index.php";</script>';
			}
		}
	?>

</body>