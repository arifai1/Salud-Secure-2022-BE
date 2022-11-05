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
        <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
        <link href="" rel="shortcut icon">

</head>
<script> 
 // const Web3 = require("web3")
            $(function() {
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
			 	 if (typeof window.ethereum !== "undefined" || window. ethereum.state.account == null) {
                    accounts = await window.ethereum.request({method: 'eth_requestAccounts',});
                        if(accounts.length !== null){
                            connectWallet();
//DIV QUE DIGA METAMASK CONECTADO!
                        }
                         
                 //sendReceta();
                  //     mensajeM = "Conectando con MetaMask";                                               
                  //   $("#divt").html(mensajeM);
                  //   $("#divt").show();
                   
                }
			 	else{
			 	    alert("No tiene MetaMask instalado, por favor descarguelo");
//mensaje = "No tiene instalado MetaMask, por favor instalelo apretando el boton 'Conectar con MetaMask'";                                               //Href me indica destino.
                    //$("#divt").html(mensaje);
                    //$("#divt").show();
                    await window.open("https://metamask.io/download/", "_blank")
			    }
            }

             async function connectWallet() {
                    const provider = new ethers.providers.JsonRpcProvider('https://rpc-mumbai.matic.today');
                    const signer = provider.getSigner()
                    console.log(accounts);
             }

            

            
//MANDAR RECETA, LAS VARIABLES NO ESTAN DEL TODO BIEN
             function sendReceta(_nombre, _apellido, _DNI, _aclaracion, _cantidad, _medicamento) {
        
                $("#txStatus").text("Mandando receta. Puede tardar un rato...");
                
                const contract_address = '0xc2c4106be5581A131dC9ced2bd6FFCa3b0B0E9E5' ;
                const SaludSecure = new ethers.Contract(contract_address,contract_abi, provider); 
                const txn = SaludSecure.methods.ver_Receta().send(); 

                // return saludSecure.methods.sendReceta(_nombre, _apellido, _DNI, _aclaracion, _cantidad, _medicamento)
                // .send({ from: userAccount })
                // .on("receipt", function(receipt) {
                //  $("#txStatus").text("¡Receta mandada exitosamente!");
                //getZombiesByOwner(userAccount).then(displayZombies);  MOSTRAR PACIENTE??
                //})
                //.on("error", function(error) {
                //$("#txStatus").text(error);
               // });
             }
    
        
    
    
    </script>
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
          <button id= "EnviarSC" onclick="conexionWeb3();"></button>
        </div>

</body>
</html>
<script>

//     var userAccount = web3.eth.account[0]
//     var account accountInterval = setInterval(function() {
//     // Check if account has changed
//     if (web3.eth.accounts[0] !== userAccount) {
//     userAccount = web3.eth.accounts[0];
//     // Call some function to update the UI with the new account
//     updateInterface();
//   }
// }, 100);

    
    </script>
