<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../html/pantallainicio.html');
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <UTF-8>
    <title>Crear Receta</title>
    <link rel="stylesheet" href="../css/CrearReceta.css">
    <link rel="stylesheet" href="../css/font.css">
        <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="../js/metaMask.js" type="text/javascript"></script>
        <script src="../js/saludSecureABI.js" type="text/javascript"></script>
        <script src="../js/saludsecure.js" type="text/javascript"></script>
        <script src="../js/SobreBesmo.js" type="text/javascript"></script>
	    <link rel="Icon" href="../imagenes/logo-Header.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="module" src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
        <!-- <script language="javascript" type="text/javascript" src="web3.min.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>  -->
        <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
        <script language="javascript" type="text/javascript" 
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script> -->
        <!-- <script language="javascript" type="text/javascript" 
        src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.8.0/web3.min.js"></script> -->
        <link href="" rel="shortcut icon">
</head>
<body>
    <header>
        <label id="Txtlogo">Crear Receta</label>
        <label id="headertitle">.</label>
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
    <form method="POST">
        <div id="IngresarDatos">
            <div class="smallheader">
                <label id="title1" class="titles">Datos del Paciente</label>
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
        <div class = "container">
          <button id= "EnviarSC" ></button>
          
        </div>

    <script>
        //ESTO 
        var web3 = new Web3(window.ethereum);
        var contract = new web3.eth.Contract(contract_abi, "0x633284cb7e86cf89C42297FA5b533e9aB1F0dA18");
        async () => {
            web3 = await ethereum.request({ method: 'eth_requestAccounts'});
        }
        var userAccount;
        var saludSecure;
        //AGARRA EL ADDRESS DE LA WALLET CONECTADA ACUTALMENTE
        async function connectWallet() {
        userAccount = web3.currentProvider.selectedAddress
        console.log(userAccount)     
    }
    //AGARRA LOS INPUTS Y MANDA LA RECETA??
    //async 
    function sendReceta() {
            $("#txStatus").text("Mandando receta. Puede tardar un rato...");
            var pacienteDni;
            var medicamento;
            var aclaracion;
            pacienteDni = document.getElementById('dnidelpacCrearRec').value;
            medicamento = document.getElementById('tratamiento').value;
            aclaracion = document.getElementById('indicaciones').value;
            console.log(contract.methods)
            var txn = /*await*/ contract.methods.set_receta(pacienteDni, medicamento, aclaracion)
            txn = txn.send({from:web3.eth.currentProvider.selectedAddress});
            txn.then(t => {
                console.log(t)
            }).catch(e => {
                console.log(e)
            })
            /*var txn;
            var sendRecetas;
            async () => {
                txn = await saludSecure.methods.set_Receta();
                txn.send()
                sendRecetas = await saludSecure.methods.sendReceta('#dnidelpacCrearRec', '#tratamiento', '#indicaciones');
            }
            //console.log(sendRecetas)
            console.log(sendRecetas.methods)*/
            return sendRecetas.send({
                    from: userAccount
                })
                .on("receipt", function (receipt) {
                    $("#txStatus").text("¡Receta mandada exitosamente!");
                })
                .on("error", function (error) {
                    $("#txStatus").text(error);
                });
        }
        //LLAMA A LA FUNCIÓN VER_RECETA PARA VERLA.
        async function mirarRecetas(){
            const rec = await contract.methods.ver_Receta()
            rec.call({from:web3.currentProvider.selectedAddress})
        }
        $(function(){
            $( "#button" ).click(function() {
                $( "#button" ).addClass( "onclic", 250, validate);
            });
            function validate() {
                setTimeout(function() {
                    $( "#button" ).removeClass( "onclic" );
                    $( "#button" ).addClass( "validate", 450, callback );
                }, 2250 );
            }
            function callback() {
                setTimeout(function() {
                    $( "#button" ).removeClass( "validate" );
                }, 1250 );
            }        
        });
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
        
        var button = document.getElementById("EnviarSC")
        button.addEventListener("click", conexionWeb3, startApp, sendReceta)  
        
    </script>
</body>
</html>
