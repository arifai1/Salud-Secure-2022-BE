<?php
include_once("db.php");


$data=array();
	
    $sql="SELECT IDpaciente from paciente where usuario='".$_REQUEST['usu'] . "'";
	$res=$con->query($sql);
	
	if($res->num_rows > 0){ 		//ya existe un usuario														
											
		$data['status']='err';
    	$data['result']= '';
	}else{							//como no existe el usuario, va a registrarse con ese nombre, por lo tanto ejecutamos y preparamos al sql.
		$sql= "INSERT INTO paciente (usuario,contrasena,nombre,apellido,credencial,nacimiento) VALUES ('".$_REQUEST['usu']."','".$_REQUEST['pass']."','".$_REQUEST['nom']."','".$_REQUEST['ape']."','".$_REQUEST['Credencial']."','".$_REQUEST['FechadeNacimiento']."')"; //'".$_REQUEST['DNI']."',
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
	async function myFunction() {
        const provider = new ethers.providers.JsonRpcProvider('https://rpc-mumbai.maticvigil.com'); 
        const contract_address = '0xc2c4106be5581A131dC9ced2bd6FFCa3b0B0E9E5' ;
        const SaludSecure = new ethers.Contract(contract_address,contract_abi, provider); 
        const txn = SaludSecure.methods.ver_Receta().call(); 
        txn.then(function(result) {
            alert(result) 
        })
    }
?>




