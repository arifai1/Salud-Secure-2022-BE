<?php
    include_once("db.php");

    $nombrepac = $_POST["usuario"];
    $id = "SELECT idpaciente FROM `paciente` WHERE usuario = $nombrepac";
    $res = $con->query($id);     
    $sql = "INSERT INTO medico_paciente (idmedico,idpaciente) VALUES (" . $_SESSION['user'] . "," . $res . ")"; 
    $res2 = $con->query($sql);     //falta mostrar los datos en pantalla.




    echo json_encode($data);
    $con->close();	
?>

