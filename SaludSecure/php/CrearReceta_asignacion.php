<?php
    include_once("db.php");
    
    echo "TEST";

    $nombrepac= $_POST["usuario"];
    $id = "SELECT idpaciente FROM `paciente` WHERE usuario = $nombrepac";
    $sql = "INSERT INTO medico_paciente (idmedico,idpaciente) VALUES (" . $_SESSION['user'] . "," . $id . ")"; 
	
    echo json_encode($data);
    $con->close();	
?>

