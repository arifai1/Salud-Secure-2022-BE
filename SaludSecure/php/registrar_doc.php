<?php
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
    <script language="javascript" type="text/javascript" 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" 
    src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.8.0/web3.min.js"></script>
    link href="" rel="shortcut icon">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
include_once("db.php");

$data=array();
    												
	$sql="SELECT idmedico from medico where usuario='".$_REQUEST['usum'] . "'";	
	$res=$con->query($sql);
	
	if($res->num_rows > 0){ 		//ya existe un usuario														
											
		$data['status']='err';
    	$data['result']= '';
	}else{							//como no existe el usuario, va a registrarse con ese nombre, por lo tanto ejecutamos y preparamos al sql.
		$sql= "INSERT INTO medico (usuario,contrasena,nombre,apellido,area,telefono) VALUES ('".$_REQUEST['usum']."','".$_REQUEST['passm']."','".$_REQUEST['nom']."','".$_REQUEST['ape']."','".$_REQUEST['Aream']."','".$_REQUEST['telefonoMed']."')";    //'".$_REQUEST['DNI']."',	
		$res=$con->query($sql);
		if($res==1){
			$data['status']='ok';
			$data['result']= '1';
		}else{
			$data['status']='error';
			$data['result']= '1';
		}
	}

	
	echo json_encode($data);
	$con->close();	
	



?>




