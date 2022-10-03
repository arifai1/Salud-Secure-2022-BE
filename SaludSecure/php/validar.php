<?php
include_once("db.php");

$data=array();

echo "hola";

//if ($_REQUEST ['que']=='L'){     															//el REQUEST es lo que le llega de la pantalla
	$sql="SELECT IDpaciente, nombre, apellido from paciente where usuario='".$_REQUEST['usu']."' and contrasena='".$_REQUEST['pass']."'";	
																							//$res =$con -> query($sql);   //con el query le llega a la bbdd la sentencia de arriba. Lo devuelve en forma organizada.
	//echo $sql;
	$res=$con->query($sql);
	$i=0;
	if($res->num_rows > 0){ 																//num_rows me da el numero de filas como 		resultado, me da la cantidad de filas de res, nos sirve para saber si existen filas o no.
		$userData = $res->fetch_assoc(); 												    
		$data['status']='ok';
    	$data['result']= $userData;
	}else{
		$data['status']='err';
    	$data['result']= '';
	}
	//retorno los datos en formato JSON
	echo json_encode($data);
	$con->close();						                                                       

?>

