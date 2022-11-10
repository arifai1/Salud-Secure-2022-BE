<?php
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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="../js/saludsecure.js" type="text/javascript"></script>
    <script src="../js/metaMask.js" type="text/javascript"></script>
    <script src="../js/saludSecureABI.js" type="text/javascript"></script>
    <script src="../js/saludsecure.js" type="text/javascript"></script>
    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
    <script language="javascript" type="text/javascript" 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<script>
        var web3 = new Web3(window.ethereum);
        var contract = new web3.eth.Contract(contract_abi, "0x633284cb7e86cf89C42297FA5b533e9aB1F0dA18");
        async () => {
            web3 = await ethereum.request({ method: 'eth_requestAccounts'});
        }
        async function connectWallet() {
            userAccount = web3.currentProvider.selectedAddress
            console.log(userAccount)     
        }
        function setearMedico() {
            $("#txStatus").text("Asignando medico. Puede tardar un rato...");
            var nombrePaciente;
            var especializacion;
            nombreApellido = (document.getElementById('NomMed').value) + (" ") +(document.getElementById('ApeMed').value);
            especializacion = document.getElementById('AreaMed').value;
            var txn = contract.methods.set_Medico(nombreApellido, especializacion)
            txn = txn.send({from:web3.eth.currentProvider.selectedAddress});
            txn.then(t => {
                console.log(t)
            }).catch(e => {
                console.log(e)
            })
            return setearMedico.send({
                    from: userAccount
                })
                .on("receipt", function (receipt) {
                    $("#txStatus").text("Nuevo medico asignado");
                })
                .on("error", function (error) {
                    $("#txStatus").text(error);
                });
        }
        async function conexionWeb3(){
        //import detectEthereumProvider from '@metamask/detect-provider';
		    if (typeof window.ethereum !== "undefined" || window.ethereum._state.account == undefined) {   
                const accounts = await ethereum.request({ method: 'eth_requestAccounts'});
                mirarRecetas();
                if(accounts.length !== null){
                connectWallet();
                sendReceta();
                    //DIV QUE DIGA METAMASK CONECTADO!
                }                                      
            }
	        else{
		        alert("No tiene instalado MetaMask, por favor instalelo");  
                await window.open("https://metamask.io/download/", "_blank")
		    }
        }
        var button = document.getElementById("RegistrarMed")
        button.addEventListener("click", conexionWeb3, setearReceta)  
    </script>
</body>
</html>




