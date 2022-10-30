<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../html/pantallainicio.html');
    }?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Crear Receta</title>
    <link rel="stylesheet" href="../css/CrearReceta.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <UTF-8>
        <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="../js/saludsecure.js" type="text/javascript"></script>
        <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
        <!--web3.js-->
        <script language="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="web3.min.js"></script>
        <script language="javascript" type="text/javascript" scr="SaludSecure_abi.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        

</head>

<body>
    <script>
        const saludSecure = [
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "medicamento_",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "cantidad_",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "aclaracion_",
				"type": "string"
			}
		],
		"name": "set_receta",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "nombre_",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "apellido_",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "DNI_",
				"type": "string"
			}
		],
		"stateMutability": "nonpayable",
		"type": "constructor"
	},
	{
		"inputs": [],
		"name": "ver_Receta",
		"outputs": [
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	}
]
            // copy the contract ABI here
            //const provider = new EtherscanProvider("goerli");
            const provider = new ethers.providers.JsonRpcProvider('https://rpc-mumbai.matic.today');   //https://goerlifaucet.com/   
            function contractInteraction() {
                const contractAddress = '0xa0ccDD96AE52777f1eCe7D1efF6A02ae7341614b'
                const connectedContract = new ethers.Contract(contractAddress, saludSecure, provider);
                const txn = connectedContract.ver_Receta() // FUNCTION NUESTRA DE MOSTRAR TODO
                alert("This is working");
                txn.then(function(result) {
                    alert(result)
                })
            }
            <input id="clickMe" type="button" value="Call Contract Function" onclick="contractInteraction();" />       
        /*var initializeContract;
        function startApp(){
            var contractAddress = "CONTRACT_ADDRESS" //Completar con el address
            initializeContract = new web3js.eth.Contract(SaludSecureABI, contractAddress);
        }
        
        
        window.addEventListener('load', function() {if (typeof web3 !== 'undefined') {
         
            web3js = new Web3(web3.currentProvider);
            } else {
                        
            }
      
            startApp()

        })

        function getRecetasDetails(id) {
            return cryptoZombies.methods.zombies(id).call()
        }*/
   </script>

    <header>
        <label id="Txtlogo">BESMO</label>
        <label id="headertitle">Menu principal</label>
        <input type="button" id="logo">
        <div id="LogOut">
            <input type="button"  value="Log Out" id="LO_M">
        </div>
        <input id="Usuario" type="button">

        </div>
    </header>
    <!--BTN Regresar-->
    <input type="button" value="?" class="ayuda">
    <a class="btn-floating btn-large waves-effect" id="RegresarM"><i id="IconregresarM"
            class="material-icons">arrow_back</i></a>
    <form action="CrearReceta.php" method="POST">
    <div id="IngresarDatos">
        <div class="smallheader">
            <label id="title1" class="titles">Ingresar datos del Paciente</label>
        </div>
        <br>
        <input placeholder="Nombre" class="txtbox">
        <br><br>
        <input placeholder="Apellido" class="txtbox">
        <br><br>
        
        <input placeholder="DNI" class="txtbox" type="number" id="dnidelpacCrearRec" name="usuario">
        
        <br><br>
        <input placeholder="Credencial" class="txtbox">
        <br><br><br><br>
       
        <input type="submit" value="Enviar" id="EnviarSC" class="minibutton"/>
        <!--HACER BOTON CON TYPE SUBMIT-->

    </div>
</form>

    <div id="CrearReceta">
        <div class="smallheader2">
            <label id="title2" class="titles">Crear Receta</label>
        </div>

        <input placeholder="Tratamiento" class="txtbox" id="tratamiento">

        <br><br><br><br>
        <textarea placeholder="Escribe las indicaciones aqui..." class="Bigtxtbox" id="indicaciones" rows="4"
            cols="30"></textarea>

    </div>

</body>

</html>