<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../html/pantallainicio.html');
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/MisRecetas.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <UTF-8>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="../js/saludsecure.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="../js/SobreBesmo.js" type="text/javascript"></script>
	<link rel="Icon" href="../imagenes/logo-Header.png">
    
   
    <title>Document</title>
</head>
<body>
    <header>
        <label id="Txtlogo">BESMO</label>
       
        <label id="headertitle"> Mis Recetas </label>
        <input id="logo"type="button">
        <div id="LogOut">
            <input type ="button" class="minibutton" value="Log Out"/>
        </div>
        <input id="Usuario"type ="button"/>
    </header>
    <div id="recetasContainer">
        
        <div id="item1"class="receta">
        <label id="lbl1">Tratamiento</label>
        <label id="lbl2">Fecha</label>
        </div>
       
       
    </div>
    <a id="Izq"><i id="chevron_left" class="material-icons">chevron_left</i></a>
    <a id="Der"><i id="chevron_right" class="material-icons">chevron_right
    </i></a>
    
    <input type="button" value="?" class="ayuda">
    <a class="btn-floating btn-large waves-effect" id="RegresarP"><i id="IconregresarP" class="material-icons">arrow_back</i></a>
   
</body>
</html>