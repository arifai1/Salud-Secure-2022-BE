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