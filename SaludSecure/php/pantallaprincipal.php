<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Contet-Type" content="text/html; charset=UTF-8">
	<title>Menu Principal</title>

	<!--<link rel="stylesheet" href="../css/styles_Buttons.css">
<link rel="stylesheet" href="../css/styles_Layout.css">-->
	<link rel="stylesheet" href="../css/MenuPrincipal.css">
	<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="../js/saludsecure.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body id="MPbody">
	<header>
		<label id="Txtlogo">BESMO</label>
		<label id="headertitle">Menu principal</label>
		<input type="button" id="logo">
		<div id="LogOut">
			<input type="button" class="minibutton" value="Log Out" id="LO_M">
		</div>
		<input id="Usuario" type="button">

		</div>
	</header>
	<input type="button" value="?" class="ayuda">

	<div id="contenedor">
		<div id="log">
			<form id="mainMenuform">
				<input type="button" id="NosotrosP" class="bigBTN" />
				<input type="button" id="MisRecetas" class="bigBTN" />
				<input type="button" id="MisMedicos" class="bigBTN" />

			</form>
			<div id="divt">
			</div>
		</div>
</body>

</html>