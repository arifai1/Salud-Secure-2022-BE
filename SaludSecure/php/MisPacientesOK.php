<?php
    include_once("db.php");


    $nombrepac = $_POST["usuario"];
    $id = "SELECT idpaciente FROM `paciente` WHERE usuario = $nombrepac";
    // echo $id;
    $res = $con->query($id);
    
    // echo "---------------------";
    // echo $res;
    // echo "---------------------";
    
    if($res){
        $id_paciente = $res->fetch_assoc()["idpaciente"];
    } else {

    }
    // var_dump($id_paciente);
    session_start();
    //echo $_SESSION["user"] . "\n";
    //echo $id_paciente . "\n";
    $sql = "INSERT INTO medico_paciente (idmedico,idpaciente) VALUES ('" . $_SESSION['user'] . "','" . $id_paciente . "')"; 
    $res2 = $con->query($sql);     
    // var_dump($res2);
    if($res2){														
        $data['status']='ok';   //falta agarrar los datos y mostrarlos en las pantallas correspondientes.
        // $arraysID= array();
        // $arraysID="SELECT idpaciente FROM medico_paciente WHERE idmedico = '". $_SESSION["user"] ."'";
        // for i in $arraysID:{           
        //    $ids = "SELECT * FROM paciente WHERE idpaciente=$arraysID[i]";
        // }

        $sql2 = "SELECT DISTINCT nombre, apellido, credencial, nacimiento, usuario FROM paciente LEFT JOIN medico_paciente ON (paciente.idpaciente = medico_paciente.idpaciente) WHERE medico_paciente.idmedico = '". $_SESSION["user"] ."'"; //hacemos un SELECT DISTINCT en vez de un GROUP BY para que me seleccione una sola vez los pacientes, sin repetirlos. 
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
            $data['result']= 'No hay pacientes';
        }
	}else{
        $data['status']='err';
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
    <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="../js/saludsecure.js" type="text/javascript"></script>
    <title>Mis Pacientes</title>
    <link rel="stylesheet" href="../css/MisPacientes.css">  
    <link rel="Icon" href="../imagenes/logo-Header.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header>
        <label id="Txtlogo">BESMO</label>
        <label id="headertitle"> Mis Pacientes</label>
        <input id="logo"type="button">
        <div id="LogOut">
            <input type ="button" class="minibutton" value="Log Out"/>
        </div>
        <input id="Usuario"type ="button"/>
       
    </header>
    <div id="headerbuscador">
        <input type="search" class="buscador" placeholder="Puedes buscar por nombre, apellido, edad, dni">
        <i class="large material-icons" id="buscar">search</i>
    </div>


    <div id="background">
   
    <div class="paciente" id="losPacientesAsignados">
        <?php
        //tengo que mandar al doctor por POST antes de tocar el boton para ir a MisPacientes.php
            if(count($userData3) == 0){
                echo "No hay pacientes";
            } else {
                foreach($userData3 as $p){ 
                    echo $p;
                }
            }
        ?>
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






  

