<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../html/pantallainicio.html');
    }?>

<!DOCTYPE html>

<head>
	<meta http-equiv="Contet-Type" content="text/html; charset=UTF-8">
	<title>Acerca de BESMO</title>


	<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="../js/saludsecure.js" type="text/javascript"></script>	
	<link rel="Icon" href="../imagenes/logo-Header.png">


</head>

<body>
	<div id="contenedor">
		<div id="log">
			<label id="1" class="caja">Somos estudiantes de TIC</label>
			<a href="./pantallaprincipal.php">Regresar</a>
			<div id="divt">
			</div>
</body>