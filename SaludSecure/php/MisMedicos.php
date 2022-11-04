<?php
    include_once("db.php");
    session_start();
    $data['status']='ok';   
    $sql2 = "SELECT DISTINCT nombre, apellido, area, telefono FROM medico LEFT JOIN medico_paciente ON (medico.idmedico = medico_paciente.idmedico) WHERE medico_paciente.idpaciente = '". $_SESSION["user"] ."'"; //hacemos un SELECT DISTINCT en vez de un GROUP BY para que me seleccione una sola vez los pacientes, sin repetirlos. 
    $res3 = $con->query($sql2);
    if($res3->num_rows > 0){
        $userData3 = array();            
        while($fila = $res3->fetch_assoc()){
            $userData3[] = $fila;
        }
        $data['status']='ok';
        $data['result']= $userData3;
    }else{
        $data['status']='err';
        $data['result']= 'No hay medicos';
    }
    echo json_encode($data);
    $con->close();
    //die();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/MisMedicos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="../js/saludsecure.js" type="text/javascript"></script>
	<link rel="Icon" href="../imagenes/logo-Header.png">
    
    <title>Mis Medicos</title>
</head>
<body>
    <header>
        <label id="Txtlogo">Mis medicos</label>        
        <label id="headertitle"> Mis Medicos </label>
        <input id="logo"type="button">
        <div id="LogOut">
            <input type ="button" id="LO_M" class="minibutton" value="Log Out"/>
        </div>
        <input id="Usuario"type ="button"/>
    </header>
    
    <div id="headerbuscador">
        
    </div>
    
   <div id="background">
    
    </div>
    <!--BTN Regresar-->
    <input type="button" value="?" class="ayuda" >
    <a class="btn-floating btn-large waves-effect" id="RegresarP"><i id="IconregresarP" class="material-icons">arrow_back</i></a>
    <div id="background">
   
    <div class="paciente" id="losPacientesAsignados">
        <?php
        //tengo que mandar al doctor por POST antes de tocar el boton para ir a MisPacientes.php
            if(count($userData3) == 0){
                echo "No hay medicos";
            } else {
                $med="<table border=0><tr><td width='15%'>Nombre</td><td width='15%'>Apellido</td><td width='10%'>Area</td><td width='20%'>Telefono</td></tr>";
                foreach($userData3 as $p){      ////le asignamos a la variable $med los campos que queremos mostrar del array de usuarios asignados y en las lineas de abajo los ubicamos en las columnas que creamos arriba.
                    $med.="<tr><td>".$p["nombre"]."</td>";
                    $med.="<td>".$p["apellido"]."</td>";
                    $med.="<td>".$p["area"]."</td>";
                    $med.="<td>".$p["telefono"]."</td>";
                    /* 
                    echo "<div class='pacientes'>";
                    echo "<label> Nombre: </label>";
                    echo "<label>". $p["nombre"] ."</label>";
                    echo "<label> \n </label>";
                    echo "<label> Apellido: </label>";
                    echo "<label>". $p["apellido"] ."</label>";
                    echo "<label>  Area: </label>";
                    echo "<label>". $p["area"] ."</label>";
                    echo "<label> Telefono: </label>";
                    echo "<label>". $p["telefono"] ."</label>";*/
                }
                $med.="</table>";
                echo $med;
            }
        ?>
    </div>

</body>

</html>