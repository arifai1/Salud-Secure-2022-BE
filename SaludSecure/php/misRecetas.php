<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../html/pantallainicio.html');
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/MisRecetas.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <UTF-8>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
		
        <script src="../js/saludsecure.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="../js/SobreBesmo.js" type="text/javascript"></script>
        <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
	<link rel="Icon" href="../imagenes/logo-Header.png">
    
   
    <title>Mis Recetas</title>
	
	</head>

	
	<script>
        //CODIGO PARA LEER RECETA --> PACIENTE
        
        const Web3 = new Web3(window.ethereum);

        //const web3 = 
        //await window.ethereum.enable();

       const contract_abi = [
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

	async function myFunction() {
  			alert("holapa");
            const contract_address = '0xa0ccDD96AE52777f1eCe7D1efF6A02ae7341614b' ;
            const SaludSecure = new ethers.Contract(contract_address,contract_abi, provider); 
            const txn = SaludSecure.methods.ver_Receta().call(); 
             txn.then(function(result) {
                    alert(result) 
             })
    }
	const provider = new ethers.providers.JsonRpcProvider('https://rpc-mumbai.matic.today'); 
       </script>
	<script type="module" src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
<body>

    <header>
        <label id="Txtlogo">BESMO</label>
        
        <label id="headertitle"> Mis Recetas </label>
        <input id="logo"type="button">
        <div id="LogOut">
            <input type ="button" class="minibutton" value="Log Out"/>
        </div>
        <input id="Usuario"type ="button"/>
    </header>
    
	<div id="recetasContainer">
        
        <div id="item1"class="receta">
        <label id="lbl1">Tratamiento</label>
        <label id="lbl2">Fecha</label>
        <input type="submit" value="Ver" id="verReceta" class="minibutton" onclick="myFunction()"/> 
  
        
        </div>
       
    </div>
    
    <a id="Izq"><i id="chevron_left" class="material-icons">chevron_left</i></a>
    <a id="Der"><i id="chevron_right" class="material-icons">chevron_right
    </i></a>
    
    <input type="button" value="?" class="ayuda">
    <a class="btn-floating btn-large waves-effect" id="RegresarP"><i id="IconregresarP" class="material-icons">arrow_back</i></a>
   
    
        
 
</body>
</html>