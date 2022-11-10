<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../html/pantallainicio.html');
    }?> 

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Contet-Type" content="text/html; charset=UTF-8">
	<title>Menu Principal</title>

	<!--<link rel="stylesheet" href="../css/styles_Buttons.css">
<link rel="stylesheet" href="../css/styles_Layout.css">-->
	<link rel="stylesheet" href="../css/MenuPrincipal.css">
	
	<link rel="Icon" href="../imagenes/logo-Header.png">
	<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="../js/saludsecure.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/font.css">

</head>

<body id="MPbody">
	<header>
		<label id="Txtlogo">Menu principal</label>
		<label id="headertitle">.</label>
		<input type="button" id="logo">
		<div id="LogOut">
			<input type="button"  value="Log Out" id="LO_M">
		</div>
		<input id="Usuario" type="button">

		</div>
	</header>
	<input type="button" value="?" class="ayuda">

	<div id="contenedor">
		<div id="log">
			<form id="mainMenuform">
				<input type="button" id="NosotrosM" class="bigBTN"/> <!--value= echo $_SESSION['user']"/>   esto es para mostrar la variable de sesión-->
				<input type="button" id="CrearRec" class="bigBTN" />
				<input type="button" id="MisPacientes" class="bigBTN" />

			</form>
			<div id="divt">
			</div>
		</div>
</body>

</html>