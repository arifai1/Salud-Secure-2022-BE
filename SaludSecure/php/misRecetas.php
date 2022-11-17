<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../html/pantallainicio.html');
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <UTF-8>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="../js/saludsecure.js" type="text/javascript"></script>
	<script src="../js/saludSecureABI.js" type="text/javascript"></script>
	<script src="../js/SobreBesmo.js" type="text/javascript"></script>
    <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script language="javascript" type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.8.0/web3.min.js"></script>
    <script language="javascript" type="text/javascript" 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/MisRecetas.css">
    <link rel="stylesheet" href="../css/font.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="Icon" href="../imagenes/logo-Header.png">
    <title>Mis Recetas</title>
</head>
<script>
    //CODIGO PARA LEER RECETA --> PACIENTE
    // var Web3 = require("web3")
	// const web3 = new Web3("https://cloudflare-eth.com")
    //  const Web3 = new Web3(window.ethereum);  
    async function mirarReceta() {
        console.log(contract_abi)
        console.log("hi")
        var web3 = new Web3(window.ethereum);
        const provider = web3.currentProvider.selectedAddress; 
        const SaludSecure = new web3.eth.Contract(contract_abi, "0xB398BEC709dB7c11476128BBBa4586d5A315431b", provider); 
        var userAccount = web3.currentProvider.selectedAddress;
        console.log(userAccount);
        if (typeof window.etherseum !== "undefined" || window.ethereum._state.account == undefined) {
            console.log("fh")
            const accounts = ethereum.request({ method: 'eth_requestAccounts' });
            const txn = await SaludSecure.methods.ver_Receta().call(/*{from: userAccount}*/); 
            console.log(accounts)
            console.log(txn)
            /*txn.then(function(result) {
                alert(result) 
        }) */
        }
    }
</script>
<body>
    <header>
        <label id="Txtlogo">Mis Recetas</label>
        <label id="headertitle"> . </label>
        <input id="logo"type="button">
        <div id="LogOut">
            <input type ="button" class="minibutton" value="Log Out" id="LO_M"/>
        </div>
        <input id="Usuario"type ="button"/>
    </header>
	<div id="recetasContainer" >
        <div id="MoverRecetas">
        <div id="item1"class="receta">

            <label id="lbl2">Ibuprofeno</label>

            <div class="box">
	        <a onclick="mirarReceta()" class="button" href="#popup1">Click para ver receta </a>
            </div>

            <div id="popup1" class="overlay">
	        <div class="popup">
		    <h2>Dr. Jon Doe</h2>
		    <a class="close" href="#">&times;</a>
            <!-- CAMBIAR LO DEL CONTENT POR LAS VARIABLES DEL SMART CONTRACT -->
            <div class="content">
			<!--Ibuprofeno 600g por cada 12 horas-->
		</div>
        
	</div>
</div>





        
        </div>
       
        </div>
    </div>
    
    <a id="Izq"><i id="chevron_left" class="material-icons">chevron_left</i></a>
    <a id="Der"><i id="chevron_right" class="material-icons">chevron_right
    </i></a>
    
    <input type="button" value="?" class="ayuda">
    <a class="btn-floating btn-large waves-effect" id="RegresarP"><i id="IconregresarP" class="material-icons">arrow_back</i></a>
</body>
</html>