<?php

$con = new mysqli("localhost", "root", "rootroot");
mysqli_select_db($con,"saludsecure");

if ($con->connect_error){
	die("Connection failed: ".$con ->connect_error);
}

$data=array();

    												
	$sql="SELECT IDpaciente from paciente where usuario='".$_REQUEST['Dni']."' AND contrasena='".$_REQUEST['pass']."'";
	$res=$con->query($sql);
	
	if($res->num_rows > 0){ 		//ya existe un usuario														
											
		$data['status']='err';
    	$data['result']= '';
	}else{							//como no existe el usuario, va a registrarse con ese nombre, por lo tanto ejecutamos y preparamos al sql.
		$sql= "INSERT INTO paciente (usuario,contrasena,nombre,apellido,dni,credencial,nacimiento) VALUES ('".$_REQUEST['usu']."','".$_REQUEST['pass']."','".$_REQUEST['nom']."','".$_REQUEST['ape']."','".$_REQUEST['DNI']."','".$_REQUEST['Credencial']."','".$_REQUEST['FechadeNacimiento']."')";
		//$sql= "INSERT INTO paciente (usuario,contrasena,nombre,apellido,dni,credencial,nacimiento) VALUES ('13295409','aro','marcelo','aro','13295409','12321232111','')";
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




