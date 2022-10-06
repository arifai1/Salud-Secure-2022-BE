<?php
include_once("db.php");

$data=array();

    												
	$sql="SELECT idmedico from medico where usuario='".$_REQUEST['usum']."'";
	
	$res=$con->query($sql);
	
	if($res->num_rows > 0){ 		//ya existe un usuario														
											
		$data['status']='err';
    	$data['result']= '0';
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




