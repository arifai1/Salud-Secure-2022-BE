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
	<script language="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/MisRecetas.css">
    <link rel="stylesheet" href="../css/font.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="Icon" href="../imagenes/logo-Header.png">
    <title>Mis Recetas</title>
</head>
<body>
    <header>
        <label id="Txtlogo">Mis Recetas</label>
        <label id="headertitle"> . </label>
        <input id="logo"type="button">
        <div id="LogOut">
            <input type ="button"  value="Log Out" id="LO_M"/>
        </div>
        <input id="Usuario"type ="button"/>
    </header>
	<div id="recetasContainer" >
        <div id="MoverRecetas">
        <div id="item1"class="receta">

            <label id="lbl2">Ibuprofeno</label>

            <div class="box">
	        <a id= "botonPopup" onclick="myFunction()" class="button" href="#popup1">Click para ver receta </a>
            </div>

            <div id="popup1" class="overlay">
	        <div class="popup">
		    <h2>Dr. Jon Doe</h2>
		    <a class="close" href="#">&times;</a>
		    <div class="content">
			Ibuprofeno 600g por cada 12 horas
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
        async function mirarRecetas(){
            const rec = await contract.methods.ver_Receta()
            rec.call({from:web3.currentProvider.selectedAddress})
            console.log(rec)
        }
        /*function () {
            console.log("set")
            $("#txStatus").text("Asignando medico. Puede tardar un rato...");
            nombreApellido = (document.getElementById('NomMed').value) + (" ") +(document.getElementById('ApeMed').value);
            especializacion = document.getElementById('AreaMed').value;
            var txn = contract.methods.set_Medico(nombreApellido, especializacion)
                txn = txn.send({from:web3.eth.currentProvider.selectedAddress});
        }*/
            async function conexionWeb3(){
            //import detectEthereumProvider from '@metamask/detect-provider';
                if (typeof window.etherseum !== "undefined" || window.ethereum._state.account == undefined) {   
                    const accounts = await ethereum.request({ method: 'eth_requestAccounts'});
                    // mirarRecetas();
                    if(accounts.length !== null){
                    await connectWallet();
                    await mirarRecetas();
                    // await sendReceta();
                        //DIV QUE DIGA METAMASK CONECTADO!
                    }                                      
                }
                else{
                    alert("No tiene instalado MetaMask, por favor instalelo");  
                    await window.open("https://metamask.io/download/", "_blank");
                }
            }
            var button = document.getElementById("botonPopup")
            button.addEventListener("click",  conexionWeb3)  
        </script>
    </script>
</body>
</html>