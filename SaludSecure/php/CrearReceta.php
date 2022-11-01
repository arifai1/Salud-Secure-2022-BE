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
        <script src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/saludsecure.js" type="text/javascript"></script>
        <script src="../js/SobreBesmo.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
    <script> 
       // $(document).ready(function() {
        async function conexionWeb3(){
				if (typeof window.ethereum !== "undefined") {
                     //alert("SEE");
                     
			 		ethereum.request({ method: "eth_requestAccounts" })
					
                }
				else{
				alert("No tiene MetaMask instalado, por favor descarguelo");
                 
			}
        
    
        async function conexionMetaMask(){
            mensaje = "No tiene instalado MetaMask, por favor instalelo apretando el boton 'Conectar con MetaMask'";                                               //Href me indica destino.
            $("#divt").html(mensaje);
            $("#divt").show();
            await window.open("https://metamask.io/download/", "_blank")
        }
    }
        
    </script>
<body>

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
        
            <!--<input type="submit" value="Enviar" id="EnviarSC" class="minibutton" onclick="conexionWeb3();"/> -->
            <html>
                <body>
                    <div class="container">
                        <button id="button" onclick="conexionWeb3();"></button>
                    </div>
                </body>
            </hmtl>  
            <input type="submit" value="Conectar con MetaMask" id="ConecMsk" class="minibutton" onclick="conexionMetaMask();"/>
             
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

<script>
    function sendReceta(id) {
        saludSecure.methods.myMethod(nombre).send()
        saludSecure.methods.myMethod(apellido).send()
        saludSecure.methods.myMethod(DNI).send()
        saludSecure.methods.myMethod(tratamientos).send()

      }
    </script>