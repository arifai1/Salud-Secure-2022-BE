<?php

$con = new mysqli("localhost", "root", "rootroot");
mysqli_select_db($con,"saludsecure");

if ($con->connect_error){
	die("Connection failed: ".$con ->connect_error);
}

$data=array();

    												
	$sql="Select IDusuario from usuarios where usuario='".$_REQUEST['usu']."' and contrasena='".$_REQUEST['pass']."'";
	$res=$con->query($sql);
	
	if($res->num_rows > 0){ 		//ya existe un usuario														
											
		$data['status']='err';
    	$data['result']= '';
	}else{							//como no existe el usuario, va a registrarse con ese nombre, por lo tanto ejecutamos y preparamos al sql.
		$sql= "INSERT INTO usuarios (usuario,contrasena,nombre,apellido,dni,mail) VALUES ('".$_REQUEST['usu']."','".$_REQUEST['pass']."','".$_REQUEST['nom']."','".$_REQUEST['ape']."','".$_REQUEST['dni']."','".$_REQUEST['mail']."')";
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




