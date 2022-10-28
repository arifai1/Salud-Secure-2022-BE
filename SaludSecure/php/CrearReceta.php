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
        <!--web3.js-->
        <script language="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="web3.min.js"></script>
        <script language="javascript" type="text/javascript" scr="SaludSecure_abi.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        

</head>

<body>
    <script>
        var initializeContract;
        var userAccounts;
        function startApp(){
            var contractAddress = "0x0a487A8a6ee4ee519E9B932aEe3BD9a6f3f4aEf7" //Completar con el address
            initializeContract = new web3js.eth.Contract(SaludSecureABI, contractAddress);

            var accountInterval = setInterval(function() {
         
            if (web3.eth.accounts[0] !== userAccount) {
                userAccount = web3.eth.accounts[0];
          
                getZombiesByOwner(userAccount)
                .then(displayZombies);
         }
       }, 100);
     }

        }
        

        window.addEventListener('load', function() {if (typeof web3 !== 'undefined') {
         
            web3js = new Web3(web3.currentProvider);
            } else {
        
            }      
            startApp()

        })

        //DISPLAY
        function displayZombies(ids) {
            $("#zombies").empty();
            for (id of ids) {
         
                getZombieDetails(id)
                .then(function(zombie) {
           
           
                $("#zombies").append(`<div class="zombie">
                <ul>
                    <li>Name: ${zombie.name}</li>
                    <li>DNA: ${zombie.dna}</li>
                    <li>Level: ${zombie.level}</li>
                    <li>Wins: ${zombie.winCount}</li>
                    <li>Losses: ${zombie.lossCount}</li>
                    <li>Ready Time: ${zombie.readyTime}</li>
                </ul>
                </div>`);
          });
        }

        function createRandomZombie(name) {   
            $("#txStatus").text("Creating new zombie on the blockchain. This may take a while...");
      
            return cryptoZombies.methods.createRandomZombie(name)
            .send({ from: userAccount })
            .on("receipt", function(receipt) {
                $("#txStatus").text("Successfully created " + name + "!");
        
            getZombiesByOwner(userAccount).then(displayZombies);
       })
            .on("error", function(error) {
        
            $("#txStatus").text(error);
            });
    }

        function feedOnKitty(zombieId, kittyId) {
      
      
            $("#txStatus").text("Eating a kitty. This may take a while...");
      
            return cryptoZombies.methods.feedOnKitty(zombieId, kittyId)
            .send({ from: userAccount })
            .on("receipt", function(receipt) {
             $("#txStatus").text("Ate a kitty and spawned a new Zombie!");
        
             getZombiesByOwner(userAccount).then(displayZombies);
       })
             .on("error", function(error) {
        
             $("#txStatus").text(error);
       });
     }


        //completar con nombres correctos
        function getRecetasDetails(id) { 
            return SaludSecure.methods.funcion(id).call()
        }

        function zombieToOwner(id) {
            return cryptoZombies.methods.zombieToOwner(id).call()
      }

        function getZombiesByOwner(owner) {
            return cryptoZombies.methods.getZombiesByOwner(owner).call()
      }
      
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