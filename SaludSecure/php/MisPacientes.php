<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="../js/saludsecure.js" type="text/javascript"></script>
    <title>Mis Pacientes</title>
    <link rel="stylesheet" href="../css/MisPacientes.css">
    <link rel="stylesheet" href="../css/font.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="Icon" href="../imagenes/logo-Header.png">
</head>
<body>
    <header>
        <label id="Txtlogo">BESMO</label>
        <label id="headertitle"> Mis Pacientes</label>
        <input id="logo"type="button">
        <div id="LogOut">
            <input type ="button" class="minibutton" value="Log Out" />
        </div>
        <input id="Usuario"type ="button"/>
       
    </header>
    <div id="headerbuscador">
        <input type="search" class="buscador" placeholder="Puedes buscar por nombre, apellido, edad, dni">
        <i class="large material-icons" id="buscar">search</i>
    </div>


    <div id="background">
   
    <div class="paciente">
        hola
    </div>
    <div id="recetasAsignadas">
     0 recetas
    </div>
    </div>


    <input type="button" value="?" class="ayuda">
    <input type="button" value="" class="regresar" id="RegresarM">
    <i class="large material-icons" id="IconregresarM">arrow_back</i>

</body>
</html>