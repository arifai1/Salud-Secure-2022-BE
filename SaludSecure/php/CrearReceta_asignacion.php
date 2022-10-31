<?php
    include_once("db.php");


    $nombrepac = $_POST["usuario"];
    $id = "SELECT idpaciente FROM `paciente` WHERE usuario = $nombrepac";
    // echo $id;
    $res = $con->query($id);
    $id_paciente = $res->fetch_assoc()["idpaciente"];
    // var_dump($id_paciente);
    session_start();
    //echo $_SESSION["user"] . "\n";
    //echo $id_paciente . "\n";
    $sql = "INSERT INTO medico_paciente (idmedico,idpaciente) VALUES ('" . $_SESSION['user'] . "','" . $id_paciente . "')"; 
    $res2 = $con->query($sql);     
    // var_dump($res2);
    if($res2){														
        $data['status']='ok';   //falta agarrar los datos y mostrarlos en las pantallas correspondientes.
        $sql2 = "SELECT nombre, apellido, credencial, nacimiento, usuario FROM paciente LEFT JOIN medico_paciente ON (paciente.idpaciente = medico_paciente.idpaciente)";
        $res3 = $con->query($sql2);
        if($res3->num_rows > 0){ 																//num_rows me da el numero de filas como resultado, me da la cantidad de filas de res, nos sirve para saber si existen filas o no.
            $userData3 = $res3->fetch();//fetch_assoc(); 												    
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








   
    
    //$data=array();
	//$sql2="SELECT nombre, apellido, area, telefono FROM medico WHERE idmedico=. $_SESSION['user'] .	AND idpaciente='" . $id_paciente . "'";
	// $res=$con->query($sql2);
	// if($res->num_rows > 0){ 																
	// 	$userData = $res->fetch_assoc(); 												    
	// 	$data['status']='ok';
    // 	$data['result']= $userData;
	// 	session_start();
	// 	$_SESSION['user']=$userData["IDpaciente"];
	// }else{
	// 	$data['status']='err';
    // 	$data['result']= '';
	// }
	// echo json_encode($data);
	//$con->close();			

?>

