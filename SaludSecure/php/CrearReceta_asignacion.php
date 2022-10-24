<?php
    include_once("db.php");

    $nombrepac = $_POST["usuario"];
    $id = "SELECT idpaciente FROM `paciente` WHERE usuario = $nombrepac";
    $sql = "INSERT INTO medico_paciente (idmedico,idpaciente) VALUES (" . $_SESSION['user'] . "," . $id . ")"; 
	
    //falta hacer la query para poder modificar la bbdd y hacer la asignacion. 

    echo json_encode($data);
    $con->close();	
?>

