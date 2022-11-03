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
        <label id="Txtlogo">BESMO</label>        
        <label id="headertitle"> Mis Medicos </label>
        <input id="logo"type="button">
        <div id="LogOut">
            <input type ="button" id="LO_M" class="minibutton" value="Log Out"/>
        </div>
        <input id="Usuario"type ="button"/>
    </header>
    
    <div id="headerbuscador">
        <!-- <input type="search" class="buscador" placeholder="Puedes buscar por nombre, apellido, edad, dni">
        <i class="large material-icons" id="buscar">search</i> -->
    </div>
    
   <div id="background">
    <!-- <div class="medico">
        hola
    </div> -->

    <!-- <div id="ResetasMedicas">
     code
    </div> -->
    </div>
    <!--BTN Regresar-->
    <input type="button" value="?" class="ayuda" >
    <a class="btn-floating btn-large waves-effect" id="RegresarP"><i id="IconregresarP" class="material-icons">arrow_back</i></a>
    <div id="background">
   
    <div class="paciente" id="losPacientesAsignados">
        <?php
        //tengo que mandar al doctor por POST antes de tocar el boton para ir a MisPacientes.php
            if(count($userData3) == 0){
                echo "No hay pacientes";
            } else {
                foreach($userData3 as $p){ 
                    echo "<div class='pacientes'>";
                    echo "<label> Nombre: </label>";
                    echo "<label>". $p["nombre"] ."</label>";
                    echo "<label> \n </label>";
                    echo "<label> Apellido: </label>";
                    echo "<label>". $p["apellido"] ."</label>";
                    echo "<label>  Area: </label>";
                    echo "<label>". $p["area"] ."</label>";
                    echo "<label> Telefono: </label>";
                    echo "<label>". $p["telefono"] ."</label>";
                }
            }
        ?>
    </div>
    
    <!-- <div id=MisMedicos>
        <label>hola</label>
    </div> -->


</body>

</html>