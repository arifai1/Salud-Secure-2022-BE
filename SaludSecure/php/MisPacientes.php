<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../html/pantallainicio.html');
    }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mis Pacientes</title>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <UTF-8>
        <link rel="stylesheet" href="../css/MisPacientes.css">
        <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="../js/saludsecure.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header>
        <label id="Txtlogo">BESMO</label>
        <label id="headertitle">Mis pacientes</label>
        <input type="button" id="logo">
        <div id="LogOut">
            <input type="button" class="minibutton" value="Log Out" id="LO_M">
        </div>
        <input id="Usuario" type="button">


    </header>

    <!--BTN Regresar-->
    <input type="button" value="?" class="ayuda">
    <a class="btn-floating btn-large waves-effect" id="RegresarM"><i id="Iconregresar" class="material-icons">arrow_back</i></a>


    <div id="background">
        <input type="search" class="buscador">

        <i class="large material-icons" id="buscar">search</i>
    </div>
</body>

</html>