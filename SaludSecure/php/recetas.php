<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../html/pantallainicio.html');
    }?>

<!DOCTYPE html>

<head>
	<meta http-equiv="Contet-Type" content="text/html; charset=UTF-8">
	<title>Mis Recetas</title>

	<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="../js/saludsecure.js" type="text/javascript"></script>


</head>

<body>
	<div ud="contenedor">
		<div id="log">
			<label id="5" class="caja">Busca tu receta!</label>
			<form id="form" role="search">
				<input type="search" id="query" name="q" placeholder="Search..."
					aria-label="Search through site content">
				<input type="submit" value="Buscar" id="Buscar" class="boton" />
			</form>
			<a href="./pantallaprincipal.php">Regresar</a>

			<div id="divt">
			
			
</body>