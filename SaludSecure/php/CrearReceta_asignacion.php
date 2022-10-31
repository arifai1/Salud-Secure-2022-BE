<?php
    include_once("db.php");


    $nombrepac = $_POST["usuario"];
    $id = "SELECT idpaciente FROM `paciente` WHERE usuario = $nombrepac";
    // echo $id;
    $res = $con->query($id);
    $id_paciente = $res->fetch_assoc()["idpaciente"];
    // var_dump($id_paciente);
    session_start();
    echo $_SESSION["user"] . "\n";
    echo $id_paciente . "\n";
    $sql = "INSERT INTO medico_paciente (idmedico,idpaciente) VALUES ('" . $_SESSION['user'] . "','" . $id_paciente . "')"; 
    $res2 = $con->query($sql);     //falta mostrar los datos en pantalla.
    var_dump($res2);
    if($res2){														
        $data['status']='ok';
		// $_SESSION['user']=$userData["IDpaciente"];
	}else{
		$data['status']='err';
	}

    echo json_encode($data);
    $con->close();	
?>

