<?php
    include_once("db.php");
    
    echo "TEST";

    $nombrepac= $_POST["usuario"];
    $id = "SELECT idpaciente FROM `paciente` WHERE usuario = $nombrepac";
    $sql = "INSERT INTO medico_paciente (idmedico,idpaciente) VALUES (" . $_SESSION['user'] . "," . $id . ")";     //Falta hacer SESSIONS para que el ID del medico sea obligatoriamente con el que se Loguea, como una firma. De esta manera vamos a poder hacer luego la autoasignacion con 2 SELECT más. 
	
    echo json_encode($data);
    $con->close();	
?>

