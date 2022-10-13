<?php
include_once("db.php");
$data=array();

	$sql="SELECT idmedico, nombre, apellido from medico where usuario='".$_REQUEST['usum']."' and contrasena='".$_REQUEST['passm']."'";	
	$res=$con->query($sql);
	$i=0;
	if($res->num_rows > 0){ 																//num_rows me da el numero de filas como 		resultado, me da la cantidad de filas de res, nos sirve para saber si existen filas o no.
		$userData = $res->fetch_assoc(); 												    //lo que hago aca con el fetch_assoc ordeno el nombre en cada columna, con us apellido, etc, mas estructurado. Esto lo hacemos porque sino cuando yo lo quiera usar, no los voy a poder buscar en res. userData es un array.
		/*while($userData = $res->fetch_assoc());
		$data['status'] = 'ok';
		$data[$i] =$userData;
		$i++;
		}*/
		$data['status']='ok';
    	$data['result']= $userData;
		/*session_start()
			 = 'usuario';
			echo $_SESSION['idmedSes'];*/
	}else{
		$data['status']='err';
    	$data['result']= '';
	}
	echo json_encode($data);
	$con->close();						                                                      

?>

