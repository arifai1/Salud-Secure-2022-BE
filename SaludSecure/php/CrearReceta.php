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
        <script src="../js/metaMask.js" type="text/javascript"></script>
        <script src="../js/saludsecure.js" type="text/javascript"></script>
        <script src="../js/SobreBesmo.js" type="text/javascript"></script>
	    <link rel="Icon" href="../imagenes/logo-Header.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<script> 
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
				if (typeof window.ethereum !== "undefined") {
                     alert("SEE");
                    sendReceta();
			 	const accounts=	ethereum.request({ method: "eth_ccounts" })
                    if (accounts && accounts.length > 0) {
                        alert("user is connected");
                        sendReceta();
                        } else {
                             alert("user not connected");
                    }
                }
				else{
				alert("No tiene MetaMask instalado, por favor descarguelo");
                 conexionMetaMask();
			}
        
    
        async function conexionMetaMask(){
            mensaje = "No tiene instalado MetaMask, por favor instalelo apretando el boton 'Conectar con MetaMask'";                                               //Href me indica destino.
            $("#divt").html(mensaje);
            $("#divt").show();
            await window.open("https://metamask.io/download/", "_blank")
        }
    }
    $(function() {
        $( "#button" ).click(function() {
           // alert ("hola");
          $( "#button" ).addClass( "onclic", 250, validate());
        });
      
        function validate() {
          setTimeout(function() {
            $( "#button" ).removeClass( "onclic" );
            $( "#button" ).addClass( "validate", 450, callback());
          }, 2250 );
        }
          function callback() {
            setTimeout(function() {
              $( "#button" ).removeClass( "validate" );
            }, 1250 );
          }



          $( "#receta" ).click(function() {
          
            // alert ("hola");
            $( "#receta" ).addClass( "recetaIzq");
         });
        });
    </script>
<body>

    <header>
        <label id="Txtlogo">BESMO</label>
        <label id="headertitle">Crear Receta</label>
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
        
            <input type="submit" value="Enviar" id="EnviarSC" class="minibutton" onclick="conexionWeb3();"/>
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
<script>

    
    var userAccount = web3.eth.account[0]
    var account accountInterval = setInterval(function() {
  // Check if account has changed
  if (web3.eth.accounts[0] !== userAccount) {
    userAccount = web3.eth.accounts[0];
    // Call some function to update the UI with the new account
    updateInterface();
  }
}, 100);

    function sendReceta(_nombre, _apellido, _DNI, _aclaracion, _cantidad, _medicamento) {
        
        $("#txStatus").text("Mandando receta. Puede tardar un rato...");
       
        return saludSecure.methods.sendReceta(_nombre, _apellido, _DNI, _aclaracion, _cantidad, _medicamento)
        .send({ from: userAccount })
        .on("receipt", function(receipt) {
          $("#txStatus").text("¡Receta mandada exitosamente!");
         
          //getZombiesByOwner(userAccount).then(displayZombies);  MOSTRAR PACIENTE??
        })
        .on("error", function(error) {
         
          $("#txStatus").text(error);
        });
      
        
//h
      }
    </script>
</html>