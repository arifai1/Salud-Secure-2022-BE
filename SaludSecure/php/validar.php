<?php
include_once("db.php");

$data=array();
	$sql="SELECT IDpaciente, nombre, apellido from paciente where usuario='".$_REQUEST['usu']."' and contrasena='".$_REQUEST['pass']."'";	
	$res=$con->query($sql);
	$i=0;
	if($res->num_rows > 0){ 																//num_rows me da el numero de filas como 		resultado, me da la cantidad de filas de res, nos sirve para saber si existen filas o no.
		$userData = $res->fetch_assoc(); 												    
		$data['status']='ok';
    	$data['result']= $userData;
		session_start();
		$_SESSION['user']=$userData['idpaciente'];
	}else{
		$data['status']='err';
    	$data['result']= '';
	}
	echo json_encode($data);
	$con->close();						                                                       

?>

