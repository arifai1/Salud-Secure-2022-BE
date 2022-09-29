<?php

$con = new mysqli("localhost", "root", "rootroot");
mysqli_select_db($con,"saludsecure");

if ($con->connect_error){
	die("Connection failed: ".$con ->connect_error);
}
else {
    $nombrepac= $_POST["usuario"];
    $id = "SELECT idpaciente FROM `paciente` WHERE usuario = $nombrepac";
    $sql = "INSERT INTO medico_paciente (idmedico,idpaciente) VALUES ("19","$id")";     //Falta hacer SESSIONS para que el ID del medico sea obligatoriamente con el que se Loguea, como una firma. De esta manera vamos a poder hacer luego la autoasignacion con 2 SELECT más. 
}	
echo json_encode($data);
$con->close();	
?>

